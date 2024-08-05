<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // Fungsi untuk menampilkan halaman landing page
    public function index()
    {
        return view('landing.index');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function profil()
    {
        return view('landing.profil');
    }

}
