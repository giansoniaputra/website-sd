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
                            <form action="/profil/store" method="POST">
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
                                    <trix-editor input="strategis">
                                        {!!(isset($data))? $data->sejarah: ""!!}
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
                                    <label for="informasiUmum" class="form-label">Infomasi Umum</label>
                                    <input id="informasiUmum" type="hidden" name="informasiUmum">
                                    <trix-editor input="informasiUmum">
                                        {!!(isset($data))? $data->informasiUmum: ""!!}
                                    </trix-editor>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input id="lokasi" type="hidden" name="lokasi">
                                    <trix-editor input="lokasi">
                                        {!!(isset($data))? $data->lokasi: ""!!}
                                    </trix-editor>
                                </div>
                                <button class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
