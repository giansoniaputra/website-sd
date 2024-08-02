<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAjaran::create([
            'uuid' => '12345',
            'tahun_awal' => 2023,
            'tahun_akhir' => 2024,
        ]);
        TahunAjaran::create([
            'uuid' => '123456',
            'tahun_awal' => 2024,
            'tahun_akhir' => 2025,
        ]);
        TahunAjaran::create([
            'uuid' => '1234567',
            'tahun_awal' => 2025,
            'tahun_akhir' => 2026,
        ]);
    }
}
