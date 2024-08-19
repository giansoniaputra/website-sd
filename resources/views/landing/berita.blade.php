@extends('landing.layoutLanding.app')

@section('title', 'Berita')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        <div class="hero-single bg"
            style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="col-xl-6 text-center">
                        <div class="hero-content">
                            <span class="hero-p1 hero-sm d-block text-white">Berita</span>
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

    <!-- Start Blog Single -->
    <div class="blog-single de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-single-wpr">
                        <div class="blog-wrapper grid-2 mb-30">
                            @foreach ($posts as $post)
                                <div class="blog-box">
                                    <div class="blog-pic">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="thumb">
                                    </div>
                                    <div class="blog-content">
                                        <a href="{{ route('detailBerita.show', $post->slug) }}">
                                            <h5>{{ $post->title }}</h5>
                                        </a> <span>{{ $post->published_at }}</span>
                                        <p>
                                            {{ Str::limit($post->excerpt, 100) }}
                                        </p>
                                        <a href="{{ route('detailBerita.show', $post->slug) }}">Read More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="col-xl-4">
                    <aside class="sidebar">
                        <!-- Category -->
                        <div class="site-widget category">
                            <h4 class="site-widget-title">Category</h4>
                            <ul class="site-widget-list">
                                @foreach ($kategoris as $kategori)
                                    <li>
                                        <a href="#">{{ $kategori->kategori }} <i
                                                class="ti ti-angle-double-right"></i></a>
                                    </li>
                                @endforeach
                        </div>

                        <!-- Recent Post -->
                        <div class="site-widget post">
                            <h4 class="site-widget-title">Recent Post</h4>
                            <ul class="site-widget-list">
                                <li>
                                    <a href="#">
                                        <div class="site-widget-post d-flex align-items-center">
                                            <div class="site-widget-post-pic">
                                                <img src="/assets2/img/singlepost/image bg shape.png" alt="thumb">
                                            </div>
                                            <div class="site-widget-post-info">
                                                <h5>Maboriosam in a Nescing</h5>
                                                <span>22 July, 2020. Monday</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="site-widget-post d-flex align-items-center">
                                            <div class="site-widget-post-pic">
                                                <img src="/assets2/img/singlepost/image bg shape.png" alt="thumb">
                                            </div>
                                            <div class="site-widget-post-info">
                                                <h5>Maboriosam in a Nescing</h5>
                                                <span>22 July, 2020. Monday</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="site-widget-post d-flex align-items-center">
                                            <div class="site-widget-post-pic">
                                                <img src="/assets2/img/singlepost/image bg shape.png" alt="thumb">
                                            </div>
                                            <div class="site-widget-post-info">
                                                <h5>Maboriosam in a Nescing</h5>
                                                <span>22 July, 2020. Monday</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Single -->

@endsection
