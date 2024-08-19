@extends('landing.layoutLanding.app')

@section('title', 'Guru')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        <div class="hero-single bg"
            style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="col-xl-6 text-center">
                        <div class="hero-content">
                            <span class="hero-p1 hero-sm d-block text-white">Guru & Staff</span>
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

    <!-- Start Guru
              ============================================= -->
    <div class="rel-project de-pb" id="guru">
        <div class="container">
            <h2 class="text-center mb-40 mt-40">Guru</h2>
            <div class="rel-wpr grid-4">
                @foreach ($guru as $guru)
                    <div class="rel-box">
                        <div class="rel-img">
                            <img src="/storage/{{ $guru->photo }}" alt="thumb">
                        </div>
                        <div class="rel-info mt-20 text-center">
                            <a href="#">
                                <h4 class="mb-10">{{ $guru->nama }}</h4>
                            </a>
                            <span><strong>Ampuan :</strong> {{ $guru->ampuan }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Guru -->

    <!-- Start Staff
              ============================================= -->
    <div class="rel-project de-pb" id="staff">
        <div class="container">
            <h2 class="text-center mb-40 mt-40">Staff</h2>
            <div class="rel-wpr grid-4">
                @foreach ($staff as $staff)
                    <div class="rel-box">
                        <div class="rel-img">
                            <img src="/storage/{{ $staff->photo }}" alt="thumb">
                        </div>
                        <div class="rel-info mt-20 text-center">
                            <a href="#">
                                <h4 class="mb-10">{{ $staff->nama }}</h4>
                            </a>
                            <span><strong>Jabatan :</strong> {{ $staff->ampuan }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Staff -->


@endsection
