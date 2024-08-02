<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PegawaiTest extends TestCase
{
    public function test_view_index()
    {
        $user = $this->_createDumUser();
        $responses = $this->actingAs($user)->get('/pegawai');
        $responses->assertStatus(200);
        $responses->assertViewIs('pegawai.index');
    }

    public function test_view_create()
    {
        $user = $this->_createDumUser();
        $responses = $this->actingAs($user)->get('/pegawai/create');
        $responses->assertStatus(200);
        $responses->assertViewIs('pegawai.create');
    }

    public function test_tambah_data_success()
    {
        $user = $this->_createDumUser();
        $file = $this->_createDumImage(2048);
        $responses = $this->actingAs($user)->post('/pegawai', [
            'type' => 'guru',
            'nama' => 'Gian Sonia',
            'status' => 'PNS',
            'jabatan' => 'Pembina',
            'pendidikan' => 'S3',
            'ampuan' => 'TIK',
            'photo' => $file
        ]);
        Storage::disk('public')->assertExists('photo-pegawai/' . $file->hashName());
        $responses->assertStatus(302);
        $responses->assertSessionHas('message', 'Data Pegawai Berhasil Ditambahkan!');
    }

    public function test_tambah_validation_error()
    {
        $user = $this->_createDumUser();
        $responses = $this->actingAs($user)->post('/pegawai', [
            'type' => '',
            'nama' => '',
            'status' => '',
            'jabatan' => '',
            'pendidikan' => '',
            'ampuan' => '',
            'photo' => ''
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(
            [
                'type' => 'Tipe pegawai tidak boleh kosong',
                'nama' => 'Nama tidak boleh kosong',
                'status' => 'Status tidak boleh kosong',
                'jabatan' => 'Jabatan tidak boleh kosong',
                'pendidikan' => 'Pendidikan tidak boleh kosong',
                'ampuan' => 'Ampuan tidak boleh kosong',
                'photo' => 'Photo tidak boleh kosong',
            ]
        );
    }

    public function test_tambah_validation_gambar_tidak_valid()
    {
        $user = $this->_createDumUser();
        $file = $this->_createDumImage(2048, true);
        $responses = $this->actingAs($user)->post('/pegawai', [
            'type' => 'guru',
            'nama' => 'Gian Sonia',
            'status' => 'PNS',
            'jabatan' => 'Pembina',
            'pendidikan' => 'S3',
            'ampuan' => 'TIK',
            'photo' => $file
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(
            ['photo' => 'Format photo tidak valid']
        );
    }

    public function test_tambah_validation_gambar_maximum()
    {
        $user = $this->_createDumUser();
        $file = $this->_createDumImage(2049);
        $responses = $this->actingAs($user)->post('/pegawai', [
            'type' => 'guru',
            'nama' => 'Gian Sonia',
            'status' => 'PNS',
            'jabatan' => 'Pembina',
            'pendidikan' => 'S3',
            'ampuan' => 'TIK',
            'photo' => $file
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors(
            ['photo' => 'Maximal ukuran photo adalah 2MB']
        );
    }

    public function test_view_edit_pegawai()
    {
        $user = $this->_createDumUser();
        $pegawai = $this->_createDumPegawai();
        $responses = $this->actingAs($user)->get('/pegawai/' . $pegawai['pegawai']->uuid . '/edit');
        $responses->assertStatus(200);
        $responses->assertViewIs('pegawai.edit');
    }

    public function test_update_pegawai_success_tampa_gambar_baru()
    {
        $user = $this->_createDumUser();
        $dumppegawai = $this->_createDumPegawai();
        $pegawai = $dumppegawai['pegawai'];
        $responses = $this->actingAs($user)->put('/pegawai/12345', [
            'type' => 'staff',
            'nama' => 'Gian Sonia 2',
            'status' => 'PNS 2',
            'jabatan' => 'Pembina 2',
            'pendidikan' => 'S3 2',
            'ampuan' => 'TIK 2',
        ]);
        $pegawai->refresh();
        $this->assertEquals('staff', $pegawai->type);
        $this->assertEquals('Gian Sonia 2', $pegawai->nama);
        $this->assertEquals('PNS 2', $pegawai->status);
        $this->assertEquals('Pembina 2', $pegawai->jabatan);
        $this->assertEquals('S3 2', $pegawai->pendidikan);
        $this->assertEquals('TIK 2', $pegawai->ampuan);
        $responses->assertStatus(302);
        $responses->assertRedirect('/pegawai');
        $responses->assertSessionHas('message', 'Data Pegawai Berhasil Diubah!');
    }

    public function test_update_pegawai_success_dengan_gambar_baru()
    {
        $user = $this->_createDumUser();
        $dumppegawai = $this->_createDumPegawai();
        $file = $this->_createDumImage(2048);
        $pegawai = $dumppegawai['pegawai'];
        $oldFile = $dumppegawai['oldFile'];
        $responses = $this->actingAs($user)->put('/pegawai/12345', [
            'type' => 'staff',
            'nama' => 'Gian Sonia 2',
            'status' => 'PNS 2',
            'jabatan' => 'Pembina 2',
            'pendidikan' => 'S3 2',
            'ampuan' => 'TIK 2',
            'photo' => $file
        ]);
        Storage::disk('public')->assertExists('photo-pegawai/' . $file->hashName());
        Storage::disk('public')->assertMissing('photo-pegawai/' . $oldFile->hashName());
        $pegawai->refresh();
        $this->assertEquals('staff', $pegawai->type);
        $this->assertEquals('Gian Sonia 2', $pegawai->nama);
        $this->assertEquals('PNS 2', $pegawai->status);
        $this->assertEquals('Pembina 2', $pegawai->jabatan);
        $this->assertEquals('S3 2', $pegawai->pendidikan);
        $this->assertEquals('TIK 2', $pegawai->ampuan);
        $this->assertEquals('photo-pegawai/' . $file->hashName(), $pegawai->photo);
        $responses->assertStatus(302);
        $responses->assertRedirect('/pegawai');
        $responses->assertSessionHas('message', 'Data Pegawai Berhasil Diubah!');
    }

    public function test_delete_pegawai()
    {
        $user = $this->_createDumUser();
        $dumppegawai = $this->_createDumPegawai();
        $oldFile = $dumppegawai['oldFile'];
        $responses = $this->actingAs($user)->delete('/pegawai/12345');
        Storage::disk('public')->assertMissing('photo-pegawai/' . $oldFile->hashName());
        $responses->assertStatus(302);
        $responses->assertRedirect('/pegawai');
        $responses->assertSessionHas('message', 'Data Pegawai Berhasil Dihapus!');
    }

    // BUKAN METHOD UNTUK TESTING GUYS JANGAN DI COBA DI FRONT END
    public function _createDumUser()
    {
        $user = User::create([
            'uuid' => '12345',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);

        return $user;
    }

    public function _createDumImage($size, $notFile = false)
    {
        // SET UP
        Storage::fake('public');
        if ($notFile == false) {
            $file = UploadedFile::fake()->image('example.jpg')->size($size);
        } else {
            $file = UploadedFile::fake()->create('document.pdf', 500);
        }
        return $file;
    }

    public function _createDumPegawai($size = 2048, $notFile = false)
    {
        $data = [
            'uuid' => '12345',
            'type' => 'guru',
            'nama' => 'Gian Sonia',
            'status' => 'PNS',
            'jabatan' => 'Pembina',
            'pendidikan' => 'S3',
            'ampuan' => 'TIK',
        ];
        $file = $this->_createDumImage($size);
        $data['photo'] = $file;
        return
            [
                'pegawai' => Pegawai::create($data),
                'oldFile' => $file,
            ];
    }
}
