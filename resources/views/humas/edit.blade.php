@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Edit Data Humas</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="/humas/{{ $humas->uuid }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama', $humas) }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Link</label>
                                <input type="text" id="link" name="link" class="form-control  @error('link') is-invalid @enderror" value="{{ old('link', $humas) }}">
                                @error('link')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Unggah Foto Sosmed</label>
                                <input type="file" id="photo" name="photo" class="form-control  @error('photo') is-invalid @enderror" placeholder="">
                                <a href="{{ asset('storage/' . $humas->photo) }}" target="_blank"
                                    class="btn btn-success mt-1">Foto Sebelumnya</a>
                                @error('photo')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary">PERBARUI</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
            @endsection
