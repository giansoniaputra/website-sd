@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Input Foto Banner</h2>
                    <a href="/carousel/create" class="btn btn-primary">Tambah Foto</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{-- Tabel Home --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Home</h4>
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
                                                @foreach ($carousels_home as $Carousel)
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

                        {{-- Tabel Yayasan --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Yayasan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-yayasan" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_yayasan as $Carousel)
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

                        {{-- Tabel Sekolah --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Sekolah</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-sekolah" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_sekolah as $Carousel)
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

                        {{-- Tabel Wakasek --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Wakasek</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-wakasek" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_wakasek as $Carousel)
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

                        {{-- Tabel Guru --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Guru</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-guru" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_guru as $Carousel)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a title="lihat gambar"
                                                                href="/storage/{{ $Carousel->photo }}"
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

                        {{-- Tabel PPDB --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner PPDB</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-ppdb" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_ppdb as $Carousel)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a title="lihat gambar"
                                                                href="/storage/{{ $Carousel->photo }}"
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

                        {{-- Tabel Layanan Publik --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Layanan Publik</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-layanan" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_layanan as $Carousel)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a title="lihat gambar"
                                                                href="/storage/{{ $Carousel->photo }}"
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

                        {{-- Tabel Berita --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Berita</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-berita" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_berita as $Carousel)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a title="lihat gambar"
                                                                href="/storage/{{ $Carousel->photo }}"
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

                        {{-- Tabel Galeri --}}
                        <section>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Foto Banner Galeri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-foto-galeri" class="table table-striped table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($carousels_galeri as $Carousel)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a title="lihat gambar"
                                                                href="/storage/{{ $Carousel->photo }}"
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
            </div>
        </div>
    </div>
@endsection
