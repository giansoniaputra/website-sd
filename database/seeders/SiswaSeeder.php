<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'uuid' => '1',
            'kelas_uuid' => '1',
            'nama_siswa' => 'Gian Sonia',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        Siswa::create([
            'uuid' => '2',
            'kelas_uuid' => '1',
            'nama_siswa' => 'M.Syahril Suhandi',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        Siswa::create([
            'uuid' => '3',
            'kelas_uuid' => '3',
            'nama_siswa' => 'Salman Alfarizi',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        Siswa::create([
            'uuid' => '4',
            'kelas_uuid' => '3',
            'nama_siswa' => 'Faris',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
    }
}
