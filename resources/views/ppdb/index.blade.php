@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Data PPDB</h2>
                    <a href="/ppdb/create" class="btn btn-primary">Tambah Data PPDB</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-user" class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Reguler</th>
                                    <th>Tanggal Prestasi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppdbs as $PPDB)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $PPDB->nama_kegiatan }}</td>
                                        <td class="text-center">{{ $PPDB->tanggal_regular }}</td>
                                        <td class="text-center">{{ $PPDB->tanggal_prestasi }}</td>
                                        <td class="text-center">
                                            <a title="edit data" href="/ppdb/{{ $PPDB->uuid }}/edit"
                                                class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                            <form action="/ppdb/{{ $PPDB->uuid }}" method="POST" style="display:inline">
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
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
