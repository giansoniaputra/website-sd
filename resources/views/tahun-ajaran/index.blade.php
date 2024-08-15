@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Data Tahun Ajaran</h2>
                    <a href="/tahun-ajaran/create" class="btn btn-primary">Tambah Data Tahun Ajaran</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-user" class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Awal</th>
                                    <th>Tahun Akhir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($tahunAjarans as $TahunAjaran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $TahunAjaran->tahun_awal }}</td>
                                        <td>{{ $TahunAjaran->tahun_akhir }}</td>
                                        <td class="text-center">
                                            <a title="edit data" href="/tahun-ajaran/{{ $TahunAjaran->uuid }}/edit"
                                                class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                            <form action="/tahun-ajaran/{{ $TahunAjaran->uuid }}" method="POST"
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
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
