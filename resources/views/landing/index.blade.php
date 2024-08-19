@extends('landing.layoutLanding.app')

@section('title', 'Halaman Utama')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        <div id="heroCarousel" class="carousel slide hero-sliderr" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($carousels as $key => $carousel)
                    <li data-target="#heroCarousel" data-slide-to="{{ $key }}"
                        @if ($key == 0) class="active" @endif></li>
                @endforeach
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                @foreach ($carousels as $carousel)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="hero-single bg"
                            style="background-image: url('{{ asset('storage/' . $carousel->photo) }}');">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="hero-content">
                                            <span class="hero-p1 hero-sm">Selamat Datang Di </span>
                                            <h2 class="text-white">
                                                SD-IT <br> <span>AL MUKRON</span>
                                            </h2>
                                            <p class="text-white">
                                                Generasi Rabbani Iman Ilmu Amal Akhlaq
                                            </p>
                                            <div class="hro-btn">
                                                <a href="#" class="theme-btn text-white">Lebih Lanjut</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="carousel-item">
                    <div class="hero-single bg" style="background-image: url('/assets2/img/header/1280 X 720.png');">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="hero-content">
                                        <span class="hero-p1 hero-sm">Selamat Datang Di </span>
                                        <h2 class="text-white">
                                            SD-IT <br> <span>AL MUKRON</span>
                                        </h2>
                                        <p class="text-white">
                                            Generasi Rabbani Iman Ilmu Amal Akhlaq
                                        </p>
                                        <div class="hro-btn">
                                            <a href="#" class="theme-btn text-white">Lebih Lanjut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-single bg" style="background-image: url('/assets2/img/header/1280 X 720.png');">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="hero-content">
                                        <span class="hero-p1 hero-sm">Selamat Datang Di </span>
                                        <h2 class="text-white">
                                            SD-IT <br> <span>AL MUKRON</span>
                                        </h2>
                                        <p class="text-white">
                                            Generasi Rabbani Iman Ilmu Amal Akhlaq
                                        </p>
                                        <div class="hro-btn">
                                            <a href="#" class="theme-btn text-white">Lebih Lanjut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div> --}}
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    </div>
    <!-- End Hero -->



    <!-- Start About -->
    <div class="about-2 de-padding">
        <div class="container">
            <div class="about-2-wrapper grid-2">
                <div class="about-2-left">
                    <div class="about-2-pic">
                        @if ($photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Gambar Kepala Sekolah">
                            <!-- Menampilkan gambar dari storage -->
                        @else
                            <img src="/assets2/img/about/470x670.png" alt="Gambar Default">
                            <!-- Menampilkan gambar default jika tidak ada -->
                        @endif
                    </div>
                </div>

                <div class="about-2-right">
                    <div class="about-2-right-content">
                        <span class="hero-p1">Tentang Sekolah</span>
                        <h2>Kepala Sekolah</h2>
                        <p>
                            {!! $sambutan !!}
                        </p>
                        <a href="#" class="theme-btn">Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->


    <!-- Start Blog
                                            ============================================= -->
    <div class="blog-area posi-rel de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="site-title text-center">
                        <h2>Berita Kita</h2>
                    </div>
                </div>
            </div>
            <div class="blog-wrapper grid-3">
                @foreach ($posts as $post)
                    <div class="blog-box">
                        <div class="blog-pic">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        </div>
                        <div class="blog-content">
                            <a href="{{ url('detailBerita/' . $post->slug) }}">
                                <h5>{{ $post->title }}</h5>
                            </a>
                            <span>{{ $post->created_at->format('d F, Y') }}</span>
                            <p>
                                {{ $post->excerpt }}
                            </p>
                            <a href="{{ url('detailBerita/' . $post->slug) }}">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start work
                                            ============================================= -->
    <div id="portfolio" class="portfolio-area posi-rel de-padding">
        {{-- <div class="portfolio-animation">
        <img src="/assets2/img/animation/ani-3.png" alt="thumb">
        <img src="/assets2/img/animation/ani-4.png" alt="thumb">
        <img src="/assets2/img/animation/ani-5.png" alt="thumb">
        <img src="/assets2/img/animation/ani-6.png" alt="thumb">
        <img src="/assets2/img/animation/ani-3.png" alt="thumb">
    </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="site-title text-center">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="portfolio-items-area">
                <div class="row">
                    <div class="col-xl-12 portfolio-content">
                        {{-- <div class="mix-item-menu active-theme text-center">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".kategori1" class="">Kategori 1</button>
                        <button data-filter=".kategori2" class="">Kategori 2</button>
                        <button data-filter=".kategori3" class="">Kategori 3 </button>
                        <button data-filter=".kategori4" class="">Kategori 4</button>
                        <button data-filter=".kategori5" class="">Kategori 5</button>
                    </div> --}}
                        <!-- End Mixitup Nav-->
                        <div class="magnific-mix-gallery masonary">
                            <div id="portfolio-grid" class="portfolio-items">
                                <div class="pf-item video branding photography">
                                    <div class="course-box">
                                        <div class="course-pic">
                                            <img src="/assets2/img/portfolio/800x600.png" class="course-img" alt="thumb">
                                            <div class="port-overlay">
                                                <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                    <i class="ti ti-search"></i>
                                                </a>
                                                <a href="/landing/galeri" class="port-link">
                                                    <i class="ti ti-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item video photography development">
                                    <div class="course-box">
                                        <div class="course-pic">
                                            <img src="/assets2/img/portfolio/800x600.png" class="course-img" alt="thumb">
                                            <div class="port-overlay">
                                                <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                    <i class="ti ti-search"></i>
                                                </a>
                                                <a href="/landing/galeri" class="port-link">
                                                    <i class="ti ti-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item design branding">
                                    <div class="course-box">
                                        <div class="course-pic">
                                            <img src="/assets2/img/portfolio/800x600.png" class="course-img"
                                                alt="thumb">
                                            <div class="port-overlay">
                                                <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                    <i class="ti ti-search"></i>
                                                </a>
                                                <a href="/landing/galeri" class="port-link">
                                                    <i class="ti ti-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item development design photography">
                                    <div class="course-box">
                                        <div class="course-pic">
                                            <img src="/assets2/img/portfolio/800x600.png" class="course-img"
                                                alt="thumb">
                                            <div class="port-overlay">
                                                <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                    <i class="ti ti-search"></i>
                                                </a>
                                                <a href="/landing/galeri" class="port-link">
                                                    <i class="ti ti-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item development photography">
                                    <div class="course-box">
                                        <div class="course-pic">
                                            <img src="/assets2/img/portfolio/800x600.png" class="course-img"
                                                alt="thumb">
                                            <div class="port-overlay">
                                                <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                    <i class="ti ti-search"></i>
                                                </a>
                                                <a href="/landing/galeri" class="port-link">
                                                    <i class="ti ti-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item design photography">
                                    <div class="course-box">
                                        <div class="course-pic">
                                            <img src="/assets2/img/portfolio/800x600.png" class="course-img"
                                                alt="thumb">
                                            <div class="port-overlay">
                                                <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                    <i class="ti ti-search"></i>
                                                </a>
                                                <a href="/landing/galeri" class="port-link">
                                                    <i class="ti ti-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Work -->

    <!-- Start Service
                                        ============================================= -->
    <div class="serv-2-area de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="site-title text-center">
                        {{-- <span class="top-sub">Video</span> --}}
                        <h2>Video Profil SD-IT AL Mukron</h2>
                    </div>
                </div>
            </div>
            <div class="serv-wrapper">
                <div class="video-box">
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service -->

    <!-- Start Google Maps
                                            ============================================= -->
    <div class="map-area de-padding">
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
