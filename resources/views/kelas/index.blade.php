@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Data Kelas</h2>
                    <a href="/kelas/create" class="btn btn-primary mb-3">Tambah Data Kelas</a>
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
                                            <select id="filter_kelas"
                                                class="form-control @error('kelas') is-invalid @enderror"
                                                name="filter_kelas">
                                                <option value="">-- Pilih Kelas --</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                            </select>
                                            {{-- <input type="text" id="filter_kelas" name="filter_kelas"
                                                class="form-control"> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
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
                                        @foreach ($kelas as $kelas)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @foreach ($tahunAjaran as $tahun)
                                                        @if ($kelas->tahun_ajaran_uuid == $tahun->uuid)
                                                            {{ $tahun->tahun_awal }}/{{ $tahun->tahun_akhir }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $kelas->kelas }}</td>
                                                <td>{{ $kelas->nama_kelas }}</td>
                                                <td>{{ $kelas->jumlah_lk }}</td>
                                                <td>{{ $kelas->jumlah_pr }}</td>
                                                <td class="text-center">
                                                    <a title="tambah siswa" href="/siswa?kelas_uuid={{ $kelas->uuid }}"
                                                        class="btn btn-primary"><i class="bi bi-person-fill-add"></i></a>
                                                    <a title="edit data" href="/kelas/{{ $kelas->uuid }}/edit"
                                                        class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                                    <form action="/kelas/{{ $kelas->uuid }}" method="POST"
                                                        style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger text-light"
                                                            onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i
                                                                class="mdi mdi-delete-forever"></i> </button>
                                                        {{-- <a title="delete data" class="btn btn-warning"><i class="mdi-delete-forever"></i></a> --}}
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
    </div>
@endsection
