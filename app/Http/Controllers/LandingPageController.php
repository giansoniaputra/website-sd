<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sarana;
use App\Models\Profile;
use App\Models\Prestasi;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LandingPageController extends Controller
{
    // Fungsi untuk menampilkan halaman landing page
    public function index()
    {
        // Mengambil data profile sekolah dari tabel profiles
        $profile = Profile::where('type', 'sekolah')->first(); // Pastikan menggunakan kondisi yang tepat untuk profil sekolah

        $data = [];
        if ($profile) {
            $data['sambutan'] = $profile->sambutan; // Mengambil sambutan dari kolom sambutan
        } else {
            $data['sambutan'] = 'Belum ada sambutan dari kepala sekolah.'; // Jika tidak ada data
        }

        return view('landing.index', $data); // Mengirim data ke view
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
        if ($cek) {
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
            'tahun_ajaran' => TahunAjaran::orderBy('id', 'desc')->get(),
            'prestasi' => Prestasi::latest()->paginate(5),
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

    public function renderSiswa(Request $request)
    {
        $siswa = Siswa::where('kelas_uuid', $request->uuid)->orderBy('nama_siswa')->get();
        $view = View::make('landing.partial.renderSiswa', ['siswa' => $siswa])->render();
        return response()->json(['view' => $view]);
    }
}
