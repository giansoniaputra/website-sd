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
                                        <option value="pengurus">Pengurus</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div id="input-fields" style="display: none;">
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

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" id="nama" name="nama"
                                            class="form-control  @error('nama') is-invalid @enderror">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ampuan" class="form-label" id="ampuan-label">Ampuan</label>
                                        <input type="text" id="ampuan" name="ampuan"
                                            class="form-control  @error('ampuan') is-invalid @enderror">
                                        @error('ampuan')
                                            <div class="invalid-feedback">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Input Hidden Untuk Tetap Dimasukan Ke Database --}}
                                <input type="hidden" id="status-input" name="status" value="null">
                                <input type="hidden" id="status-input" name="jabatan" value="null">
                                <input type="hidden" id="status-input" name="pendidikan" value="null">

                                <button class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                var type = $(this).val();
                $('#input-fields').show();

                if (type == 'guru') {
                    $('#ampuan-label').text('Ampuan');
                } else if (type == 'staff' || type == 'pengurus') {
                    $('#ampuan-label').text('Jabatan');
                }
            });
        });
    </script>
@endsection
