@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Edit Kategori </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="/kategori/{{ $kategori->uuid }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Kategori</label>
                                <input type="text" id="kategori" name="kategori"
                                    class="form-control  @error('kategori') is-invalid @enderror"
                                    value="{{ old('kategori', $kategori->kategori) }}">
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                        <button class="btn btn-primary">PERBARUI</button>
                    </form>
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
