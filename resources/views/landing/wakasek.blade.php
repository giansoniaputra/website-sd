@extends('landing.layoutLanding.app')

@section('title', 'Wakasek')

@section('content')
<!-- Start Hero ============================================= -->
<div id="home" class="hero-section">
    <div class="hero-single bg" style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-xl-6 text-center">
                    <div class="hero-content">
                        <span class="hero-p1 hero-sm d-block text-white">Wakasek</span>
                        <h2 class="text-white">
                            SD-IT<span>AL MUKRON</span>
                        </h2>
                        <p class="text-white">
                            Chap fantastic skive off chancer knees up starkers easy
                            David bleeding tomfoolery chimney.!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero -->

<!-- Start Kurikulum ============================================= -->
<div class="about-12 de-padding" id="kurikulum">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Kurikulum</span>
                    <h2 class="text-center">
                        Kurikulum Sekolah
                    </h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Link Download PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kelas 1</td>
                                <td><img src="/assets2/img/visi.png" alt="Visi Yayasan" style="width: 100px;"></td>
                                <td><a href="#" class="btn btn-primary">Download PDF</a></td>
                            </tr>
                            <tr>
                                <td>Kelas 2</td>
                                <td><img src="/assets2/img/misi.png" alt="Misi Yayasan" style="width: 100px;"></td>
                                <td><a href="#" class="btn btn-primary">Download PDF</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Kurikulum -->

<!-- Start Kesiswaan ============================================= -->
<div class="about-12 de-padding" id="pesertaDidik">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Kesiswaan</span>
                    <h2 class="text-center">
                        Peserta Didik
                    </h2>

                    <!-- Tahun Ajaran 2024/2025 -->
                    <h5 class="text-center">Tahun Ajaran 2024/2025</h5>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#">Kelas I</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas II</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas III</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas IV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas V</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas VI</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="kelasX2024" class="tab-pane fade show active">
                            <table class="table table-striped table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Laki-Laki</th>
                                        <th>Perempuan</th>
                                        <th>Jumlah</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>IIS I</td>
                                        <td>15</td>
                                        <td>15</td>
                                        <td>30</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailModal1">Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Tabs for Kelas XI and XII go here -->
                    </div>

                    <!-- Tahun Ajaran 2023/2024 -->
                    <h5 class="text-center mt-5">Tahun Ajaran 2023/2024</h5>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#">Kelas I</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas II</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas III</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas IV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas V</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#">Kelas VI</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="kelasX2023" class="tab-pane fade show active">
                            <table class="table table-striped table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Laki-Laki</th>
                                        <th>Perempuan</th>
                                        <th>Jumlah</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>MIA I</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>29</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailModal2">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>MIA II</td>
                                        <td>28</td>
                                        <td>28</td>
                                        <td>56</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailModal3">Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Tabs for Kelas XI and XII go here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Kesiswaan -->

<!-- Start Modals for Detail ============================================= -->
<div class="modal fade" id="detailModal1" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel1">Detail Peserta Didik IIS I</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <!-- More rows can be added here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Start Modals for Detail ============================================= -->
<div class="modal fade" id="detailModal2" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel2">Detail Peserta Didik MIA I</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <!-- More rows can be added here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Start Modals for Detail ============================================= -->
<div class="modal fade" id="detailModal3" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel3">Detail Peserta Didik MIA II</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aisyah</td>
                            <td>Perempuan</td>
                        </tr>
                        <!-- More rows can be added here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add more modals here for other classes -->

<!-- Start Prestasi ============================================= -->
<div class="about-12 de-padding" id="prestasi">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Prestasi</span>
                    <h2 class="text-center">
                        Prestasi Peserta Didik
                    </h2>
                    <table id="prestasiTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Event</th>
                                <th>Penyelenggara</th>
                                <th>Tanggal</th>
                                <th>Prestasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Porsada</td>
                                <td>Priangan Timur</td>
                                <td>12 Mei 2024</td>
                                <td>Juara 1 Cabang Basket</td>
                            </tr>
                            <!-- Tambahkan baris lainnya di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Prestasi -->

<!-- Start Sarana & Prasarana
		============================================= -->
<div class="rel-project de-pb" id="saranaPrasarana">
    <div class="container">
        <h2 class="text-center mb-40 mt-40">Sarana & Prasarana</h2>
        <div class="rel-wpr grid-4">
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/assets2/img/portfolio/570x570.png" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">Nama Sarana</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sarana & Prasarana -->

<!-- Start Humas
		============================================= -->
<div class="service-area posi-rel bg de-padding" id="humas">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="site-title text-center">
                    <h2>Humas</h2>
                </div>
            </div>
        </div>
        <div class="service-wrapper grid-2">
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/whatsapp.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Whatsapp</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/youtube.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Youtube</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/instagram.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Instagram</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/facebook.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Facebook</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/twitter.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Twitter</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/tik-tok.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Tiktok</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/email (1).png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Email</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/school.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Web PPDB</h4>
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p>
                    <a href="#"> Learn More </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Humas -->

@endsection
