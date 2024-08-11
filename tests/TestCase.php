<?php

namespace Tests;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        DB::delete("DELETE FROM users");
        DB::delete("DELETE FROM profiles");
        DB::delete("DELETE FROM informasi_umums");
        DB::delete("DELETE FROM saranas");
        DB::delete("DELETE FROM pegawais");
        DB::delete("DELETE FROM tahun_ajarans");
        DB::delete("DELETE FROM kelas");
        DB::delete("DELETE FROM siswas");
        DB::delete("DELETE FROM ppdbs");
        DB::delete("DELETE FROM humas");
        DB::delete("DELETE FROM kategori_beritas");
        DB::delete("DELETE FROM posts");
        DB::delete("DELETE FROM galleries");
        DB::delete("DELETE FROM videos");
        DB::delete("DELETE FROM kurikulums");
        DB::delete("DELETE FROM sampul_ppdbs");
        DB::delete("DELETE FROM prestasis");
        DB::delete("DELETE FROM carousels");
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

    public function _createDumPDF($size, $notFile = false)
    {
        // SET UP
        Storage::fake('public');
        if ($notFile == false) {
            $file = UploadedFile::fake()->create('document.pdf', $size, 'application/pdf');
        } else {
            $file = UploadedFile::fake()->image('example.jpg')->size($size);
        }
        return $file;
    }
}
