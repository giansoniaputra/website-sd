@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Edit Data Pegawai</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/pegawai/{{ $pegawai->uuid }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Pilih Tipe</label>
                                    <select class="form-select  @error('type') is-invalid @enderror" id="type"
                                        name="type">
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="guru"
                                            {{ old('type', $pegawai->type) == 'guru' ? 'selected' : '' }}>Guru</option>
                                        <option value="staff"
                                            {{ old('type', $pegawai->type) == 'staff' ? 'selected' : '' }}>Staff</option>
                                        <option value="pengurus"
                                            {{ old('type', $pegawai->type) == 'pengurus' ? 'selected' : '' }}>Pengurus
                                        </option>
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
                                        class="form-control  @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $pegawai) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <input type="hidden" id="status-input" name="status"
                                    class="form-control  @error('status') is-invalid @enderror"
                                    value="{{ old('status', $pegawai) }}">
                                <input type="hidden" id="pendidikan" name="pendidikan"
                                    class="form-control  @error('pendidikan') is-invalid @enderror"
                                    value="{{ old('pendidikan', $pegawai) }}">
                                <input type="hidden" id="jabatan" name="jabatan"
                                    class="form-control  @error('jabatan') is-invalid @enderror"
                                    value="{{ old('jabatan', $pegawai) }}">

                                <div class="mb-3">
                                    @if ($pegawai->type == 'guru')
                                        <label for="simpleinput" class="form-label" id="ampuan">Ampuan</label>
                                    @elseif($pegawai->type == 'staff' || $pegawai->type == 'pengurus')
                                        <label for="simpleinput" class="form-label" id="ampuan">Jabatan</label>
                                    @endif
                                    <input type="text" id="ampuan" name="ampuan"
                                        class="form-control  @error('ampuan') is-invalid @enderror"
                                        value="{{ old('ampuan', $pegawai) }}">
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
                                        <a href="{{ asset('storage/' . $pegawai->photo) }}" target="_blank"
                                            class="btn btn-success mt-1">Foto Sebelumnya</a>
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">PERBARUI</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#type').on('change', function() {
                            var type = $(this).val();
                            if (type == 'guru') {
                                $('#ampuan').text('Ampuan');
                            } else if (type == 'staff' || type == 'pengurus') {
                                $('#ampuan').text('Jabatan');
                            }
                        });
                    });
                </script>
            @endsection
