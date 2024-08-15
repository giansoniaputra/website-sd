@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <section>
                <div class="card">
                    <div class="card-header">
                        <h2>Input Foto Slide</h2>
                        <a href="/carousel/create" class="btn btn-primary">Tambah Foto</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-user" class="table table-striped table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($carousels as $Carousel)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a title="lihat gambar" href="/storage/{{ $Carousel->photo }}"
                                                    class="btn btn-transparent" target="_blank">
                                                    <img src="/storage/{{ $Carousel->photo }}" alt="Foto"
                                                        width="50">
                                                </a>
                                                {{-- <img src="/storage/{{ $gallery->photo }}" alt="Foto" width="100"> --}}
                                            </td>
                                            <td class="text-center">
                                                <form action="/carousel/{{ $Carousel->uuid }}" method="POST"
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
            </section>
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
