<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Kurikulum;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KurikulumTest extends TestCase
{
    #
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->get('/kurikulum');
        $res->assertStatus(200);
        $res->assertViewIs('kurikulum.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->get('/kurikulum/create');
        $res->assertStatus(200);
        $res->assertViewIs('kurikulum.create');
    }

    public function test_tambah_data_success()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2048);
        $pdf = parent::_createDumPDF(2048);
        $res = $this->actingAs($user)->post('/kurikulum', [
            'nama' => 'nama',
            'photo' => $image,
            'pdf' => $pdf,
        ]);
        Storage::disk('public')->assertExists('photo-kurikulum/' . $image->hashName());
        Storage::disk('public')->assertExists('pdf-kurikulum/' . $pdf->hashName());
        $res->assertStatus(302);
        $res->assertRedirect('/kurikulum');
        $res->assertSessionHas('message', 'Data Berhasil Dibuat!');
    }
    public function test_tambah_data_validasi_eror()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2048);
        $pdf = parent::_createDumPDF(2048);
        $res = $this->actingAs($user)->post('/kurikulum', [
            'nama' => '',
            'photo' => '',
            'pdf' => '',
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'nama' => 'Tidak boleh kosong',
            'photo' => 'Photo tidak boleh kosong',
            'pdf' => 'PDF tidak boleh kosong',
        ]);
    }
    public function test_tambah_data_validasi_eror_not_pdf_and_image()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2048, true);
        $pdf = parent::_createDumPDF(2048, true);
        $res = $this->actingAs($user)->post('/kurikulum', [
            'nama' => 'nama',
            'photo' => $image,
            'pdf' => $pdf,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'photo' => 'Format photo tidak valid',
            'pdf' => 'Pastikan yang anda upload adalah pdf',
        ]);
    }
    public function test_tambah_data_validasi_eror_max_pdf_and_image()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2049);
        $pdf = parent::_createDumPDF(2049);
        $res = $this->actingAs($user)->post('/kurikulum', [
            'nama' => 'nama',
            'photo' => $image,
            'pdf' => $pdf,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'photo' => 'Ukuran photo maximal 2MB',
            'pdf' => 'Ukuran PDF maximal 2MB',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $dum = $this->_createDumKurikulum();
        $res = $this->actingAs($user)->get('/kurikulum/' . $dum['kurikulum']->uuid . '/edit');
        $res->assertStatus(200);
        $res->assertViewIs('kurikulum.edit');
    }

    public function test_update_success()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2048);
        $pdf = parent::_createDumPDF(2048);
        $dum = $this->_createDumKurikulum();
        $res = $this->actingAs($user)->put('/kurikulum/' . $dum['kurikulum']->uuid, [
            'nama' => 'nama 2',
            'photo' => $image,
            'pdf' => $pdf,
        ]);
        $dum['kurikulum']->refresh();
        Storage::disk('public')->assertMissing('photo-kurikulum/' . $dum['photo']->hashName());
        Storage::disk('public')->assertExists('photo-kurikulum/' . $image->hashName());
        Storage::disk('public')->assertMissing('pdf-kurikulum/' . $dum['pdf']->hashName());
        Storage::disk('public')->assertExists('pdf-kurikulum/' . $pdf->hashName());
        $this->assertEquals('nama 2', $dum['kurikulum']->nama);
        $res->assertStatus(302);
        $res->assertRedirect('/kurikulum');
        $res->assertSessionHas('message', 'Data Berhasil Diubah!');
    }

    public function test_update_validasi_error_tanpa_gambar()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2048);
        $pdf = parent::_createDumPDF(2048);
        $dum = $this->_createDumKurikulum();
        $res = $this->actingAs($user)->put('/kurikulum/' . $dum['kurikulum']->uuid, [
            'nama' => '',
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'nama' => 'Tidak boleh kosong',
        ]);
    }
    public function test_update_validasi_error_gambar_dan_pdf_tidak_valid()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2048, true);
        $pdf = parent::_createDumPDF(2048, true);
        $dum = $this->_createDumKurikulum();
        $res = $this->actingAs($user)->put('/kurikulum/' . $dum['kurikulum']->uuid, [
            'nama' => 'nama 2',
            'photo' => $image,
            'pdf' => $pdf,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'photo' => 'Format photo tidak valid',
            'pdf' => 'Pastikan yang anda upload adalah pdf',
        ]);
    }
    public function test_update_validasi_error_gambar_dan_pdf_max()
    {
        $user = parent::_createDumUser();
        $image = parent::_createDumImage(2049);
        $pdf = parent::_createDumPDF(2049);
        $dum = $this->_createDumKurikulum();
        $res = $this->actingAs($user)->put('/kurikulum/' . $dum['kurikulum']->uuid, [
            'nama' => 'nama 2',
            'photo' => $image,
            'pdf' => $pdf,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'photo' => 'Ukuran photo maximal 2MB',
            'pdf' => 'Ukuran PDF maximal 2MB',
        ]);
    }

    public function test_delete()
    {
        $user = parent::_createDumUser();
        $dum = $this->_createDumKurikulum();
        $res = $this->actingAs($user)->delete('/kurikulum/' . $dum['kurikulum']->uuid);
        Storage::disk('public')->assertMissing('photo-kurikulum/' . $dum['photo']->hashName());
        Storage::disk('public')->assertMissing('pdf-kurikulum/' . $dum['pdf']->hashName());
        $res->assertStatus(302);
        $res->assertRedirect('/kurikulum');
        $res->assertSessionHas('message', 'Data Berhasil Dihapus!');
    }

    // NOT A TEST
    public function _createDumKurikulum()
    {
        $image = parent::_createDumImage(2048);
        $pdf = parent::_createDumPDF(2048);
        $kurikulum = Kurikulum::create([
            'uuid' => Str::orderedUuid(),
            'nama' => 'nama',
            'photo' => $image,
            'pdf' => $pdf,
        ]);

        return [
            'photo' => $image,
            'pdf' => $pdf,
            'kurikulum' => $kurikulum
        ];
    }
}
