@extends('layout.main')
@section('container')
<div class="row ms-2 mb-2">
    <div class="col-sm-12">
        <h3 class="card-title">Data Sarana</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="/sarana/create" class="btn btn-primary">Tambah Data Sarana</a>
            </div>
            <div class="card-body">
                <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saranas as $sarana)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sarana->nama }}</td>
                            <td>{{ $sarana->photo }}</td>
                            <td class="text-center">
                                <a title="lihat gambar" href="/storage/{{ $sarana->photo }}" class="btn btn-primary" target="_blank"><i class="bi bi-card-image"></i></a>
                                <a title="edit data" href="/sarana/{{ $sarana->uuid }}/edit" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                <form action="/sarana/{{ $sarana->uuid }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-light" onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i class="mdi mdi-delete-forever"></i> </button>
                                    {{-- <a title="delete data" class="btn btn-warning"><i class="mdi-delete-forever"></i></a> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
@endsection
