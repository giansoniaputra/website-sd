<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Kelas;
use App\Models\Siswa;
use Database\Seeders\KelasSeeder;
use Database\Seeders\SiswaSeeder;
use Database\Seeders\TahunAjaranSeeder;

class SiswaTest extends TestCase
{
    public function test_view_index()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $this->seed([SiswaSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->get('/siswa?kelas_uuid=' . $kelas->uuid);
        $responses->assertStatus(200);
        $responses->assertViewIs('siswa.index');
    }

    public function test_view_create()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $this->seed([SiswaSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->get('/siswa/create?kelas_uuid=' . $kelas->uuid);
        $responses->assertStatus(200);
        $responses->assertViewIs('siswa.create');
    }

    public function test_tambah_data_success()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->post('/siswa', [
            'kelas_uuid' => $kelas->uuid,
            'nama_siswa' => 'Hamni Rahma Hasibuan',
            'jenis_kelamin' => 'perempuan',
        ]);
        $responses->assertStatus(302);
        $responses->assertRedirect('/siswa?kelas_uuid=' . $kelas->uuid);
        $responses->assertSessionHas('message', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function test_tambah_data_validation_error()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->post('/siswa', [
            'kelas_uuid' => $kelas->uuid,
            'nama_siswa' => '',
            'jenis_kelamin' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'nama_siswa' => 'Nama siswa tidak boleh kosong',
            'jenis_kelamin' => 'Jenis kelamin tidak boleh kosong',
        ]);
    }

    public function test_view_edit()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $this->seed([SiswaSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $siswa = Siswa::first(); //MENGAMBIL DATA SISWA PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->get('/siswa/' . $siswa->uuid . '/edit?kelas_uuid=' . $kelas->uuid);
        $responses->assertStatus(200);
        $responses->assertViewIs('siswa.edit');
    }

    public function test_update_data_success()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $this->seed([SiswaSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $siswa = Siswa::first(); //MENGAMBIL DATA SISWA PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->put('/siswa/' . $siswa->uuid, [
            'kelas_uuid' => $kelas->uuid,
            'nama_siswa' => 'Hamni Rahma Hasibuan',
            'jenis_kelamin' => 'perempuan',
        ]);
        $siswa->refresh();
        $this->assertEquals('Hamni Rahma Hasibuan', $siswa->nama_siswa);
        $this->assertEquals('perempuan', $siswa->jenis_kelamin);
        $responses->assertStatus(302);
        $responses->assertRedirect('/siswa?kelas_uuid=' . $kelas->uuid);
        $responses->assertSessionHas('message', 'Data Siswa Berhasil Diubah!');
    }

    public function test_update_data_validation_error()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $this->seed([SiswaSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $siswa = Siswa::first(); //MENGAMBIL DATA SISWA PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->put('/siswa/' . $siswa->uuid, [
            'kelas_uuid' => $kelas->uuid,
            'nama_siswa' => '',
            'jenis_kelamin' => '',
        ]);
        $responses->assertStatus(302);
        $responses->assertSessionHasErrors([
            'nama_siswa' => 'Nama siswa tidak boleh kosong',
            'jenis_kelamin' => 'Jenis kelamin tidak boleh kosong',
        ]);
    }

    public function test_delete_success()
    {
        $user = parent::_createDumUser();
        $this->seed([TahunAjaranSeeder::class]);
        $this->seed([KelasSeeder::class]);
        $this->seed([SiswaSeeder::class]);
        $kelas = Kelas::first(); //MENGAMBIL DATA KELAS PERTAMA PADA DATABASE
        $siswa = Siswa::first(); //MENGAMBIL DATA SISWA PERTAMA PADA DATABASE
        $responses = $this->actingAs($user)->delete('/siswa/' . $siswa->uuid . '?kelas_uuid=' . $kelas->uuid);
        $responses->assertStatus(302);
        $responses->assertRedirect('/siswa?kelas_uuid=' . $kelas->uuid);
        $responses->assertSessionHas('message', 'Data Siswa Berhasil Dihapus!');
    }
}
