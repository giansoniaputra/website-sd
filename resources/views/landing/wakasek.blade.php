@extends('landing.layoutLanding.app')

@section('title', 'Wakasek')

@section('content')
<!-- Start Hero ============================================= -->
<div id="home" class="hero-section">
    <div class="hero-single bg" style="background-image: url('/assets2/img/header/1280 X 720.png'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-xl-6 text-center">
                    <div class="hero-content">
                        <span class="hero-p1 hero-sm d-block text-white">Wakasek</span>
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

<!-- Start Kurikulum ============================================= -->
<div class="about-12 de-padding" id="kurikulum">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Kurikulum</span>
                    <h2 class="text-center">
                        Kurikulum Sekolah
                    </h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Link Download PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kelas 1</td>
                                <td><img src="/assets2/img/visi.png" alt="Visi Yayasan" style="width: 100px;"></td>
                                <td><a href="#" class="btn btn-primary">Download PDF</a></td>
                            </tr>
                            <tr>
                                <td>Kelas 2</td>
                                <td><img src="/assets2/img/misi.png" alt="Misi Yayasan" style="width: 100px;"></td>
                                <td><a href="#" class="btn btn-primary">Download PDF</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Kurikulum -->

<!-- Start Kesiswaan ============================================= -->
<div class="about-12 de-padding" id="pesertaDidik">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Kesiswaan</span>
                    <h2 class="text-center">
                        Peserta Didik
                    </h2>

                    <!-- Tahun Ajaran 2024/2025 -->
                    @foreach ($tahun_ajaran as $item)
                    @php
                    $kelas = getKelas($item->uuid);
                    @endphp
                    <h5 class="text-center">Tahun Ajaran {{$item->tahun_awal}} - {{$item->tahun_akhir}}</h5>
                    <ul class="nav nav-tabs">
                        @foreach ($kelas as $index => $row)
                        <li class="nav-item">
                            <a class="nav-link @if ($index == 0) active @endif" data-toggle="tab" href="#kelas{{ $row->uuid }}">{{$row->nama_kelas}}</a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="tabelKelas">
                        @foreach ($kelas as $index => $row)
                        @php
                        $siswa = getSiswa($row->uuid);
                        @endphp
                        <div id="kelas{{ $row->uuid }}" class="tab-pane fade @if ($index == 0) show active @endif">
                            <table class="table table-striped table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Laki-Laki</th>
                                        <th>Perempuan</th>
                                        <th>Jumlah</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $row->nama_kelas }}</td>
                                        <td>{{ $row->jumlah_lk }}</td>
                                        <td>{{ $row->jumlah_pr }}</td>
                                        <td>{{ $row->jumlah_lk + $row->jumlah_pr }}</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailModal" id="buttonRenderSiswa" data-uuid="{{$row->uuid}}" data-namaKelas="{{$row->nama_kelas}}">Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Kesiswaan -->


<!-- Start Modals for Detail ============================================= -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel1">Detail Peserta Didik <span id="nama_kelasSpan"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="renderSiswa">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Start Prestasi ============================================= -->
<div class="about-12 de-padding" id="prestasi">
    <div class="container">
        <div class="about-12-wrapper grid-12">
            <div class="about-12-right">
                <div class="about-12-right-content">
                    <span class="hero-p1">Prestasi</span>
                    <h2 class="text-center">
                        Prestasi Peserta Didik
                    </h2>
                    <table id="prestasiTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Event</th>
                                <th>Penyelenggara</th>
                                <th>Tanggal</th>
                                <th>Prestasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestasi as $i => $data)
                            <tr>
                                <td>{{ ($prestasi->currentPage()-1) * $prestasi->perPage() + $i + 1 }}</td> <!-- Nomor urut otomatis sesuai dengan pagination -->
                                <td>{{ $data->acara }}</td>
                                <td>{{ $data->penyelenggara }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td> <!-- Format tanggal -->
                                <td>{{ $data->prestasi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <style>
                        #paginate nav .pagination{
                            display: flex;
                        }
                        #paginate nav li{
                            background-color: white;
                        }
                        #paginate nav .page-item.active .page-link{
                            background-color: #DC810F;
                            border-color: #DC810F;
                            color: white;
                        }
                        #paginate nav .page-link{
                            color: #DC810F;
                        }
                    </style>
                    <div class="d-flex justify-content-center" id="paginate">
                        {{ $prestasi->links() }} <!-- Menampilkan links pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Prestasi -->

<!-- Tambahkan skrip untuk menambahkan #prestasi pada setiap link pagination -->
<script>
   let paginate=document.querySelector("#paginate")
   paginate.addEventListener("click",function(event){
    if(event.target.getAttribute("class")=="page-link")
   {
    event.preventDefault()
    let href=event.target.getAttribute("href")
    if(href!=null){
        document.location.href=href+'#prestasi'
    }
    
   }})
</script>




<!-- Start Sarana & Prasarana
		============================================= -->
<div class="rel-project de-pb" id="saranaPrasarana">
    <div class="container">
        <h2 class="text-center mb-40 mt-40">Sarana & Prasarana</h2>
        <div class="rel-wpr grid-4">
            @foreach ($sarana as $row)
            <div class="rel-box">
                <div class="rel-img">
                    <img src="/storage/{{$row->photo}}" alt="thumb">
                </div>
                <div class="rel-info mt-20 text-center">
                    <a href="project-single.html">
                        <h6 class="mb-10">{{$row->nama}}</h6>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Sarana & Prasarana -->
<!-- Start Humas
		============================================= -->
<div class="service-area posi-rel bg de-padding" id="humas">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="site-title text-center">
                    <h2>Humas</h2>
                </div>
            </div>
        </div>
        <div class="service-wrapper grid-2">
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/whatsapp.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Whatsapp</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/youtube.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Youtube</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/instagram.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Instagram</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/facebook.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Facebook</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/twitter.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Twitter</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/tik-tok.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Tiktok</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/email (1).png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Email</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
            <div class="service-box">
                <div class="service-icon">
                    <img src="/assets2/img/logo/school.png" alt="">
                </div>
                <div class="service-content">
                    <a href="#">
                        <h4>Web PPDB</h4>
                    </a>
                    {{-- <p>
                        Lorem Ipsum is simply dummy text ef the printing and.
                    </p> --}}
                    <a href="#"> Learn More </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Humas -->

@endsection
