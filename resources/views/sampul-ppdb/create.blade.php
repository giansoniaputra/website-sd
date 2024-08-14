@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Tambah Sampul PPDB</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/cover-ppdb" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="sampul_depan" class="form-label">Unggah Sampul Depan</label>
                                    <input type="file" id="sampul_depan" name="sampul_depan"
                                        class="form-control  @error('sampul_depan') is-invalid @enderror" placeholder="">
                                    @error('sampul_depan')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="sampul_belakang" class="form-label">Unggah Sampul Belakang</label>
                                    <input type="file" id="sampul_belakang" name="sampul_belakang"
                                        class="form-control  @error('sampul_belakang') is-invalid @enderror" placeholder="">
                                    @error('sampul_belakang')
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
