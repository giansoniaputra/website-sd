@extends('layout.main')
@section('container')
    <div class="row ms-2 mb-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Kurikulum</h2>
                        <a href="/kurikulum/create" class="btn btn-primary">Tambah Kurikulum</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-user" class="table table-striped table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Foto</th>
                                        <th>PDF</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kurikulum as $kur)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $kur->nama }}</td>
                                            <td class="text-center">
                                                <a title="lihat gambar" href="/storage/{{ $kur->photo }}"
                                                    class="btn btn-transparent" target="_blank">
                                                    <img src="/storage/{{ $kur->photo }}" alt="Foto" width="50">
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/' . $kur->pdf) }}" target="_blank"
                                                    class="btn btn-primary">Download
                                                    PDF</a>
                                            </td>
                                            <td class="text-center">
                                                <a title="edit data" href="/kurikulum/{{ $kur->uuid }}/edit"
                                                    class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                                <form action="/kurikulum/{{ $kur->uuid }}" method="POST"
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
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
