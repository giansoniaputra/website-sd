<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'uuid' => '1',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '2',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '3',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '4',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '5',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'III',
            'nama_kelas' => 'Kelas IIIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '6',
            'tahun_ajaran_uuid' => '12345',
            'kelas' => 'III',
            'nama_kelas' => 'Kelas IIIB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);

        //-----------------------------------------
        Kelas::create([
            'uuid' => '7',
            'tahun_ajaran_uuid' => '123456',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '8',
            'tahun_ajaran_uuid' => '123456',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '9',
            'tahun_ajaran_uuid' => '123456',
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '10',
            'tahun_ajaran_uuid' => '123456',
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '11',
            'tahun_ajaran_uuid' => '123456',
            'kelas' => 'III',
            'nama_kelas' => 'Kelas IIIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '12',
            'tahun_ajaran_uuid' => '123456',
            'kelas' => 'III',
            'nama_kelas' => 'Kelas IIIB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        //-----------------------------------------
        Kelas::create([
            'uuid' => '13',
            'tahun_ajaran_uuid' => '1234567',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '14',
            'tahun_ajaran_uuid' => '1234567',
            'kelas' => 'I',
            'nama_kelas' => 'Kelas IB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '16',
            'tahun_ajaran_uuid' => '1234567',
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '17',
            'tahun_ajaran_uuid' => '1234567',
            'kelas' => 'II',
            'nama_kelas' => 'Kelas IIB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '18',
            'tahun_ajaran_uuid' => '1234567',
            'kelas' => 'III',
            'nama_kelas' => 'Kelas IIIA',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
        Kelas::create([
            'uuid' => '19',
            'tahun_ajaran_uuid' => '1234567',
            'kelas' => 'III',
            'nama_kelas' => 'Kelas IIIB',
            'jumlah_lk' => 5,
            'jumlah_pr' => 5,
        ]);
    }
}
