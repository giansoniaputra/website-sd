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
    public function profilSekolah()
    {
        return view('landing.profilSekolah');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function profilYayasan()
    {
        return view('landing.profilYayasan');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function wakasek()
    {
        return view('landing.wakasek');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function guru()
    {
        return view('landing.guru');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function ppdb()
    {
        return view('landing.ppdb');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function layanan()
    {
        return view('landing.layanan');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function berita()
    {
        return view('landing.berita');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function galeri()
    {
        return view('landing.galeri');
    }
}
