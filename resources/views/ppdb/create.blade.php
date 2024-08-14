@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tambah Data Tahun Ajaran</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                            <form action="/ppdb" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Kegiatan</label>
                                    <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                        class="form-control  @error('nama_kegiatan') is-invalid @enderror"
                                        value="">
                                    @error('nama_kegiatan')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Tanggal Reguler</label>
                                    <input type="date" id="tanggal_regular" name="tanggal_regular"
                                        class="form-control  @error('tanggal_regular') is-invalid @enderror"
                                        value="">
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
                                        value="">
                                    @error('tanggal_prestasi')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                            <button class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
