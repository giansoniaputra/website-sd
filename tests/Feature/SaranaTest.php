<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Sarana;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaranaTest extends TestCase
{
    public function testTambahSaranaSuccess()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->image('lab.jpg')->size(2048);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/sarana/store', [
            'nama' => 'Lab Sekolah',
            'photo' => $file,
        ]);
        Storage::disk('public')->assertExists('photo-sarana/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/sarana');
        $responses->assertSessionHas('message', 'Sarana dan Prasarana Berhasil Ditambahkan!');
    }

    public function testTambahSaranaSuccessTanpaUploadPhoto()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/sarana/store', [
            'nama' => 'Lab Sekolah',
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/sarana');
        $responses->assertSessionHas('message', 'Sarana dan Prasarana Berhasil Ditambahkan!');
    }

    public function testvalidasiInputanKosong()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->image('lab.jpg')->size(1028);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/sarana/store', [
            'nama' => '',
            'photo' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['nama' => 'Nama tidak Boleh kosong']);
    }

    public function testFileBukanGambar()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 500);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/sarana/store', [
            'nama' => 'Lab Sekolah',
            'photo' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['photo' => 'File harus berupa gambar']);
    }

    public function testGambarTerlaluBesar()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->image('lab.jpg')->size(2049);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/sarana/store', [
            'nama' => 'Lab Sekolah',
            'photo' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['photo' => 'Ukuran maksimal gambar adalah 2MB']);
    }

    public function test_update_success_dengan_photo_sebelumnya_null()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->image('lab.jpg')->size(1028);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $sarana = Sarana::create([
            'uuid' => '12345',
            'nama' => 'Lab',
        ]);
        $responses = $this->actingAs($user)->put('/sarana/12345', [
            'nama' => 'Lab',
            'photo' => $file,
        ]);
        // Validasi bahwa gambar diupload dan disimpan
        $sarana->refresh();
        $this->assertEquals('Lab', $sarana->nama);
        $responses->assertStatus(302);
        $responses->assertredirect('/sarana');
        $responses->assertSessionHas('message', 'Sarana dan Prasarana Berhasil Diubah!');
    }

    public function test_update_success_dengan_photo_sebelumnya_tidak_null()
    {
        // SET UP
        Storage::fake('public');
        $oldFile = UploadedFile::fake()->image('sarana_old.jpg')->size(1024); // 1MB
        $newFile = UploadedFile::fake()->image('lab.jpg')->size(1028);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $sarana = Sarana::create([
            'uuid' => '12345',
            'nama' => 'Lab',
            'photo' => $oldFile,
        ]);
        $responses = $this->actingAs($user)->put('/sarana/12345', [
            'nama' => 'Lab',
            'photo' => $newFile,
        ]);
        // Validasi bahwa gambar baru diupload dan gambar lama dihapus
        Storage::disk('public')->assertExists('photo-sarana/' . $newFile->hashName());
        Storage::disk('public')->assertMissing('photo-sarana/' . $oldFile->hashName());
        $responses->assertStatus(302);
        $responses->assertredirect('/sarana');
        $responses->assertSessionHas('message', 'Sarana dan Prasarana Berhasil Diubah!');

        $sarana->refresh();
        $this->assertEquals('Lab', $sarana->nama);
        $this->assertEquals('photo-sarana/' . $newFile->hashName(), $sarana->photo);
    }

    public function test_delete_sarana_dengan_image_null()
    {
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $sarana = Sarana::create([
            'uuid' => '12345',
            'nama' => 'Lab',
        ]);
        $responses = $this->actingAs($user)->delete('/sarana/12345');
        $responses->assertStatus(302);
        $responses->assertRedirect('/sarana');
        $responses->assertSessionHas('message', 'Sarana dan Prasarana Berhasil Dihapus!');
    }

    public function test_delete_sarana_dengan_image_tidak_null()
    {

        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->image('lab.jpg')->size(2048);
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $sarana = Sarana::create([
            'uuid' => '12345',
            'nama' => 'Lab',
            'photo' => $file,
        ]);
        Storage::disk('public')->assertMissing('photo-sarana/' . $file->hashName());
        $responses = $this->actingAs($user)->delete('/sarana/12345');
        $responses->assertStatus(302);
        $responses->assertRedirect('/sarana');
        $responses->assertSessionHas('message', 'Sarana dan Prasarana Berhasil Dihapus!');
    }
}
