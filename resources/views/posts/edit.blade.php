@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">Edit Data Input Berita</h4>
        </div>
        <div class="card-body">
            <form action="/news/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Title</label>
                            <input type="text" id="title" name="title"
                                class="form-control  @error('title') is-invalid @enderror"
                                value="{{ old('title', $post->title) }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Author</label>
                            <input type="text" id="author" name="author"
                                class="form-control  @error('author') is-invalid @enderror"
                                value="{{ old('author', $post->author) }}">
                            @error('author')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Slug</label>
                            <input type="text" id="slug" name="slug"
                                class="form-control  @error('slug') is-invalid @enderror" readonly
                                style="background-color: rgb(237, 225, 225)" value="{{ old('slug', $post->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">File Input Foto</label>
                            <input type="file" id="image" name="image"
                                class="form-control  @error('image') is-invalid @enderror" placeholder=""
                                value="{{ old('image', $post->image) }}">
                            <a href="{{ asset('storage/' . $post->image) }}" target="_blank"
                                class="btn btn-success mt-1">Foto Sebelumnya</a>
                            @error('image')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Kategori</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                                name="category_id">
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('category_id', $post->category_id) == $kategori->id ? 'selected' : '' }}>
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


                        <div class="mb-3">
                            <label for="published_at" class="form-label">Diterbitkan Tanggal</label>
                            <input type="date" id="published_at" name="published_at"
                                class="form-control  @error('published_at') is-invalid @enderror"
                                value="{{ old('published_at', $post->published_at) }}">
                            @error('published_at')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}"">
                            <div style="overflow-y:
                                auto; height: 350px;">
                                <trix-editor input="body" class="form-control @error('body') is-invalid @enderror"
                                    value="{{ old('body', $post->body) }}""></trix-editor>
                            </div>
                            @error('body')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary" style="float: right">PERBARUI</button>
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
                .then(data => slug.value = data.slug)
        });
    </script>
    @include('posts.modal-cropper')
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            // ID MODAL CROPPER
            let modal = $("#modal-cropper-berita")
            // ID PHOTO YANG ADA DI MODAL
            let image = document.getElementById('image-berita');
            let cropper, reader, file
            // #PHOTO ADALAH ID INPUtAN YANG DI UPLOAD
            $("body").on("change", "#image", function(e) {
                let files = e.target.files;
                let done = function(url) {
                    image.src = url;
                    modal.modal("show");
                }
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        }
                        reader.readAsDataURL(file)
                    }
                }

            })

            modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 7 / 4,
                    preview: '.preview'
                })
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            })
            //ID BUTTON CROPPER
            $("#crop-photo-berita").on("click", function() {
                modal.modal('hide')
                canvas = cropper.getCroppedCanvas({
                    width: 1000,
                    height: 1000,
                })
                canvas.toBlob(function(blob) {
                    // ID PHOTO INPUTAN
                    let image = document.querySelector("#image");
                    // const imgPre = document.querySelector("#");
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(blob);
                    oFReader.onload = function(oFREvent) {
                        var file = dataURLtoFile(oFREvent.target.result, "photo-berita.png");
                        let container = new DataTransfer();
                        container.items.add(file);
                        image.files = container.files;
                        var newfile = image.files[0];

                    }
                })
            })

            function dataURLtoFile(dataurl, filename) {

                var arr = dataurl.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]),
                    n = bstr.length,
                    u8arr = new Uint8Array(n);

                while (n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }

                return new File([u8arr], filename, {
                    type: mime
                });
            }
        });
    </script>
@endsection
