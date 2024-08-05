<?php

namespace Database\Seeders;

use App\Models\PPDB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PPDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PPDB::create([
            'uuid' => '1',
            'nama_kegiatan' => 'Pendaftaran',
            'tanggal_regular' => '2025/01/01',
            'tanggal_prestasi' => '2024/01/01',
        ]);
    }
}
