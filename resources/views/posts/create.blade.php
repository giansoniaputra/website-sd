@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tambah Data Input Berita</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="/news" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Author</label>
                                <input type="text" id="author" name="author" class="form-control  @error('author') is-invalid @enderror" value="{{ old('author') }}">
                                @error('author')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control  @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">File
                                    Input Foto</label>
                                <input type="file" id="image" name="image" class="form-control  @error('image') is-invalid @enderror" placeholder="" value="{{ old('image') }}">
                                @error('image')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="example-select" class="form-label">Kategori</label>
                                <select id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    @foreach ($categories as $kategori)
                                            <option value="{{ $kategori->uuid }}">
                                                {{ $kategori->$kategori }}</option>
                                        @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
            @endsection
