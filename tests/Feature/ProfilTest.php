<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
        ]);

        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Dibuat!');
    }

    public function testUpdate()
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
        ]);
        $request = $this->actingAs($user)->post("/profil/store", [
            'type' => 'yayasan',
            'visi' => 'visi2',
            'misi' => 'misi2',
            'sejarah' => 'sejarah2',
            'tujuan' => 'tujuan2',
            'lokasi' => 'lokasi2',
            'strategi' => 'strategi2',
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
        $request->assertStatus(302);
        $request->assertRedirect('/profil/yayasan');
        $request->assertSessionHas('message', 'Profile Berhasil Diubah!');
    }
}
