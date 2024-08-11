<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Prestasi;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrestasiTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->get('/prestasi');
        $res->assertStatus(200);
        $res->assertViewIs('prestasi.index');
        $res->assertViewHas('prestasi');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->get('/prestasi/create');
        $res->assertStatus(200);
        $res->assertViewIs('prestasi.create');
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $prestasi = $this->_createDumPrestasi();
        $res = $this->actingAs($user)->get('/prestasi/' . $prestasi->uuid . '/edit');
        $res->assertStatus(200);
        $res->assertViewIs('prestasi.edit');
        $res->assertViewHas('prestasi');
    }

    public function test_tambah_data_prestasi_success()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->post('/prestasi', [
            'acara' => 'acara',
            'penyelenggara' => 'penyelenggara',
            'tanggal' => '2024-01-01',
            'prestasi' => 'prestasi',
        ]);
        $res->assertStatus(302);
        $res->assertRedirect('/prestasi');
        $res->assertSessionHas('message', 'Prestasi Berhasil Ditambahkan!');
    }

    public function test_tambah_data_prestasi_validation_error()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->post('/prestasi', [
            'acara' => '',
            'penyelenggara' => '',
            'tanggal' => '',
            'prestasi' => '',
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'acara' => 'Acara tidak boleh kosong',
            'penyelenggara' => 'Penyelenggara tidak boleh kosong',
            'tanggal' => 'Tanggal tidak boleh kosong',
            'prestasi' => 'Prestasi tidak boleh kosong',
        ]);
    }

    public function test_update_prestasi()
    {
        $user = parent::_createDumUser();
        $prestasi = $this->_createDumPrestasi();
        $res = $this->actingAs($user)->put('/prestasi/' . $prestasi->uuid, [
            'acara' => 'acara 2',
            'penyelenggara' => 'penyelenggara 2',
            'tanggal' => '2024-01-02',
            'prestasi' => 'prestasi 2',
        ]);
        $prestasi->refresh();
        $this->assertEquals('acara 2', $prestasi->acara);
        $this->assertEquals('penyelenggara 2', $prestasi->penyelenggara);
        $this->assertEquals('2024-01-02', $prestasi->tanggal);
        $this->assertEquals('prestasi 2', $prestasi->prestasi);
        $res->assertStatus(302);
        $res->assertRedirect('/prestasi');
        $res->assertSessionHas('message', 'Prestasi Berhasil Diubah!');
    }

    public function test_update_prestasi_validation_error()
    {
        $user = parent::_createDumUser();
        $prestasi = $this->_createDumPrestasi();
        $res = $this->actingAs($user)->put('/prestasi/' . $prestasi->uuid, [
            'acara' => '',
            'penyelenggara' => '',
            'tanggal' => '',
            'prestasi' => '',
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'acara' => 'Acara tidak boleh kosong',
            'penyelenggara' => 'Penyelenggara tidak boleh kosong',
            'tanggal' => 'Tanggal tidak boleh kosong',
            'prestasi' => 'Prestasi tidak boleh kosong',
        ]);
    }

    public function test_delete()
    {

        $user = parent::_createDumUser();
        $prestasi = $this->_createDumPrestasi();
        $res = $this->actingAs($user)->delete('/prestasi/' . $prestasi->uuid);
        $res->assertStatus(302);
        $res->assertRedirect('/prestasi');
        $res->assertSessionHas('message', 'Prestasi Berhasil Dihapus!');
    }

    // NOT FOR TEST
    public function _createDumPrestasi()
    {
        return Prestasi::create([
            'uuid' => Str::orderedUuid(),
            'acara' => 'acara',
            'penyelenggara' => 'penyelenggara',
            'tanggal' => '2024-01-01',
            'prestasi' => 'prestasi',
        ]);
    }
}
