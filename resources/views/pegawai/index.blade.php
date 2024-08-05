@extends('layout.main')
@section('container')
    <div class="row ms-2 mb-2">
        <div class="col-sm-12">
            <h3 class="card-title">Data Pegawai</h3>
            <a href="/pegawai/create" class="btn btn-primary">Tambah Data Pegawai</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <section>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Guru</h4>
                    </div>
                    <div class="card-body">
                        <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Jabatan</th>
                                    <th>Pendidikan</th>
                                    <th>Ampuan</th>
                                    <th>Foto</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $pegawai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pegawai->nama }}</td>
                                        {{-- <td>{{ $pegawai->status }}</td> --}}
                                        <td>{{ $pegawai->jabatan }}</td>
                                        <td>{{ $pegawai->pendidikan }}</td>
                                        <td>{{ $pegawai->ampuan }}</td>
                                        <td>{{ $pegawai->photo }}</td>
                                        <td class="text-center">
                                            <a title="lihat gambar" href="/storage/{{ $pegawai->photo }}"
                                                class="btn btn-primary" target="_blank"><i class="bi bi-card-image"></i></a>
                                            <a title="edit data" href="/pegawai/{{ $pegawai->uuid }}/edit"
                                                class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                            <form action="/pegawai/{{ $pegawai->uuid }}" method="POST"
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

                    </div> <!-- end card body-->

                </div> <!-- end card -->
            </section>
            <section>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Staf</h4>
                    </div>
                    <div class="card-body">
                        <table id="table-staffs" class="table table-striped dt-responsive nowrap w-100">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Jabatan</th>
                                    <th>Pendidikan</th>
                                    <th>Ampuan</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $pegawai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pegawai->nama }}</td>
                                        {{-- <td>{{ $pegawai->status }}</td> --}}
                                        <td>{{ $pegawai->jabatan }}</td>
                                        <td>{{ $pegawai->pendidikan }}</td>
                                        <td>{{ $pegawai->ampuan }}</td>
                                        <td>{{ $pegawai->photo }}</td>
                                        <td class="text-center">
                                            <a title="lihat gambar" href="/storage/{{ $pegawai->photo }}"
                                                class="btn btn-primary" target="_blank"><i class="bi bi-card-image"></i></a>
                                            <a title="edit data" href="/pegawai/{{ $pegawai->uuid }}/edit"
                                                class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                            <form action="/pegawai/{{ $pegawai->uuid }}" method="POST"
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

                    </div> <!-- end card body-->

                </div> <!-- end card -->
            </section>
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
