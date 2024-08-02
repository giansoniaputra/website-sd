<?php

namespace Tests;

use Illuminate\Support\Facades\DB;
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
