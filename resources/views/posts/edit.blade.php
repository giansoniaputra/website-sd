@extends('layout.main')
@section('container')

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Edit Data Input Berita</h4>
            </div>
            <div class="card-body">
                <form action="/news/{{$post->slug}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title' , $post->title) }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Author</label>
                                <input type="text" id="author" name="author" class="form-control  @error('author') is-invalid @enderror" value="{{ old('author', $post->author) }}">
                                @error('author')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control  @error('slug') is-invalid @enderror" readonly style="background-color: rgb(237, 225, 225)" value="{{ old('slug', $post->slug) }}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">File Input Foto</label>
                                <input type="file" id="image" name="image" class="form-control  @error('image') is-invalid @enderror" placeholder="" value="{{ old('image', $post->image) }}">
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
                                            <option value="{{ $kategori->id }}"
                                                {{ old('category_id', $kategori->id) == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->kategori }}
                                            </option>
                                     @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                            <trix-editor  style="height: 350px" input="body" class="form-control @error('body') is-invalid @enderror" value="{{ old('body', $post->body) }}"></trix-editor>
                            @error('body')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary" style="float: right">UPDATE</button>
                    </div>
                </div>
                </form>
            </div>
        </div> <!-- end col -->
            <script>
                const title = document.querySelector('#title');
                const slug = document.querySelector('#slug');

                title.addEventListener('change', function() {
                    fetch('/cek-slug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value= data.slug)
                });

            </script>

            @endsection
