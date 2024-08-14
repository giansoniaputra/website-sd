@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tambah Data Humas</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="/humas" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Link</label>
                                <input type="text" id="link" name="link" class="form-control  @error('link') is-invalid @enderror" value="{{ old('link') }}">
                                @error('link')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Unggah Foto Sosmed</label>
                                <input type="file" id="photo" name="photo" class="form-control  @error('photo') is-invalid @enderror" placeholder="" value="{{ old('photo') }}">
                                @error('photo')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
            @endsection
