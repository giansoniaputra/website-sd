<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\KategoriBerita;
use Database\Seeders\KategoriSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KategoriTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kategori');
        $responses->assertStatus(200);
        $responses->assertViewIs('kategori.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kategori/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('kategori.create');
    }

    public function test_tambah_kategori_success()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/kategori', [
            'kategori' => 'Guru'
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/kategori');
        $responses->assertSessionHas('message', 'Kategori Berhasil Ditambahkan!');
    }

    public function test_tambah_data_validation_error()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/kategori', [
            'kategori' => ''
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'kategori' => 'Kategori tidak boleh kosong'
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $kategori = KategoriBerita::first();
        $responses = $this->actingAs($user)->get('/kategori/' . $kategori->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('kategori.edit');
    }

    public function test_update_kategori_success()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $kategori = KategoriBerita::first();
        $responses = $this->actingAs($user)->put('/kategori/' . $kategori->uuid, [
            'kategori' => 'Guru'
        ]);
        $kategori->refresh();
        $this->assertEquals('Guru', $kategori->kategori);
        $responses->assertStatus(302);
        $responses->assertRedirect('/kategori');
        $responses->assertSessionHas('message', 'Kategori Berhasil Diubah!');
    }

    public function test_update_kategori_validation_error()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $kategori = KategoriBerita::first();
        $responses = $this->actingAs($user)->put('/kategori/' . $kategori->uuid, [
            'kategori' => ''
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'kategori' => 'Kategori tidak boleh kosong'
        ]);
    }

    public function test_delete_kategori()
    {
        $user = parent::_createDumUser();
        $this->seed([KategoriSeeder::class]);
        $kategori = KategoriBerita::first();
        $responses = $this->actingAs($user)->delete('/kategori/' . $kategori->uuid);
        $responses->assertStatus(302);
        $responses->assertSessionHas('message', 'Kategori Berhasil Dihapus!');
    }
}
