<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\PPDB;
use Database\Seeders\PPDBSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PPDBTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/ppdb');
        $responses->assertStatus(200);
        $responses->assertViewIs('ppdb.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/ppdb/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('ppdb.create');
    }

    public function test_tambah_ppdb_success()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/ppdb', [
            'nama_kegiatan' => 'Pendaftaran',
            'tanggal_regular' => '2025-01-01',
            'tanggal_prestasi' => '2024-12-15',
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/ppdb');
        $responses->assertSessionHas('message', 'Kegiatan Berhasil Ditambahkan!');
    }

    public function test_tambah_ppdb_validation_error()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/ppdb', [
            'nama_kegiatan' => '',
            'tanggal_regular' => '',
            'tanggal_prestasi' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'nama_kegiatan' => 'Nama kegiatan tidak boleh kosong',
            'tanggal_regular' => 'Tanggal regular tidak boleh kosong',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $this->seed([PPDBSeeder::class]);
        $ppdb = PPDB::first();
        $responses = $this->actingAs($user)->get('/ppdb/' . $ppdb->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('ppdb.edit');
    }

    public function test_update_ppdb_success()
    {
        $user = parent::_createDumUser();
        $this->seed([PPDBSeeder::class]);
        $ppdb = PPDB::first();
        $responses = $this->actingAs($user)->put('/ppdb/' . $ppdb->uuid, [
            'nama_kegiatan' => 'Pendaftaran 2',
            'tanggal_regular' => '2025-01-02',
            'tanggal_prestasi' => '2024-12-16',
        ]);
        $ppdb->refresh();
        $this->assertEquals('Pendaftaran 2', $ppdb->nama_kegiatan);
        $this->assertEquals('2025-01-02', $ppdb->tanggal_regular);
        $this->assertEquals('2024-12-16', $ppdb->tanggal_prestasi);
        $responses->assertStatus(302);
        $responses->assertRedirect('/ppdb');
        $responses->assertSessionHas('message', 'Kegiatan Berhasil Diubah!');
    }

    public function test_update_ppdb_validation_error()
    {
        $user = parent::_createDumUser();
        $this->seed([PPDBSeeder::class]);
        $ppdb = PPDB::first();
        $responses = $this->actingAs($user)->put('/ppdb/' . $ppdb->uuid, [
            'nama_kegiatan' => '',
            'tanggal_regular' => '',
            'tanggal_prestasi' => '2024-12-16',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'nama_kegiatan' => 'Nama kegiatan tidak boleh kosong',
            'tanggal_regular' => 'Tanggal regular tidak boleh kosong',
        ]);
    }

    public function test_delete_ppdb()
    {
        $user = parent::_createDumUser();
        $this->seed([PPDBSeeder::class]);
        $ppdb = PPDB::first();
        $responses = $this->actingAs($user)->delete('/ppdb/' . $ppdb->uuid);
        $responses->assertStatus(302);
        $responses->assertRedirect('/ppdb');
        $responses->assertSessionHas('message', 'Kegiatan Berhasil Dihapus!');
    }
}
