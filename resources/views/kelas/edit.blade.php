@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Edit Data Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/kelas/{{ $kelas->uuid }}" method="POST">
                                @csrf
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Tahun Ajaran</label>
                                    <select id="tahun_ajaran_uuid"
                                        class="form-control @error('tahun_ajaran_uuid') is-invalid @enderror"
                                        name="tahun_ajaran_uuid">
                                        @foreach ($tahunAjaran as $tahun)
                                            <option value="{{ $tahun->uuid }}"
                                                {{ old('tahun_ajaran_uuid', $kelas->tahun_ajaran_uuid) == $tahun->uuid ? 'selected' : '' }}>
                                                {{ $tahun->tahun_awal }}/{{ $tahun->tahun_akhir }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('tahun_ajaran_uuid')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Kelas</label>
                                    <input id="kelas" type="text"
                                        class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                                        value="{{ old('kelas', $kelas->kelas) }}">
                                    @error('kelas')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Kelas</label>
                                    <input id="nama_kelas" type="text"
                                        class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas"
                                        value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
                                    @error('nama_kelas')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Jumlah Laki-Laki</label>
                                    <input id="jumlah_lk" type="number"
                                        class="form-control @error('jumlah_lk') is-invalid @enderror" name="jumlah_lk"
                                        value="{{ old('jumlah_lk', $kelas->jumlah_lk) }}">

                                    @error('jumlah_lk')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Jumlah Perempuan</label>
                                    <input id="jumlah_pr" type="number"
                                        class="form-control @error('jumlah_pr') is-invalid @enderror" name="jumlah_pr"
                                        value="{{ old('jumlah_pr', $kelas->jumlah_pr) }}">

                                    @error('jumlah_pr')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">PERBARUI</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
