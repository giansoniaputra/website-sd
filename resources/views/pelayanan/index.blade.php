@extends('layout.main')
@section('container')
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="card">
                        <div class="card-header">
                            <h2>Data Pelayanan Publik</h2>
                            <a href="/pelayanan-public/create" class="btn btn-primary">Tambah Data Pelayanan Publik</a>
                        </div>
                        <div class="card-body">
                            <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>PDF</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Pelayanans as $pelayanan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelayanan->nama }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $pelayanan->pdf) }}" target="_blank"
                                                    class="btn btn-primary">Download
                                                    PDF</a>
                                            </td>
                                            <td class="text-center">
                                                <a title="edit data" href="/pelayanan-public/{{ $pelayanan->uuid }}/edit"
                                                    class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                                <form action="/pelayanan-public/{{ $pelayanan->uuid }}" method="POST"
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
