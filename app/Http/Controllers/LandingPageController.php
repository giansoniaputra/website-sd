<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\Profile;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // Fungsi untuk menampilkan halaman landing page
    public function index()
    {
        $data = [];
        return view('landing.index', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function profilSekolah()
    {
        return view('landing.profilSekolah');
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function profilYayasan()
    {
        $data = [];
        $cek = Profile::first();
        if($cek) {
            $data['visi'] = $cek->visi;
            $data['misi'] = $cek->misi;
        } else {
            $data['visi'] = 'belum ada visi';
            $data['misi'] = 'belum ada misi';
        }
        return view('landing.profilYayasan', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function wakasek()
    {
        $data = [
            'sarana' => Sarana::all(),
            'tahun_ajaran' => TahunAjaran::orderBy('id', 'desc')->get()
        ];
        return view('landing.wakasek', $data);
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
