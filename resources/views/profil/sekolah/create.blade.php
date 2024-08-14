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
                                        {!!(isset($data))? $data->visi: ""!!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="misi" class="form-label">Misi</label>
                                    <input id="misi" type="hidden" name="misi">
                                    <trix-editor input="misi">
                                        {!!(isset($data))? $data->misi: ""!!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input id="tujuan" type="hidden" name="tujuan">
                                    <trix-editor input="tujuan">
                                        {!!(isset($data))? $data->tujuan: ""!!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="strategi" class="form-label">Strategi</label>
                                    <input id="strategi" type="hidden" name="strategi">
                                    <trix-editor input="strategi">
                                        {!!(isset($data))? $data->strategi: ""!!}
                                    </trix-editor>
                                </div>

                                <div class="mb-3">
                                    <label for="sejarah" class="form-label">Sejarah</label>
                                    <input id="sejarah" type="hidden" name="sejarah">
                                    <trix-editor input="sejarah">
                                        {!!(isset($data))? $data->sejarah: ""!!}
                                    </trix-editor>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input id="lokasi" type="hidden" name="lokasi">
                                    <trix-editor input="lokasi">
                                        {!!(isset($data))? $data->lokasi: ""!!}
                                    </trix-editor>
                                </div>
                                <div class="mb-3">
                                    <label for="sambutan" class="form-label">Sambutan</label>
                                    <input id="sambutan" type="hidden" name="sambutan">
                                    <trix-editor input="sambutan">
                                        {!!(isset($data))? $data->sambutan: ""!!}
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
@endsection
