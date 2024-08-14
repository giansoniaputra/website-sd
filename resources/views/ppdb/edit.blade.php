@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Edit Data PPDB</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                            <form action="/ppdb/{{ $ppdb->uuid }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Kegiatan</label>
                                    <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                        class="form-control  @error('nama_kegiatan') is-invalid @enderror"
                                        value="{{ old('nama_kegiatan', $ppdb->nama_kegiatan) }}">
                                    @error('nama_kegiatan')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Tanggal Regular</label>
                                    <input type="date" id="tanggal_regular" name="tanggal_regular"
                                        class="form-control  @error('tanggal_regular') is-invalid @enderror"
                                        value="{{ old('tanggal_regular', $ppdb->tanggal_regular) }}">
                                    @error('tanggal_regular')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Tanggal Prestasi</label>
                                    <input type="date" id="tanggal_prestasi" name="tanggal_prestasi"
                                        class="form-control  @error('tanggal_prestasi') is-invalid @enderror"
                                        value="{{ old('tanggal_prestasi', $ppdb->tanggal_prestasi) }}">
                                    @error('tanggal_prestasi')
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
