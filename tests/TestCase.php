<?php

namespace Tests;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
    }
}
