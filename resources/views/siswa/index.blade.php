@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Data Siswa</h4>
                </div>
                <div class="card-body">
                    <a href="/siswa/create?kelas_uuid={{ $kelas_uuid }}" class="btn btn-primary mb-3">Tambah Data Siswa</a>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table-user" class="table table-striped table-bordered table-responsive">
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
                                                <a title="edit data"
                                                    href="/siswa/{{ $siswa->uuid }}/edit?kelas_uuid={{ $kelas_uuid }}"
                                                    class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                                <form action="/siswa/{{ $siswa->uuid }}" method="POST"
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
@endsection
