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

                                <button class="btn btn-primary">SIMPAN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    @include('kurikulum.modal-cropper')
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            // ID MODAL CROPPER
            let modal = $("#modal-cropper-kurikulum")
            // ID PHOTO YANG ADA DI MODAL
            let image = document.getElementById('image-kurikulum');
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
                    aspectRatio: 1 / 1,
                    preview: '.preview'
                })
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            })
            //ID BUTTON CROPPER
            $("#crop-photo-kurikulum").on("click", function() {
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
                        var file = dataURLtoFile(oFREvent.target.result, "photo-kurikulum.png");
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
