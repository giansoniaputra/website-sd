@extends('landing.layoutLanding.app')

@section('title', 'Galeri')

@section('content')
<!-- Start Hero ============================================= -->
<div id="home" class="hero-section">
    <div class="hero-single bg" style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-xl-6 text-center">
                    <div class="hero-content">
                        <span class="hero-p1 hero-sm d-block text-white">Galeri</span>
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

<!-- Start Video
============================================= -->
<div class="serv-2-area de-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="site-title text-center">
                    <h2>Video Kami</h2>
                </div>
            </div>
        </div>
        <div class="serv-wrapper">
            <div class="row">
                <!-- Video 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="video-box">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_1" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="video-box">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_2" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="video-box">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_3" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <!-- Additional rows for more videos -->
            <div class="row">
                <!-- Video 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="video-box">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_4" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="video-box">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_5" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="video-box">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_6" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Video -->


<!-- Start Foto
		============================================= -->
<div id="portfolio" class="portfolio-area posi-rel de-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="site-title text-center">
                    <h2>Foto Kami</h2>
                </div>
            </div>
        </div>
        <div class="portfolio-items-area">
            <div class="row">
                <div class="col-xl-12 portfolio-content">
                    <div class="mix-item-menu active-theme text-center">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".development" class="">Marketing</button>
                        <button data-filter=".design" class="">Digital</button>
                        <button data-filter=".photography" class="">Creative </button>
                        <button data-filter=".branding" class="">Web Design</button>
                        <button data-filter=".video" class="">Photoshop</button>
                    </div>
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
                                            <a href="project-single.html" class="port-link">
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
                                            <a href="project-single.html" class="port-link">
                                                <i class="ti ti-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-item design branding">
                                <div class="course-box">
                                    <div class="course-pic">
                                        <img src="/assets2/img/portfolio/800x600.png" class="course-img" alt="thumb">
                                        <div class="port-overlay">
                                            <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                <i class="ti ti-search"></i>
                                            </a>
                                            <a href="project-single.html" class="port-link">
                                                <i class="ti ti-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-item development design photography">
                                <div class="course-box">
                                    <div class="course-pic">
                                        <img src="/assets2/img/portfolio/800x600.png" class="course-img" alt="thumb">
                                        <div class="port-overlay">
                                            <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                <i class="ti ti-search"></i>
                                            </a>
                                            <a href="project-single.html" class="port-link">
                                                <i class="ti ti-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-item development photography">
                                <div class="course-box">
                                    <div class="course-pic">
                                        <img src="/assets2/img/portfolio/800x600.png" class="course-img" alt="thumb">
                                        <div class="port-overlay">
                                            <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                <i class="ti ti-search"></i>
                                            </a>
                                            <a href="project-single.html" class="port-link">
                                                <i class="ti ti-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-item design photography">
                                <div class="course-box">
                                    <div class="course-pic">
                                        <img src="/assets2/img/portfolio/800x600.png" class="course-img" alt="thumb">
                                        <div class="port-overlay">
                                            <a href="/assets2/img/portfolio/800x600.png" class="item popup-link">
                                                <i class="ti ti-search"></i>
                                            </a>
                                            <a href="project-single.html" class="port-link">
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
<!-- End Foto -->


@endsection
