<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Humas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HumasTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/humas');
        $responses->assertStatus(200);
        $responses->assertViewIs('humas.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $responses = $this->actingAs($user)->get('/humas/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('humas.create');
    }

    public function test_tambah_humas_success()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/humas', [
            'nama' => 'instagram',
            'link' => 'https://instagram.com/giansonia.io',
            'photo' => $file
        ]);
        Storage::disk('public')->assertExists('photo-humas/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/humas');
        $responses->assertSessionHas('message', 'Data Berhasil Ditambahkan!');
    }

    public function test_tambah_humas_validation_error()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/humas', [
            'nama' => '',
            'link' => '',
            'photo' => ''
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'nama' => 'Nama tidak boleh kosong',
            'link' => 'Link tidak boleh kosong',
            'photo' => 'Photo tidak boleh kosong',
        ]);
    }

    public function test_tambah_humas_validation_error_bukan_gambar()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048, true);
        $responses = $this->actingAs($user)->post('/humas', [
            'nama' => 'instagram',
            'link' => 'https://instagram.com/giansonia.io',
            'photo' => $file
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'photo' => 'Format photo tidak valid',
        ]);
    }

    public function test_tambah_humas_validation_error_gambar_terlalu_besar()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2049);
        $responses = $this->actingAs($user)->post('/humas', [
            'nama' => 'instagram',
            'link' => 'https://instagram.com/giansonia.io',
            'photo' => $file
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'photo' => 'Photo maximal berukuran 2MB',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $humas = $this->_createDumHumas($file);
        $responses = $this->actingAs($user)->get('/humas/' . $humas->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('humas.edit');
    }

    public function test_update_humas_success_tanpa_photo()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $humas = $this->_createDumHumas($file);
        $responses = $this->actingAs($user)->put('/humas/' . $humas->uuid, [
            'nama' => 'Facebook',
            'link' => 'https://facebook.com/gian.lisda',
        ]);
        $humas->refresh();
        $this->assertEquals('Facebook', $humas->nama);
        $this->assertEquals('https://facebook.com/gian.lisda', $humas->link);
        $responses->assertStatus(302);
        $responses->assertRedirect('/humas');
        $responses->assertSessionHas('message', 'Data Berhasil Diubah!');
    }

    public function test_update_humas_success_dengan_photo()
    {
        $user = parent::_createDumUser();
        $oldFile = parent::_createDumImage(2048);
        $newFile = parent::_createDumImage(2048);
        $humas = $this->_createDumHumas($oldFile);
        $responses = $this->actingAs($user)->put('/humas/' . $humas->uuid, [
            'nama' => 'Facebook',
            'link' => 'https://facebook.com/gian.lisda',
            'photo' => $newFile
        ]);
        $humas->refresh();
        $this->assertEquals('Facebook', $humas->nama);
        $this->assertEquals('https://facebook.com/gian.lisda', $humas->link);
        Storage::disk('public')->assertMissing('photo-humas/' . $oldFile->hashName());
        Storage::disk('public')->assertExists('photo-humas/' . $newFile->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/humas');
        $responses->assertSessionHas('message', 'Data Berhasil Diubah!');
    }

    public function test_delete_humas()
    {
        $user = parent::_createDumUser();
        $file = parent::_createDumImage(2048);
        $humas = $this->_createDumHumas($file);
        $responses = $this->actingAs($user)->delete('/humas/' . $humas->uuid);
        Storage::disk('public')->assertMissing('photo-humas/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/humas');
        $responses->assertSessionHas('message', 'Data Berhasil Dihapus!');
    }



    // NOT FOR TEST
    public function _createDumHumas($file)
    {
        $humas = Humas::create([
            'uuid' => '1',
            'nama' => 'instagram',
            'link' => 'https://instagram.com/giansonia.io',
            'photo' => $file
        ]);

        return $humas;
    }
}
