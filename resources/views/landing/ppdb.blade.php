@extends('landing.layoutLanding.app')

@section('title', 'PPDB')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        <div class="hero-single bg"
            style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="col-xl-6 text-center">
                        <div class="hero-content">
                            <span class="hero-p1 hero-sm d-block text-white">PPDB</span>
                            <h2 class="text-white">
                                SD-IT<span>AL MUKRON</span>
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
    </div>
    <!-- End Hero -->

    <!-- Start PPDB Depan ============================================= -->
    <div class="project-single de-padding">
        <div class="container">
            <h2 class="text-center">
                Brosur PPDB Depan
            </h2>
            <div class="project-wpr">
                <div class="project-img">
                    @foreach ($sampulPpdbs as $sampulPpdb)
                        <img src="/storage/{{ $sampulPpdb->sampul_depan }}" alt="thumb" class="img-fluid w-100">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End PPDB Depan -->

    <!-- Start PPDB Belakang ============================================= -->
    <div class="project-single de-padding">
        <div class="container">
            <h2 class="text-center">
                Brosur PPDB Belakang
            </h2>
            <div class="project-wpr">
                <div class="project-img">
                    @foreach ($sampulPpdbs as $sampulPpdb)
                        <img src="/storage/{{ $sampulPpdb->sampul_belakang }}" alt="thumb" class="img-fluid w-100">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End PPDB Belakang -->



    <!-- Start Tabel PPDB
              ============================================= -->
    <div class="about-12 de-padding" id="tabelPPDB">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Daftar Pendaftaran PPDB</span>
                        <h2 class="text-center">
                            Daftar Pendaftaran PPDB
                        </h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Gelombang Reguler</th>
                                    <th scope="col">Gelombang Prestasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppdbs as $ppdb)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ppdb->nama_kegiatan }}</td>
                                        <td>{{ $ppdb->tanggal_regular }}</td>
                                        <td>{{ $ppdb->tanggal_prestasi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tabel PPDB -->


@endsection
