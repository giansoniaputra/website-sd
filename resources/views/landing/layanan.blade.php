@extends('landing.layoutLanding.app')

@section('title', 'Layanan Publik')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        @if ($pelayanan->count() > 0)
            <div class="hero-single bg"
                style="background-image: url('{{ asset('storage/' . $pelayanan->first()->photo) }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="col-xl-6 text-center">
                            <div class="hero-content">
                                <span class="hero-p1 hero-sm d-block text-white">Layanan Publik</span>
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
                                <span class="hero-p1 hero-sm d-block text-white">Layanan Publik</span>
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

    {{-- <!-- Start Gambar ============================================= -->
<div class="project-single de-padding">
    <div class="container">
        <h2 class="text-center">
            Layanan Dasar Publik
        </h2>
        <div class="project-wpr">
            <div class="project-img">
                <img src="/assets2/img/portfolio/570x570.png" alt="thumb" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>
<!-- End Gambar --> --}}

    <!-- Start Layanan Publik ============================================= -->
    <div class="about-12 de-padding" id="kurikulum">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Standar Pelayanan Publik (SPP)</span>
                        <h2 class="text-center">
                            Standar Pelayanan Publik (SPP)
                        </h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Link Download PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelayananPublics as $pelayananPublic)
                                    <tr>
                                        <td>{{ $pelayananPublic->nama }}</td>
                                        <td>
                                            @if ($pelayananPublic->pdf)
                                                <a href="{{ asset('storage/' . $pelayananPublic->pdf) }}" target="_blank"
                                                    class="btn btn-primary">
                                                    Download PDF
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Layanan Publik -->


    @endsection
