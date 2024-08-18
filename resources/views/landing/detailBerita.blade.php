@extends('landing.layoutLanding.app')

@section('title', $post->title)

@section('content')
    <div class="clearfix"></div>
    <main class="main">
        <!-- Start Breadcrumb
        ============================================= -->
        <div class="site-breadcrumb bg" style="background: url({{ asset('assets/img/shapes/rectangle.png') }})">
            <div class="container">
                <h2 class="breadcrumb-title">{{ $post->title }}</h2>
            </div>
        </div>
        <!-- End Breadcrumb -->
        
        <!-- Start Blog Single
        ============================================= -->
        <div class="blog-single de-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="blog-single-wpr">
                            <div class="blog-single-pic">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            </div>
                            <div class="blog-single-meta">
                                <h5>
                                    {{ $post->title }}
                                </h5>
                                <div class="blog-single-dte-adm">
                                    <span>Date: {{ $post->created_at->format('d F, Y') }}</span>
                                    <span>Post By: {{ $post->author }}</span>
                                </div>
                                <div class="blog-single-categories mt-5">
                                    <h6>Categories:</h6>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li><a href="{{ url('category/'.$category->id) }}">{{ $category->kategori }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-text">
                                <!-- Display the body content of the post -->
                                <p class="mb-0">
                                    {!! $post->body !!}
                                </p>
                            </div>
                            <div class="blog-nxt-prev mt-40">
                                <!-- Optional previous/next post links -->
                                @if($previousPost)
                                    <a href="{{ url('detailBerita/'.$previousPost->slug) }}"><i class="ti ti-angle-left"></i>previous</a>
                                @endif
                                @if($nextPost)
                                    <a href="{{ url('detailBerita/'.$nextPost->slug) }}">next <i class="ti ti-angle-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <aside class="sidebar">
                            <!-- Search -->
                            {{-- <div class="site-widget search">
                                <form>
                                    <input type="text" class="srs-inp" placeholder="Search Here" >
                                    <button type="button" class="srs-btn"><i class="ti ti-search"></i></button>
                                </form>
                            </div> --}}
                            <!-- Category -->
                            <div class="site-widget category">
                                <h4 class="site-widget-title">Category</h4>
                                <ul class="site-widget-list">
                                    @foreach($categories as $category)
                                        <li><a href="{{ url('category/'.$category->id) }}">{{ $category->kategori }} <i class="ti ti-angle-double-right"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Recent Post -->
                            <div class="site-widget post">
                                <h4 class="site-widget-title">Recent Post</h4>
                                <ul class="site-widget-list">
                                    @foreach($recentPosts as $recentPost)
                                        <li>
                                            <a href="{{ url('detailBerita/'.$recentPost->slug) }}">
                                                <div class="site-widget-post d-flex align-items-center">
                                                    <div class="site-widget-post-pic">
                                                        <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}">
                                                    </div>
                                                    <div class="site-widget-post-info">
                                                        <h5>{{ $recentPost->title }}</h5>
                                                        <span>{{ $recentPost->created_at->format('d F, Y') }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Single -->
        
    </main>    
    
    <div class="clearfix"></div>
@endsection
