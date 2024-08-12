@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Tambah Data Kurikulum</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/kurikulum" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Keterangan</label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control  @error('nama') is-invalid @enderror">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label">Unggah Foto</label>
                                    <input type="file" id="photo" name="photo"
                                        class="form-control  @error('photo') is-invalid @enderror" placeholder="">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label">PDF</label>
                                    <input type="file" class="form-control  @error('pdf') is-invalid @enderror"
                                        id="pdf" name="pdf">
                                    @error('pdf')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
