<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PelayananPublic;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelayananTest extends TestCase
{
    public function testTambahPelayananSuccess()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 2048, 'application/pdf');
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/pelayanan-public', [
            'nama' => 'Lab Sekolah',
            'pdf' => $file,
        ]);
        Storage::disk('public')->assertExists('pdf-pelayanan/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/pelayanan-public');
        $responses->assertSessionHas('message', 'Data Berhasil Ditambahkan!');
    }

    public function testTambahPelyananSuccessTanpaUploadPDF()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/pelayanan-public', [
            'nama' => 'Lab Sekolah',
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/pelayanan-public');
        $responses->assertSessionHas('message', 'Data Berhasil Ditambahkan!');
    }

    public function testvalidasiInputanKosong()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 2048, 'application/pdf');
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/pelayanan-public', [
            'nama' => '',
            'pdf' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['nama' => 'Nama tidak Boleh kosong']);
    }

    public function testFileBukanPDF()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->image('example.jpg')->size(100);
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/pelayanan-public', [
            'nama' => 'Lab Sekolah',
            'pdf' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['pdf' => 'File harus berupa PDF']);
    }

    public function testPDFTerlaluBesar()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 2049, 'application/pdf');
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/pelayanan-public', [
            'nama' => 'Lab Sekolah',
            'pdf' => $file,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['pdf' => 'Ukuran maksimal PDF adalah 2MB']);
    }

    public function test_update_success_dengan_pdf_sebelumnya_null()
    {
        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 2048, 'application/pdf');
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $pelayanan = PelayananPublic::create([
            'uuid' => '12345',
            'nama' => 'Lab',
        ]);
        $responses = $this->actingAs($user)->put('/pelayanan-public/12345', [
            'nama' => 'Lab',
            'pdf' => $file,
        ]);
        // Validasi bahwa gambar diupload dan disimpan
        $pelayanan->refresh();
        $this->assertEquals('Lab', $pelayanan->nama);
        $responses->assertStatus(302);
        $responses->assertredirect('/pelayanan-public');
        $responses->assertSessionHas('message', 'Data Berhasil Diubah!');
    }

    public function test_update_success_dengan_photo_sebelumnya_tidak_null()
    {
        // SET UP
        Storage::fake('public');
        $oldFile = UploadedFile::fake()->create('document.pdf', 2048, 'application/pdf');
        $newFile = UploadedFile::fake()->create('documentBaru.pdf', 2048, 'application/pdf');
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $pelayanan = PelayananPublic::create([
            'uuid' => '12345',
            'nama' => 'Lab',
            'pdf' => $oldFile
        ]);
        $responses = $this->actingAs($user)->put('/pelayanan-public/12345', [
            'nama' => 'Lab 2',
            'pdf' => $newFile,
        ]);
        // Validasi bahwa gambar baru diupload dan gambar lama dihapus
        Storage::disk('public')->assertMissing('pdf-pelayanan/' . $oldFile->hashName());
        Storage::disk('public')->assertExists('pdf-pelayanan/' . $newFile->hashName());
        $pelayanan->refresh();
        $this->assertEquals('Lab 2', $pelayanan->nama);
        $responses->assertStatus(302);
        $responses->assertredirect('/pelayanan-public');
        $responses->assertSessionHas('message', 'Data Berhasil Diubah!');
    }

    public function test_delete_pelayanan_dengan_image_null()
    {
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $pelayanan = PelayananPublic::create([
            'uuid' => '12345',
            'nama' => 'Lab',
        ]);
        $responses = $this->actingAs($user)->delete('/pelayanan-public/12345');
        $responses->assertStatus(302);
        $responses->assertRedirect('/pelayanan-public');
        $responses->assertSessionHas('message', 'Data Berhasil Dihapus!');
    }

    public function test_delete_pelayanan_dengan_image_tidak_null()
    {

        // SET UP
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 2048, 'application/pdf');
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        PelayananPublic::create([
            'uuid' => '12345',
            'nama' => 'Lab',
            'pdf' => $file
        ]);
        Storage::disk('public')->assertMissing('pdf-pelayanan/' . $file->hashName());
        $responses = $this->actingAs($user)->delete('/pelayanan-public/12345');
        $responses->assertStatus(302);
        $responses->assertRedirect('/pelayanan-public');
        $responses->assertSessionHas('message', 'Data Berhasil Dihapus!');
    }
}
