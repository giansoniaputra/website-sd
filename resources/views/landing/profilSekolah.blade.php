@extends('landing.layoutLanding.app')

@section('title', 'Profil Sekolah')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        @if ($sekolah->count() > 0)
            <div class="hero-single bg"
                style="background-image: url('{{ asset('storage/' . $sekolah->first()->photo) }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="col-xl-6 text-center">
                            <div class="hero-content">
                                <span class="hero-p1 hero-sm d-block text-white">Profil Sekolah</span>
                                <h2 class="text-white">
                                    SD-IT<span>AL MUKROM</span>
                                </h2>
                                {{-- <p class="text-white">
                                Chap fantastic skive off chancer knees up starkers easy
                                David bleeding tomfoolery chimney.!
                            </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="hero-single bg"
                style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="col-xl-6 text-center">
                            <div class="hero-content">
                                <span class="hero-p1 hero-sm d-block text-white">Profil Sekolah</span>
                                <h2 class="text-white">
                                    SD-IT<span>AL MUKROM</span>
                                </h2>
                                {{-- <p class="text-white">
                                Chap fantastic skive off chancer knees up starkers easy
                                David bleeding tomfoolery chimney.!
                            </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- End Hero -->

    <!-- Start About
                                                            ============================================= -->
    <div class="about-12 de-padding" id="visiMisi">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Visi Misi Sekolah</span>
                        <h2 class="text-center">
                            Visi
                        </h2>
                        <p>
                            {!! $profile->visi !!}
                        </p>
                        <h2>
                            Misi
                        </h2>
                        <p>
                            {!! $profile->misi !!}
                        </p>
                        {{-- <a href="#" class="theme-btn">Lebih Lanjut</a> --}}
                    </div>
                </div>
                {{-- <div class="about-2-left">
                <div class="about-2-pic">
                    <img src="/assets2/img/about/470x670.png" alt="thumb">
                </div>
            </div> --}}
            </div>
        </div>
    </div>
    <!-- End About-->

    <!-- Start About
                                                            ============================================= -->
    <div class="about-12 de-padding" id="tujuanSekolah">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Tujuan Sekolah</span>
                        <h2>
                            Tujuan
                        </h2>
                        <p>
                            {!! $profile->tujuan !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About-->

    <!-- Start About
                                                            ============================================= -->
    <div class="about-12 de-padding" id="strategi">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Strategi Sekolah</span>
                        <h2>
                            Strategi
                        </h2>
                        <p>
                            {!! $profile->strategi !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About-->

    <!-- Start About
                                                            ============================================= -->
    <div class="about-12 de-padding" id="sejarah">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Sejarah</span>
                        <h2>
                            Sejarah
                        </h2>
                        <p>
                            {!! $profile->sejarah !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About-->

    <!-- Start Informasi
                                                            ============================================= -->
    <div class="about-12 de-padding" id="informasiUmum">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Informasi</span>
                        <h2 class="mb-3">Informasi Sekolah SD-IT Al Mukron</h2>
                        <table class="info-table">
                            <tbody>
                                @foreach ($informasiUmum as $info)
                                    <tr>
                                        <td><strong>{{ $info->title }}</strong></td>
                                        <td>{{ $info->keterangan }}</td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <th>Nama Sekolah</th>
                                    <td>Contoh Sekolah</td>
                                </tr>
                                <tr>
                                    <th>NPSN</th>
                                    <td>12345678</td>
                                </tr>
                                <tr>
                                    <th>Nomor Statistik Sekolah (NSS)</th>
                                    <td>123456789012</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>Jl. Contoh Alamat No. 123, Kota Contoh, Provinsi Contoh</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>(021) 12345678</td>
                                </tr>
                                <tr>
                                    <th>Nomor SK Operasional</th>
                                    <td>SK1234567890</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Informasi-->

    {{-- <!-- Start Sarana & Prasarana -->
<div class="about-12 de-padding" id="informasiUmum">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Sarana & Prasarana</span>
                    <h2>Sarana & Prasarana SD-IT Al Mukron</h2>
                    <table class="info-table-custom">
                        <tbody>
                            <tr>
                                <th>Status Tanah dan Bangunan</th>
                                <td>Milik Sendiri</td>
                            </tr>
                            <tr>
                                <th>Luas Tanah</th>
                                <td>7,300 M2</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td>Kompleks Pesantren Al-Misbah Kel. Argasari Kec. Cihideung Kota Tasikmalaya</td>
                            </tr>
                            <tr>
                                <th>Fasilitas</th>
                                <td>
                                    <ul>
                                        <li>Ruang Kelas</li>
                                        <li>Lapangan Olah Raga</li>
                                        <li>Lab Komputer</li>
                                        <li>Perpustakaan</li>
                                        <li>Lab Kimia</li>
                                        <li>Wifi</li>
                                        <li>Mesjid</li>
                                        <li>Toilet</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Informasi --> --}}

    {{-- <!-- Start Struktur Sekolah -->
<div class="about-12 de-padding" id="informasiUmum">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Struktur Sekolah</span>
                    <h2>Struktur Sekolah SD-IT Al Mukron</h2>
                    <table class="struktur-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>H. Eka Mulyana, S.Ag., M.Pd.I</td>
                                <td>Kepala Sekolah</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Elis Maryani, S.Sos</td>
                                <td>Kepala Tata Usaha</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sugimin, M.Pd.</td>
                                <td>Wakamad Kurikulum</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ika Kartika, M.P.Mat</td>
                                <td>Wakamad Kesiswaan</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jajang Fajar Firdaus, S.Ag</td>
                                <td>Wakamad Sarana Prasarana</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>H. Hadi Kuswanto, M.Si</td>
                                <td>Wakamad Humas</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Junjun Mulyana, M.Pd</td>
                                <td>Pengembang Kurikulum</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Ade Hermawan, S.Pd.</td>
                                <td>Kepala Laboratorium IPA</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Agung Priyatna Yusuf, S.Pd.</td>
                                <td>Kepala Laboratorium Komputer</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Tuti Pitriani, S.Pd</td>
                                <td>Kepala Perpustakaan</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Nita Hendratika, S.Psi</td>
                                <td>Koordinator Bimbingan Konseling</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Struktur Sekolah --> --}}

    {{-- <!-- Start Kepala Madrasah -->
<div class="about-12 de-padding" id="informasiUmum">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Kepala Sekolah</span>
                    <h2>Kepala Sekolah SD-IT Al Mukron</h2>
                    <table class="kepala-madrasah-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Periode Tugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>H. Aam Suryasi, BA</td>
                                <td>1988 - 1992</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>H. Faizal Lutfi, BA</td>
                                <td>1992 - 1993</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Drs. H. Amarullah HS</td>
                                <td>1993 - 1995</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Drs. H. Zaenal Mustofa</td>
                                <td>1995 - 2005</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Drs. H. Omis</td>
                                <td>2005 - 2011</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Drs. Undang Johari</td>
                                <td>2011 - 2023</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>H. Eka Mulyana, S.Ag., M.Pd.I</td>
                                <td>2023 - Sekarang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Kepala Madrasah --> --}}

    <!-- Start Google Maps
                                                            ============================================= -->
    <div class="map-area de-padding" id="lokasi">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="site-title text-center">
                        {{-- <span class="top-sub">Lokasi Kita</span> --}}
                        <h2>Lokasi Kita</h2>
                    </div>
                </div>
            </div>
            <div class="map-wrapper">
                <div class="map-box">
                    <iframe width="100%" height="500"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317713.62740942194!2d106.68942902797458!3d-6.229386700639953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1c5c78ba617%3A0xa4875c2b1c2c8f8d!2sYour+School+Name!5e0!3m2!1sen!2sid!4v1598499656371!5m2!1sen!2sid"
                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Maps -->


@endsection
