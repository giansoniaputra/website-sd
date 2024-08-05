@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Tambah Data Guru / Staff</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/pegawai" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Pilih Tipe</label>
                                    <select class="form-select  @error('type') is-invalid @enderror" id="type"
                                        name="type">
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="guru">Guru</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama</label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control  @error('nama') is-invalid @enderror">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" id="status-input" name="status" value="null"
                                        class="form-control  @error('status') is-invalid @enderror">
                                    @error('status')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan"
                                        class="form-control  @error('jabatan') is-invalid @enderror">
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Pendidikan</label>
                                    <input type="text" id="pendidikan" name="pendidikan"
                                        class="form-control  @error('pendidikan') is-invalid @enderror">
                                    @error('pendidikan')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Ampuan</label>
                                    <input type="text" id="ampuan" name="ampuan"
                                        class="form-control  @error('ampuan') is-invalid @enderror">
                                    @error('ampuan')
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
                                <button class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
