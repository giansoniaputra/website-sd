<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfilTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testCreate()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        // CREATE SUCCESS
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
        ]);

        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Dibuat!');
    }

    public function test_create_dengan_photo()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
            'photo' => $file
        ]);
        Storage::disk('public')->assertExists('profile/' . $file->hashName());
        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Dibuat!');
    }

    public function test_create_validation_error_photo_max()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2049);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
            'photo' => $file
        ]);
        $request->assertStatus(302);
        $request->assertSessionHasErrors([
            'photo' => 'Maximal ukuran photo 2MB'
        ]);
    }

    public function test_create_validation_error_photo_not_valid()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048, true);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
            'photo' => $file
        ]);
        $request->assertStatus(302);
        $request->assertSessionHasErrors([
            'photo' => 'Format photo tidak valid'
        ]);
    }

    public function test_update_without_photo()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        // UPDATE PROFILE
        $profil = Profile::create([
            'uuid' => Str::orderedUuid(),
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
        ]);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi2',
            'misi' => 'misi2',
            'sejarah' => 'sejarah2',
            'tujuan' => 'tujuan2',
            'lokasi' => 'lokasi2',
            'strategi' => 'strategi2',
            'sambutan' => 'sambutan2',
        ]);

        // Validasi bahwa data berhasil diperbarui
        $profil->refresh();
        $this->assertEquals('yayasan', $profil->type);
        $this->assertEquals('visi2', $profil->visi);
        $this->assertEquals('misi2', $profil->misi);
        $this->assertEquals('sejarah2', $profil->sejarah);
        $this->assertEquals('tujuan2', $profil->tujuan);
        $this->assertEquals('lokasi2', $profil->lokasi);
        $this->assertEquals('strategi2', $profil->strategi);
        $this->assertEquals('sambutan2', $profil->sambutan);
        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Diubah!');
    }

    public function test_update_with_photo_before_photo_is_null()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $file = parent::_createDumImage(2048);
        // UPDATE PROFILE
        $profil = Profile::create([
            'uuid' => Str::orderedUuid(),
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
        ]);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi2',
            'misi' => 'misi2',
            'sejarah' => 'sejarah2',
            'tujuan' => 'tujuan2',
            'lokasi' => 'lokasi2',
            'strategi' => 'strategi2',
            'sambutan' => 'sambutan2',
            'photo' => $file
        ]);
        Storage::disk('public')->assertExists('profile/' . $file->hashName());
        // Validasi bahwa data berhasil diperbarui
        $profil->refresh();
        $this->assertEquals('yayasan', $profil->type);
        $this->assertEquals('visi2', $profil->visi);
        $this->assertEquals('misi2', $profil->misi);
        $this->assertEquals('sejarah2', $profil->sejarah);
        $this->assertEquals('tujuan2', $profil->tujuan);
        $this->assertEquals('lokasi2', $profil->lokasi);
        $this->assertEquals('strategi2', $profil->strategi);
        $this->assertEquals('sambutan2', $profil->sambutan);
        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Diubah!');
    }

    public function test_update_with_photo_before_photo_is_not_null()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $file = parent::_createDumImage(2048);
        $oldFile = parent::_createDumImage(2048);
        // UPDATE PROFILE
        $profil = Profile::create([
            'uuid' => Str::orderedUuid(),
            'type' => 'yayasan',
            'visi' => 'visi',
            'misi' => 'misi',
            'sejarah' => 'sejarah',
            'tujuan' => 'tujuan',
            'lokasi' => 'lokasi',
            'strategi' => 'strategi',
            'sambutan' => 'sambutan',
            'photo' => $oldFile
        ]);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi2',
            'misi' => 'misi2',
            'sejarah' => 'sejarah2',
            'tujuan' => 'tujuan2',
            'lokasi' => 'lokasi2',
            'strategi' => 'strategi2',
            'sambutan' => 'sambutan2',
            'photo' => $file
        ]);
        Storage::disk('public')->assertMissing('profile/' . $oldFile->hashName());
        Storage::disk('public')->assertExists('profile/' . $file->hashName());
        // Validasi bahwa data berhasil diperbarui
        $profil->refresh();
        $this->assertEquals('yayasan', $profil->type);
        $this->assertEquals('visi2', $profil->visi);
        $this->assertEquals('misi2', $profil->misi);
        $this->assertEquals('sejarah2', $profil->sejarah);
        $this->assertEquals('tujuan2', $profil->tujuan);
        $this->assertEquals('lokasi2', $profil->lokasi);
        $this->assertEquals('strategi2', $profil->strategi);
        $this->assertEquals('sambutan2', $profil->sambutan);
        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Diubah!');
    }
}
