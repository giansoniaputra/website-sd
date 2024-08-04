@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Kelas</div>

                    <div class="card-body">
                        <form method="POST" action="/kelas">
                            @csrf

                            <div class="form-group row">
                                <label for="tahun_ajaran_uuid" class="col-md-4 col-form-label text-md-right">Tahun
                                    Ajaran</label>
                                <div class="col-md-6">
                                    <select id="tahun_ajaran_uuid"
                                        class="form-control @error('tahun_ajaran_uuid') is-invalid @enderror"
                                        name="tahun_ajaran_uuid" required>
                                        @foreach ($tahunAjaran as $tahun)
                                            <option value="{{ $tahun->uuid }}">
                                                {{ $tahun->tahun_awal }}/{{ $tahun->tahun_akhir }}</option>
                                        @endforeach
                                    </select>

                                    @error('tahun_ajaran_uuid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kelas" class="col-md-4 col-form-label text-md-right">Kelas</label>

                                <div class="col-md-6">
                                    <input id="kelas" type="text"
                                        class="form-control @error('kelas') is-invalid @enderror" name="kelas" required>

                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_kelas" class="col-md-4 col-form-label text-md-right">Nama Kelas</label>

                                <div class="col-md-6">
                                    <input id="nama_kelas" type="text"
                                        class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas"
                                        required>

                                    @error('nama_kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumlah_lk" class="col-md-4 col-form-label text-md-right">Jumlah
                                    Laki-Laki</label>

                                <div class="col-md-6">
                                    <input id="jumlah_lk" type="number"
                                        class="form-control @error('jumlah_lk') is-invalid @enderror" name="jumlah_lk"
                                        required>

                                    @error('jumlah_lk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumlah_pr" class="col-md-4 col-form-label text-md-right">Jumlah
                                    Perempuan</label>

                                <div class="col-md-6">
                                    <input id="jumlah_pr" type="number"
                                        class="form-control @error('jumlah_pr') is-invalid @enderror" name="jumlah_pr"
                                        required>

                                    @error('jumlah_pr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
