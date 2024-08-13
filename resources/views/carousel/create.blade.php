@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Tambah Foto Carousel</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/carousel" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                <button class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
