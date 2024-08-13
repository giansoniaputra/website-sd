@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Tambah Video</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/video" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="mb-3">
                                    <label for="sampul" class="form-label">Unggah Sampul</label>
                                    <input type="file" id="sampul" name="sampul"
                                        class="form-control  @error('sampul') is-invalid @enderror" placeholder="">
                                    @error('sampul')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div> --}}
                                {{-- <div class="mb-3">
                                    <label for="link" class="form-label">Link</label>
                                    <input id="link" type="hidden" name="link">
                                    <trix-editor input="link">
                                        {!!(isset($data))? $data->link: ""!!}
                                    </trix-editor>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="text" id="link" name="link"
                                        class="form-control  @error('link') is-invalid @enderror">
                                    @error('link')
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
