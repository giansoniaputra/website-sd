@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Data Humas</h2>
                    <a href="/humas/create" class="btn btn-primary">Tambah Data Humas</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-user" class="table table-striped table-bordered"">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($humas as $Humas)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $Humas->nama }}</td>
                                        <td>{{ $Humas->link }}</td>
                                        <td class="text-center"><a title="lihat gambar" href="/storage/{{ $Humas->photo }}"
                                                class="btn btn-primary" target="_blank"><i class="bi bi-card-image"></i></a>
                                        </td>
                                        <td class="text-center">

                                            <a title="edit data" href="/humas/{{ $Humas->uuid }}/edit"
                                                class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                            <form action="/humas/{{ $Humas->uuid }}" method="POST" style="display:inline">
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
