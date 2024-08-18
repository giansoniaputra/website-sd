@extends('landing.layoutLanding.app')

@section('title', 'Profil Yayasan')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        <div class="hero-single bg"
            style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="col-xl-6 text-center">
                        <div class="hero-content">
                            <span class="hero-p1 hero-sm d-block text-white">Profil Yayasan</span>
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
    </div>
    <!-- End Hero -->

    <!-- Start Visi Misi Yayasan
                ============================================= -->
    <div class="about-12 de-padding" id="visiMisi">
        <div class="container">
            <div class="about-12-wrapper grid-12">
                <div class="about-12-right">
                    <div class="about-12-right-content">
                        <span class="hero-p1">Visi Misi Yayasan</span>
                        <h2 class="text-center">
                            Visi
                        </h2>
                        <p>
                            {!! $visi !!}
                        </p>
                        <h2>
                            Misi
                        </h2>
                        <p>
                            {!! $misi !!}
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
    <!-- End Visi Misi Yayasan-->

<!-- Start Sejarah
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
                        {!!$sejarah!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sejarah-->

<!-- Start Pengurus ============================================= -->
<div class="rel-project de-pb" id="pengurus">
    <div class="container">
        <h2 class="text-center mb-40 mt-40">Pengurus Yayasan</h2>
        <div class="rel-wpr grid-4">
            @foreach($pengurus as $item)
            <div class="rel-box">
                <div class="rel-img">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <h4 class="mb-10">{{ $item->nama }}</h4>
                    <span><strong>Jabatan :</strong> {{ $item->jabatan }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Pengurus -->


@endsection
