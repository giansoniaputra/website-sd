@extends('layout.main')
@section('container')
<div class="card-header">
    <a href="/profil/yayasan/create" class="btn btn-primary">Tambah Data</a>
</div>

{{-- VISI --}}

<div class="col-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">Visi</h4>
            <p class="text-muted mb-0">
                {!!(isset($data))? $data->visi: ""!!}
            </p>
        </div>
    </div>
</div>

{{-- MISI --}}
<div class="col-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">Misi</h4>
            <p class="text-muted mb-0">
                {!!(isset($data))? $data->misi: ""!!}
            </p>
        </div>
    </div>
</div>

{{-- Sejarah --}}
<div class="col-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">Sejarah</h4>
            <p class="text-muted mb-0">
                {!!(isset($data))? $data->sejarah: ""!!}
            </p>
        </div>
    </div>
</div>

{{-- Pengurus --}}
<div class="col-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">Pengurus</h4>
            <div class="row">
                <div class="col-12">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Staus Kepegawaian</th>
                                        <th>Jabatan</th>
                                        <th>Pendidikan</th>
                                        <th>Ampuan</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>faris</td>
                                        <td>PNS</td>
                                        <td>Kepala</td>
                                        <td>S3</td>
                                        <td>Guru TI</td>
                                        <td><a href="">Lihat Foto</a></td>
                                    </tr>
                                </tbody>
                            </table>
                </div><!-- end col-->
            </div> <!-- end row-->

    </div>
</div>


@endsection
