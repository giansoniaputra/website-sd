@extends('landing.layoutLanding.app')

@section('title', 'Galeri')

@section('content')
    <!-- Start Hero ============================================= -->
    <div id="home" class="hero-section">
        @if ($galeri_banner->count() > 0)
            <div class="hero-single bg"
                style="background-image: url('{{ asset('storage/' . $galeri_banner->first()->photo) }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="col-xl-6 text-center">
                            <div class="hero-content">
                                <span class="hero-p1 hero-sm d-block text-white">Galeri</span>
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
                                <span class="hero-p1 hero-sm d-block text-white">Galeri</span>
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

    <!-- Start Video -->
    <div class="serv-2-area de-padding">
        <div class="container" id="video">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="site-title text-center">
                        <h2>Video Kami</h2>
                    </div>
                </div>
            </div>
            <div class="serv-wrapper">
                <div class="row">
                    <!-- Video 1 -->
                    <div class="col-12">
                        <div class="row">
                            @foreach ($videos as $row)
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="video-box">
                                        <div class="video-content">
                                            {!! str_replace(['width="560"', 'height="315"'], ['width="100%"', 'height="250"'], $row->link) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <style>
                    #paginate nav .pagination {
                        display: flex;
                    }

                    #paginate nav li {
                        background-color: white;
                    }

                    #paginate nav .page-item.active .page-link {
                        background-color: #DC810F;
                        border-color: #DC810F;
                        color: white;
                    }

                    #paginate nav .page-link {
                        color: #DC810F;
                    }
                </style>
                <div class="d-flex justify-content-center" id="paginate">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- End Video -->

    <script>
        let paginate = document.querySelector("#paginate")
        paginate.addEventListener("click", function(event) {
            if (event.target.getAttribute("class") == "page-link") {
                event.preventDefault()
                let href = event.target.getAttribute("href")
                if (href != null) {
                    document.location.href = href + '#video'
                }

            }
        })
    </script>

    <!-- Start Foto -->
    <div class="rel-project de-pb" id="foto">
        <div class="container">
            <h2 class="text-center mb-40 mt-40">Foto Kami</h2>
            <div class="rel-wpr grid-4">
                @foreach ($galleries as $row)
                    <div class="rel-box">
                        <div class="rel-img">
                            <a title="lihat gambar" href="/storage/{{ $row->photo }}" class="btn btn-transparent"
                                target="_blank">
                                <img src="/storage/{{ $row->photo }}" alt="Foto" width="100%">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <style>
                #paginate2 nav .pagination {
                    display: flex;
                }

                #paginate2 nav li {
                    background-color: white;
                }

                #paginate2 nav .page-item.active .page-link {
                    background-color: #DC810F;
                    border-color: #DC810F;
                    color: white;
                }

                #paginate2 nav .page-link {
                    color: #DC810F;
                }
            </style>
            <div class="d-flex justify-content-center" id="paginate2">
                {{ $galleries->links() }} <!-- Menampilkan links pagination -->
            </div>
        </div>
    </div>
    <!-- End Foto -->
    <script>
        let paginate2 = document.querySelector("#paginate2")
        paginate2.addEventListener("click", function(event) {
            if (event.target.getAttribute("class") == "page-link") {
                event.preventDefault()
                let href = event.target.getAttribute("href")
                if (href != null) {
                    document.location.href = href + '#foto'
                }

            }
        })
    </script>
@endsection
