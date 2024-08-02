<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use Database\Seeders\KelasSeeder;
use Database\Seeders\TahunAjaranSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelasTest extends TestCase
{
    public function test_view_index_tanpa_filter()
    {
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kelas');
        $responses->assertStatus(200);
        $responses->assertViewIs('kelas.index');
    }

    public function test_view_index_dengan_filter_kelas_dan_tahun_ajaran()
    {
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kelas', [
            'filter_kelas' => 'I',
            'filter_tahun' => '12345',
        ]);
        $responses->assertStatus(200);
        $responses->assertViewIs('kelas.index');
    }

    public function test_view_index_dengan_filter_kelas_saja()
    {
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kelas', [
            'filter_kelas' => 'I',
        ]);
        $responses->assertStatus(200);
        $responses->assertViewIs('kelas.index');
    }

    public function test_view_index_dengan_filter_tahun_ajaran_saja()
    {
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kelas', [
            'filter_tahun' => '12345',
        ]);
        $responses->assertStatus(200);
        $responses->assertViewIs('kelas.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/kelas/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('kelas.create');
    }

    public function test_tambah_kelas_success()
    {
        $user = parent::_createDumUser();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->post('/kelas', [
            'tahun_ajaran_uuid' => $tahunAjaran->uuid,
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/kelas');
        $responses->assertSessionHas('message', 'Kelas Berhasil Ditambahkan!');
    }

    public function test_tambah_kelas_validation_error()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/kelas', [
            'tahun_ajaran_uuid' => '',
            'kelas' => '',
            'nama_kelas' => '',
            'jumlah_lk' => '',
            'jumlah_pr' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'tahun_ajaran_uuid' => 'Tahun ajaran tidak boleh kosong',
            'kelas' => 'Kelas tidak boleh kosong',
            'nama_kelas' => 'Nama Kelas tidak boleh kosong',
            'jumlah_lk' => 'Jumlah laki-laki tidak boleh kosong',
            'jumlah_pr' => 'Jumlah perempuan tidak boleh kosong',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $kelas = $this->_createDumKelas();
        $responses = $this->actingAs($user)->get('/kelas/' . $kelas->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('kelas.edit');
    }

    public function test_update_success()
    {
        $user = parent::_createDumUser();
        $kelas = $this->_createDumKelas();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->put('/kelas/' . $kelas->uuid, [
            'tahun_ajaran_uuid' => $tahunAjaran->uuid,
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        $kelas->refresh();
        $this->assertEquals('II', $kelas->kelas);
        $this->assertEquals('Kelas IIA', $kelas->nama_kelas);
        $responses->assertStatus(302);
        $responses->assertRedirect('/kelas');
    }

    public function test_update_success_validation_error()
    {
        $user = parent::_createDumUser();
        $kelas = $this->_createDumKelas();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->put('/kelas/' . $kelas->uuid, [
            'tahun_ajaran_uuid' => '',
            'kelas' => '',
            'nama_kelas' => '',
            'jumlah_lk' => '',
            'jumlah_pr' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'tahun_ajaran_uuid' => 'Tahun ajaran tidak boleh kosong',
            'kelas' => 'Kelas tidak boleh kosong',
            'nama_kelas' => 'Nama Kelas tidak boleh kosong',
            'jumlah_lk' => 'Jumlah laki-laki tidak boleh kosong',
            'jumlah_pr' => 'Jumlah perempuan tidak boleh kosong',
        ]);
    }

    public function test_delete_success()
    {
        $user = parent::_createDumUser();
        $kelas = $this->_createDumKelas();
        $responses = $this->actingAs($user)->delete('/kelas/' . $kelas->uuid);
        $responses->assertStatus(302);
        $responses->assertRedirect('/kelas');
        $responses->assertSessionHas('message', 'Kelas Berhasil Dihapus!');
    }
    // NOT TEST
    public function _createDumTahunAjaran()
    {
        return TahunAjaran::create([
            'uuid' => '12345',
            'tahun_awal' => 2023,
            'tahun_akhir' => 2024,
        ]);
    }
    public function _createDumKelas()
    {
        return Kelas::create([
            'uuid' => '123',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
    }
}
