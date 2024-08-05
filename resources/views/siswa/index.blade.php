@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Data Siswa</h4>
                </div>
                <div class="card-body">
                    <a href="/kelas/create" class="btn btn-primary mb-3">Tambah Data Siswa</a>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $siswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>
                                                <a href="{{ route('siswa.edit', ['siswa' => $siswa->id, 'kelas_uuid' => $kelas_uuid]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form
                                                    action="{{ route('siswa.destroy', ['siswa' => $siswa->id, 'kelas_uuid' => $kelas_uuid]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
