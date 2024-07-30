<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InformasiTest extends TestCase
{
    public function testTambahInformasi()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        $responses = $this->actingAs($user)->post('/informasi-umum/store', [
            'title' => 'Nama Sekolah',
            'keterangan' => 'MAN 2 Kota Tasikmalaya',
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/informasi-umum');
        $responses->assertSessionHas('message', 'Informasi Berhasil Ditambahkan!');
    }
}
