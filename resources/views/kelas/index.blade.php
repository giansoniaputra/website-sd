@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Data Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/kelas" method="GET">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="filter_tahun" class="form-label">Tahun Ajaran</label>
                                            <select class="form-select" id="filter_tahun" name="filter_tahun">
                                                <option value="">-- Pilih Tahun Ajaran --</option>
                                                @foreach ($tahunAjaran as $tahun)
                                                    <option value="{{ $tahun->uuid }}">
                                                        {{ $tahun->tahun_awal }}/{{ $tahun->tahun_akhir }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="filter_kelas" class="form-label">Kelas</label>
                                            <input type="text" id="filter_kelas" name="filter_kelas"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Filter</button>
                                            <a href="/kelas" class="btn btn-secondary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Jumlah Laki-Laki</th>
                                        <th>Jumlah Perempuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $kela)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kela->tahunAjaran->tahun_ajaran }}</td>
                                            <td>{{ $kela->kelas }}</td>
                                            <td>{{ $kela->nama_kelas }}</td>
                                            <td>{{ $kela->jumlah_lk }}</td>
                                            <td>{{ $kela->jumlah_pr }}</td>
                                            <td>
                                                <a href="/kelas/{{ $kela->uuid }}/edit"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="/kelas/{{ $kela->uuid }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
