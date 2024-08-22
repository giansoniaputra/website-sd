@extends('layout.main')
@section('container')
    <div class="card-header">
        <a href="/profil/sekolah/create" class="btn btn-primary">Tambah Data</a>
    </div>

    {{-- VISI --}}

    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Visi</h4>
                <p class="text-muted mb-0">
                    {!! isset($data) ? $data->visi : '' !!}
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
                    {!! isset($data) ? $data->misi : '' !!}
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
                    {!! isset($data) ? $data->sejarah : '' !!}
                </p>
            </div>
        </div>
    </div>

    {{-- Tujuan --}}
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tujuan</h4>
                <p class="text-muted mb-0">
                    {!! isset($data) ? $data->tujuan : '' !!}
                </p>
            </div>
        </div>
    </div>

    {{-- Lokasi --}}
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Lokasi</h4>
                <p class="text-muted mb-0">
                    {!! isset($data) ? $data->lokasi : '' !!}
                </p>
            </div>
        </div>
    </div>

    {{-- Strategi --}}
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Strategi</h4>
                <p class="text-muted mb-0">
                    {!! isset($data) ? $data->strategi : '' !!}
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Sambutan</h4>
                <p class="text-muted mb-0">
                    {!! isset($data) ? $data->sambutan : '' !!}
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Foto Kepala Sekolah</h4>
                <a title="lihat gambar" href="{{ isset($data) ? '/storage/' . $data->photo : '#' }}"
                    class="btn btn-transparent" target="_blank">
                    <img src="{{ isset($data) ? '/storage/' . $data->photo : '' }}" alt="Foto" width="50">
                </a>
            </div>
        </div>
    </div>
@endsection
