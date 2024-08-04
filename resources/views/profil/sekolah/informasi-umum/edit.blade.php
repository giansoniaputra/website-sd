@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Tambah / Edit Infomasi Umum</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="/informasi-umum/{{$data->uuid}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="text" class="form-label">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="" value="{{ old('title', $data->title) }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{$message}}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="text" class="form-label">Keterangan</label>
                                <input class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan" id="keterangan" placeholder="" value="{{ old('keterangan', $data->keterangan) }}">
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    <small class="text-danger">{{$message}}</small>
                                </div>
                                @enderror
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
