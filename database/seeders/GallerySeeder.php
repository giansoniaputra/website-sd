<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            Storage::fake('public');
            $file = UploadedFile::fake()->image('example.jpg')->size(500);
            Gallery::create([
                'uuid' => Str::orderedUuid(),
                'photo' => $file->store('gallery')
            ]);
        }
    }
}
