<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\SampulPpdb;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SampulPpdbTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->get('/cover-ppdb');
        $res->assertStatus(200);
        $res->assertViewIs('sampul-ppdb.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $res = $this->actingAs($user)->get('/cover-ppdb/create');
        $res->assertStatus(200);
        $res->assertViewIs('sampul-ppdb.create');
    }

    public function test_view_create_dengan_data_sebelumnya_ada()
    {
        $user = parent::_createDumUser();
        $this->_createDumSampul();
        $res = $this->actingAs($user)->get('/cover-ppdb/create');
        $res->assertStatus(200);
        $res->assertViewIs('sampul-ppdb.create');
        $res->assertViewHas('sampul');
    }

    public function test_create_success()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2048);
        $file2 = parent::_createDumImage(2048);
        // $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);
        Storage::disk('public')->assertExists('sampul/' . $file1->hashName());
        Storage::disk('public')->assertExists('sampul/' . $file2->hashName());
        $res->assertStatus(302);
        $res->assertRedirect('/cover-ppdb');
        $res->assertSessionHas('message', 'Sampul Berhasil Dibuat!');
    }
    public function test_create_success_validation_error()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2048);
        $file2 = parent::_createDumImage(2048);
        // $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => '',
            'sampul_belakang' => '',
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'sampul_depan' => 'Tidak boleh kosong',
            'sampul_belakang' => 'Tidak boleh kosong',
        ]);
    }

    public function test_create_success_validation_error_max_image()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2049);
        $file2 = parent::_createDumImage(2049);
        // $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'sampul_depan' => 'Ukuran photo maximal 2MB',
            'sampul_belakang' => 'Ukuran photo maximal 2MB',
        ]);
    }

    public function test_create_success_validation_error_not_image()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2048, true);
        $file2 = parent::_createDumImage(2048, true);
        // $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'sampul_depan' => 'Format photo tidak valid',
            'sampul_belakang' => 'Format photo tidak valid',
        ]);
    }

    public function test_update_success()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2048);
        $file2 = parent::_createDumImage(2048);
        $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);
        Storage::disk('public')->assertExists('sampul/' . $file1->hashName());
        Storage::disk('public')->assertExists('sampul/' . $file2->hashName());
        Storage::disk('public')->assertMissing('sampul/' . $cover['file1']->hashName());
        Storage::disk('public')->assertMissing('sampul/' . $cover['file1']->hashName());
        $res->assertStatus(302);
        $res->assertRedirect('/cover-ppdb');
        $res->assertSessionHas('message', 'Sampul Berhasil Diubah!');
    }

    public function test_update_validation_error_not_image()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2048, true);
        $file2 = parent::_createDumImage(2048, true);
        $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'sampul_depan' => 'Format photo tidak valid',
            'sampul_belakang' => 'Format photo tidak valid',
        ]);
    }

    public function test_update_validation_error_max_image()
    {
        $user = parent::_createDumUser();
        $file1 = parent::_createDumImage(2049);
        $file2 = parent::_createDumImage(2049);
        $cover = $this->_createDumSampul();
        $res = $this->actingAs($user)->post('/cover-ppdb', [
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);
        $res->assertStatus(302);
        $res->assertSessionHasErrors([
            'sampul_depan' => 'Ukuran photo maximal 2MB',
            'sampul_belakang' => 'Ukuran photo maximal 2MB',
        ]);
    }
    // NOT A TEST
    public function _createDumSampul()
    {
        $file1 = parent::_createDumImage(2048);
        $file2 = parent::_createDumImage(2048);
        $sampul =  SampulPpdb::create([
            'uuid' => Str::orderedUuid(),
            'sampul_depan' => $file1,
            'sampul_belakang' => $file2,
        ]);

        return [
            'sampul' => $sampul,
            'file1' => $file1,
            'file2' => $file2,
        ];
    }
}
