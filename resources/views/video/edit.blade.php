@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Edit Data Video</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/video/{{ $video->uuid }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="sampul" class="form-label">Unggah Sampul Video</label>
                                    <input type="file" id="sampul" name="sampul"
                                        class="form-control mb-3  @error('sampul') is-invalid @enderror" placeholder="">
                                    @if ($video->sampul)
                                        <a href="{{ asset('storage/' . $video->sampul) }}" target="_blank"
                                            class="btn btn-success">
                                            Foto Sebelumnya
                                        </a>
                                    @endif
                                    @error('sampul')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Link</label>
                                    <input type="text" id="link" name="link"
                                        class="form-control  @error('link') is-invalid @enderror"
                                        value="{{ old('link', $video) }}">
                                    @error('link')
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
