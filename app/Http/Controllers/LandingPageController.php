<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PPDB;
use App\Models\Humas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Video;
use App\Models\Sarana;
use App\Models\Gallery;
use App\Models\Pegawai;
use App\Models\Profile;
use App\Models\Carousel;
use App\Models\Prestasi;
use App\Models\Kurikulum;
use App\Models\SampulPpdb;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\InformasiUmum;
use App\Models\KategoriBerita;
use App\Models\PelayananPublic;
use Illuminate\Support\Facades\View;


class LandingPageController extends Controller
{
    // Fungsi untuk menampilkan halaman landing page
    public function index()
    {
        // Mengambil data profil sekolah dari tabel profiles
        $profile = Profile::where('type', 'sekolah')->first(); // Mengambil profil dengan tipe sekolah

        $data = [];
        if ($profile) {
            $data['sambutan'] = $profile->sambutan; // Mengambil sambutan
            $data['photo'] = $profile->photo; // Mengambil path gambar
        } else {
            $data['sambutan'] = 'Belum ada sambutan dari kepala sekolah.';
            $data['photo'] = null; // Jika gambar tidak ada
        }

        // Mengambil data berita dari database
        $data['posts'] = Post::latest()->limit(3)->get(); // Mengambil 3 post terbaru
        $data['carousels'] = Carousel::where('type', 'home')->get();
        return view('landing.index', $data); // Mengirim data ke view
    }




    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function profilSekolah()
    {
        $data = [
            'profile' => Profile::where('type', 'sekolah')->first() ?? new Profile(),
            'informasiUmum' => InformasiUmum::all() ?? collect(),
        ];
        $data['sekolah'] = Carousel::where('type', 'sekolah')->get();

        return view('landing.profilSekolah', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function profilYayasan()
    {
        $data = [];
        $cek = Profile::first();
        if ($cek) {
            $data['visi'] = $cek->visi;
            $data['misi'] = $cek->misi;
            $data['sejarah'] = $cek->sejarah;
            $data['sejarah'] = $cek->sejarah;
        } else {
            $data['visi'] = 'belum ada visi';
            $data['misi'] = 'belum ada misi';
            $data['sejarah'] = 'belum ada sejarah';
            $data['sejarah'] = 'belum ada sejarah';
        }

        // Ambil data pengurus yayasan
        $data['pengurus'] = Pegawai::where('type', 'pengurus')->get(); // Filter by type = pengurus
        $data['yayasan'] = Carousel::where('type', 'yayasan')->get();

        return view('landing.profilYayasan', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function wakasek()
    {
        $data = [
            'sarana' => Sarana::all(),
            'tahun_ajaran' => TahunAjaran::orderBy('id', 'desc')->get(),
            'prestasi' => Prestasi::latest()->paginate(5),
            'kurikulums' => Kurikulum::all(),
            'humas' => Humas::all(),
        ];
        $data['wakasek'] = Carousel::where('type', 'wakasek')->get();
        return view('landing.wakasek', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function guru()
    {
        $data = [
            'guru' => Pegawai::where('type', 'guru')->get(),
            'staff' => Pegawai::where('type', 'staff')->get(),
        ];
        $data['guru_banner'] = Carousel::where('type', 'guru')->get();

        return view('landing.guru', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function ppdb()
    {
        $data = [
            'ppdbs' => PPDB::all(),
            'sampulPpdbs' => SampulPpdb::all(),
        ];
        $data['ppdb_banner'] = Carousel::where('type', 'ppdb')->get();

        return view('landing.ppdb', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function layanan()
    {
        $data = [
            'pelayananPublics' => PelayananPublic::all()
        ];
        $data['pelayanan'] = Carousel::where('type', 'layanan_publik')->get();

        return view('landing.layanan', $data);
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function berita()
    {
        $data = [
            'posts' => Post::latest()->paginate(5),
            'kategoris' => KategoriBerita::all(),
            'recentPosts' => Post::latest()->take(3)->get(),
        ];
        $data['berita_banner'] = Carousel::where('type', 'berita')->get();

        return view('landing.berita', $data);
    }

    public function filter(Request $request)
    {
        $kategoriId = $request->input('kategori_id');
        $posts = Post::where('category_id', $kategoriId)->latest()->paginate(10);
        return view('berita-list', compact('posts'));
    }

    // Tambahkan fungsi lain untuk halaman lain yang dibutuhkan
    public function galeri()
    {
        $data = [

            'galleries' => Gallery::latest()->paginate(12, ['*'], 'galleries'),
            'videos' => Video::latest()->paginate(4, ['*'], 'videos')
            // 'tahun_ajaran' => TahunAjaran::orderBy('id', 'desc')->get(),
            // 'prestasi' => Prestasi::latest()->paginate(5),
        ];
        $data['galeri_banner'] = Carousel::where('type', 'galeri')->get();

        return view('landing.galeri', $data);
    }

    public function renderSiswa(Request $request)
    {
        $siswa = Siswa::where('kelas_uuid', $request->uuid)->orderBy('nama_siswa')->get();
        $view = View::make('landing.partial.renderSiswa', ['siswa' => $siswa])->render();
        return response()->json(['view' => $view]);
    }
}
