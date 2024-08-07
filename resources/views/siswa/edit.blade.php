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
                            <form action="/siswa/{{ $siswa->uuid }}" method="POST">
                                @csrf
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="kelas_uuid" value="{{ $kelas_uuid }}">

                                <div class="mb-3">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa" id="nama_siswa"
                                        class="form-control @error('nama_siswa') is-invalid @enderror"
                                        value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
                                    @error('nama_siswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">PERBARUI</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
