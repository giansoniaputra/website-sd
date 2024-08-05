<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBerita::create([
            'uuid' => Str::orderedUuid(),
            'kategori' => 'Pramuka'
        ]);
    }
}
