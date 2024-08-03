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
                            <form action="tahun-ajaran/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Tahun Awal</label>
                                    <input type="text" id="tahun_awal" name="tahun_awal"
                                        class="form-control  @error('tahun_awal') is-invalid @enderror"
                                        value="">
                                    @error('tahun_awal')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Tahun Akhir</label>
                                    <input type="text" id="tahun_akhir" name="tahun_akhir"
                                        class="form-control  @error('tahun_akhir') is-invalid @enderror"
                                        value="">
                                    @error('tahun_akhir')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                            <button class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
