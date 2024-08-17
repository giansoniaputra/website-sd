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
            </div>
        </div>
    </div>
    @include('sampul-ppdb.modal-cropper-depan')
    @include('sampul-ppdb.modal-cropper-belakang')
@endsection

@section('js_after')
    <script>
        $(document).ready(function() {
            // ID MODAL CROPPER
            let modal = $("#modal-cropper-sampul-depan")
            // ID PHOTO YANG ADA DI MODAL
            let image = document.getElementById('image-sampul-depan');
            let cropper, reader, file
            // #PHOTO ADALAH ID INPUtAN YANG DI UPLOAD
            $("body").on("change", "#sampul_depan", function(e) {
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
            $("#crop-photo-sampul-depan").on("click", function() {
                modal.modal('hide')
                canvas = cropper.getCroppedCanvas({
                    width: 1000,
                    height: 1000,
                })
                canvas.toBlob(function(blob) {
                    // ID PHOTO INPUTAN
                    let image = document.querySelector("#sampul_depan");
                    // const imgPre = document.querySelector("#");
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(blob);
                    oFReader.onload = function(oFREvent) {
                        var file = dataURLtoFile(oFREvent.target.result,
                            "photo-sampul-depan.png");
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
    <script>
        $(document).ready(function() {
            // ID MODAL CROPPER
            let modal = $("#modal-cropper-sampul-belakang")
            // ID PHOTO YANG ADA DI MODAL
            let image = document.getElementById('image-sampul-belakang');
            let cropper, reader, file
            // #PHOTO ADALAH ID INPUtAN YANG DI UPLOAD
            $("body").on("change", "#sampul_belakang", function(e) {
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
            $("#crop-photo-sampul-belakang").on("click", function() {
                modal.modal('hide')
                canvas = cropper.getCroppedCanvas({
                    width: 1000,
                    height: 1000,
                })
                canvas.toBlob(function(blob) {
                    // ID PHOTO INPUTAN
                    let image = document.querySelector("#sampul_belakang");
                    // const imgPre = document.querySelector("#");
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(blob);
                    oFReader.onload = function(oFREvent) {
                        var file = dataURLtoFile(oFREvent.target.result,
                            "photo-sampul-belakang.png");
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
