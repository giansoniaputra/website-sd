<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\InformasiUmum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InformasiTest extends TestCase
{
    public function testTambahInformasiSuccess()
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

    public function testTambahInformasiValidasiError()
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
            'title' => '',
            'keterangan' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(['title' => 'Title tidak noleh kosong', 'keterangan' => 'Keterangan tidak noleh kosong']);
    }

    public function testUpdateInformasiSuccess()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        $informasi = InformasiUmum::create([
            'uuid' => '12345',
            'title' => 'Nama Sekolah',
            'keterangan' => 'Man 2 Kota Tasikmlaya',
        ]);
        $responses = $this->actingAs($user)->put('/informasi-umum/12345', [
            'title' => 'NPSN',
            'keterangan' => '20277205',
        ]);
        $informasi->refresh();
        $this->assertEquals('NPSN', $informasi->title);
        $this->assertEquals('20277205', $informasi->keterangan);
        $responses->assertStatus(302);
        $responses->assertRedirect('/informasi-umum');
        $responses->assertSessionHas('message', 'Informasi Berhasil Diubah!');
    }

    public function testDeleteInformasi()
    {
        // Membuat user untuk autentikasi
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        InformasiUmum::create([
            'uuid' => '12345',
            'title' => 'Nama Sekolah',
            'keterangan' => 'Man 2 Kota Tasikmlaya',
        ]);
        $responses = $this->actingAs($user)->delete('/informasi-umum/12345');
        $responses->assertStatus(302);
        $responses->assertRedirect('/informasi-umum');
        $responses->assertSessionHas('message', 'Informasi Berhasil Dihapus!');
    }
}
