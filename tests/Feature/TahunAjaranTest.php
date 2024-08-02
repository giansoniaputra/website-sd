<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TahunAjaran;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TahunAjaranTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/tahun-ajaran');
        $responses->assertStatus(200);
        $responses->assertViewIs('tahun-ajaran.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/tahun-ajaran/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('tahun-ajaran.create');
    }

    public function test_tambah_data_success()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/tahun-ajaran', [
            'tahun_awal' => 2023,
            'tahun_akhir' => 2024,
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHas('message', 'Tahun Ajaran Berhasil Ditambahkan');
    }

    public function test_tambah_data_validation_error()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->post('/tahun-ajaran', [
            'tahun_awal' => '',
            'tahun_akhir' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'tahun_awal' => 'Tahun awal tidak boleh kosong',
            'tahun_akhir' => 'Tahun akhir tidak boleh kosong',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->get('/tahun-ajaran/' . $tahunAjaran->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('tahun-ajaran.edit');
    }

    public function test_update_data_success()
    {
        $user = parent::_createDumUser();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->put('/tahun-ajaran/' . $tahunAjaran->uuid, [
            'tahun_awal' => 2024,
            'tahun_akhir' => 2025,
        ]);
        $tahunAjaran->refresh();
        $this->assertEquals(2024, $tahunAjaran->tahun_awal);
        $this->assertEquals(2025, $tahunAjaran->tahun_akhir);
        $responses->assertStatus(302);
        $responses->assertRedirect('/tahun-ajaran');
        $responses->assertSessionHas('message', 'Tahun Ajaran Berhasil Diubah');
    }

    public function test_update_data_validation_error()
    {
        $user = parent::_createDumUser();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->put('/tahun-ajaran/' . $tahunAjaran->uuid, [
            'tahun_awal' => '',
            'tahun_akhir' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'tahun_awal' => 'Tahun awal tidak boleh kosong',
            'tahun_akhir' => 'Tahun akhir tidak boleh kosong',
        ]);
    }

    public function test_delete_tahun_ajaran()
    {
        $user = parent::_createDumUser();
        $tahunAjaran = $this->_createDumTahunAjaran();
        $responses = $this->actingAs($user)->delete('/tahun-ajaran/' . $tahunAjaran->uuid);
        $responses->assertStatus(302);
        $responses->assertRedirect('/tahun-ajaran');
        $responses->assertSessionHas('message', 'Tahun Ajaran Berhasil Dihapus');
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
}
