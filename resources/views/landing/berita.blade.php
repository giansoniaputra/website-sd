@extends('landing.layoutLanding.app')

@section('title', 'Berita')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        @if ($berita_banner->count() > 0)
            <div class="hero-single bg"
                style="background-image: url('{{ asset('storage/' . $berita_banner->first()->photo) }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="col-xl-6 text-center">
                            <div class="hero-content">
                                <span class="hero-p1 hero-sm d-block text-white">Berita</span>
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
                                <span class="hero-p1 hero-sm d-block text-white">Berita</span>
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

    <!-- Start Blog Single -->
    <div class="blog-single de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-single-wpr">
                        <div class="blog-wrapper grid-2 mb-30">
                            @foreach ($posts as $post)
                                <div class="blog-box" data-category="{{ $post->category_id }}">
                                    <div class="blog-pic">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="thumb">
                                    </div>
                                    <div class="blog-content">
                                        <a href="{{ route('detailBerita.show', $post->slug) }}">
                                            <h5>{{ $post->title }}</h5>
                                        </a>
                                        <span>{{ date('Y-m-d', strtotime($post->published_at)) }} &nbsp; &nbsp; Kategori:
                                            {{ $post->category->kategori }}</span>
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
                                        <a href="#" data-category="{{ $kategori->id }}">{{ $kategori->kategori }} <i
                                                class="ti ti-angle-double-right"></i></a>
                                    </li>
                                @endforeach
                        </div>

                        <!-- Recent Post -->
                        <div class="site-widget post">
                            <h4 class="site-widget-title">Recent Post</h4>
                            <ul class="widget-post">
                                @foreach ($recentPosts as $post)
                                    <li>
                                        <a href="{{ route('detailBerita.show', $post->slug) }}">
                                            <div class="site-widget-post d-flex align-items-center mb-3">
                                                <!-- added mb-3 class -->
                                                <div class="site-widget-post-pic">
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="thumb"
                                                        class="img-fluid">
                                                </div>
                                                <div class="site-widget-post-info">
                                                    <h5>{{ $post->title }}</h5>
                                                    <span>{{ date('Y-m-d', strtotime($post->published_at)) }} &nbsp; &nbsp;
                                                        Kategori:
                                                        {{ $post->category->kategori }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <style>
                            .site-widget-post {
                                margin-bottom: 20px;
                                /* adjust the value to your liking */
                            }

                            .site-widget-post-pic img {
                                max-width: 100px;
                                max-height: 100px;
                                object-fit: cover;
                            }
                        </style>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Single -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Get all post elements
            var posts = $('.blog-box');

            // Get all category links
            var categoryLinks = $('.site-widget-list a');

            // Add event listener to category links
            categoryLinks.on('click', function(e) {
                e.preventDefault();

                // Get the selected category ID
                var selectedCategory = $(this).data('category');

                // Hide all posts
                posts.hide();

                // Show only posts with the selected category
                posts.filter('[data-category="' + selectedCategory + '"]').show();
            });
        });
    </script>
@endsection
