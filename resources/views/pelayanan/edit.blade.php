@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Edit Data Pelayanan Publik</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/pelayanan-public/{{ $pelayanan->uuid }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Keterangan</label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control  @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $pelayanan) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pdf" class="form-label">PDF</label>
                                    <input type="file" class="form-control @error('pdf') is-invalid @enderror"
                                        id="pdf" name="pdf">
                                    <a href="{{ asset('storage/' . $pelayanan->pdf) }}" target="_blank"
                                        class="btn btn-success mt-1">PDF Sebelumnya</a>
                                    @error('pdf')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
