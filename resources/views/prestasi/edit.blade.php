@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Edit Data Prestasi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/prestasi/{{ $prestasi->uuid }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Acara</label>
                                    <input type="text" id="acara" name="acara"
                                        class="form-control  @error('acara') is-invalid @enderror"
                                        value="{{ old('acara', $prestasi) }}">
                                    @error('acara')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Penyelenggara</label>
                                    <input type="text" id="penyelenggara" name="penyelenggara"
                                        class="form-control  @error('penyelenggara') is-invalid @enderror"
                                        value="{{ old('penyelenggara', $prestasi) }}">
                                    @error('penyelenggara')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Tanggal</label>
                                    <input type="date" id="tanggal" name="tanggal"
                                        class="form-control  @error('tanggal') is-invalid @enderror"
                                        value="{{ old('tanggal', $prestasi) }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Prestasi</label>
                                    <input type="text" id="prestasi" name="prestasi"
                                        class="form-control  @error('prestasi') is-invalid @enderror"
                                        value="{{ old('prestasi', $prestasi) }}">
                                    @error('prestasi')
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
