@extends('layout.main')
@section('container')
    <div class="row ms-2 mb-2">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="card">
                        <div class="card-header">
                            <h2>Sampul PPDB</h2>
                            <a href="/cover-ppdb/create" class="btn btn-primary">Tambah Sampul</a>
                        </div>
                        <div class="card-body">
                            <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sampul Depan</th>
                                        <th>Sampul Belakang</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sampuls as $sampul)
                                        <tr class="text-center">
                                            <td>
                                                {{-- <a title="lihat gambar" href="/storage/{{ $sampul->sampul_depan }}"
                                                    class="btn btn-primary" target="_blank"><i
                                                        class="bi bi-card-image"></i></a> --}}
                                                @if ($sampul->sampul_depan)
                                                    <a title="lihat gambar" href="/storage/{{ $sampul->sampul_depan }}"
                                                        class="btn btn-transparent" target="_blank">
                                                        <img src="/storage/{{ $sampul->sampul_depan }}" alt="Sampul Depan"
                                                            width="50">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a title="lihat gambar" href="/storage/{{ $sampul->sampul_belakang }}"
                                                    class="btn btn-primary" target="_blank"><i
                                                        class="bi bi-card-image"></i></a> --}}
                                                @if ($sampul->sampul_belakang)
                                                    <a title="lihat gambar" href="/storage/{{ $sampul->sampul_belakang }}"
                                                        class="btn btn-transparent" target="_blank">
                                                        <img src="/storage/{{ $sampul->sampul_belakang }}"
                                                            alt="Sampul Belakang" width="50">
                                                    </a>
                                                @endif
                                            </td>
                                            {{-- <td class="text-center">
                                                <form action="cover-ppdb/{{ $sampul->uuid }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-light"
                                                        onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i
                                                            class="mdi mdi-delete-forever"></i> </button>
                                                    <a title="delete data" class="btn btn-warning"><i class="mdi-delete-forever"></i></a>
                                                </form>
                                            </td> --}}
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
