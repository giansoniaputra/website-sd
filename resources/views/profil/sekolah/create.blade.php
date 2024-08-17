@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Tambah / Edit Profil Sekolah</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button> {{ session('error') }}
                                </div>
                            @endif
                            <form action="/profil/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="sekolah" name="type">
                                <div class="mb-3">
                                    <label for="visi" class="form-label">Visi</label>
                                    <input id="visi" type="hidden" name="visi">
                                    <trix-editor input="visi">
                                        {!! isset($data) ? $data->visi : '' !!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="misi" class="form-label">Misi</label>
                                    <input id="misi" type="hidden" name="misi">
                                    <trix-editor input="misi">
                                        {!! isset($data) ? $data->misi : '' !!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input id="tujuan" type="hidden" name="tujuan">
                                    <trix-editor input="tujuan">
                                        {!! isset($data) ? $data->tujuan : '' !!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="strategi" class="form-label">Strategi</label>
                                    <input id="strategi" type="hidden" name="strategi">
                                    <trix-editor input="strategi">
                                        {!! isset($data) ? $data->strategi : '' !!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="sejarah" class="form-label">Sejarah</label>
                                    <input id="sejarah" type="hidden" name="sejarah">
                                    <trix-editor input="sejarah">
                                        {!! isset($data) ? $data->sejarah : '' !!}
                                    </trix-editor>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input id="lokasi" type="hidden" name="lokasi">
                                    <trix-editor input="lokasi">
                                        {!! isset($data) ? $data->lokasi : '' !!}
                                    </trix-editor>
                                </div>
                                <div class="mb-3">
                                    <label for="sambutan" class="form-label">Sambutan</label>
                                    <input id="sambutan" type="hidden" name="sambutan">
                                    <trix-editor input="sambutan">
                                        {!! isset($data) ? $data->sambutan : '' !!}
                                    </trix-editor>
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Unggah Foto Kepala Sekolah</label>
                                    <input type="file" id="photo" name="photo"
                                        class="form-control  @error('photo') is-invalid @enderror" placeholder="">
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
                </div>
            </div>
        </div>
    </div>
    @include('profil.sekolah.modal-cropper')
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            // ID MODAL CROPPER
            let modal = $("#modal-cropper-kepsek")
            // ID PHOTO YANG ADA DI MODAL
            let image = document.getElementById('image-kepsek');
            let cropper, reader, file
            // #PHOTO ADALAH ID INPUtAN YANG DI UPLOAD
            $("body").on("change", "#photo", function(e) {
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
                    aspectRatio: 7 / 10,
                    preview: '.preview'
                })
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            })
            //ID BUTTON CROPPER
            $("#crop-photo-kepsek").on("click", function() {
                modal.modal('hide')
                canvas = cropper.getCroppedCanvas({
                    width: 1000,
                    height: 1000,
                })
                canvas.toBlob(function(blob) {
                    // ID PHOTO INPUTAN
                    let image = document.querySelector("#photo");
                    // const imgPre = document.querySelector("#");
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(blob);
                    oFReader.onload = function(oFREvent) {
                        var file = dataURLtoFile(oFREvent.target.result, "photo-kepsek.png");
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
