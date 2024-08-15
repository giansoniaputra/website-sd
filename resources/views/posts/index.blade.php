@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Data Input Berita</h2>
                    <a href="/news/create" class="btn btn-primary">Tambah Data Input Berita</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-user" class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Body</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $post->title }}</td>
                                        <td class="text-center">{{ $post->author }}</td>
                                        <td class="text-center">{{ $post->category->kategori }}</td>
                                        <td class="text-center"><a title="lihat gambar" href="/storage/{{ $post->image }}"
                                                class="btn btn-primary mb-1" target="_blank"><i
                                                    class="bi bi-card-image"></i></a></td>
                                        <td>{!! $post->body !!}</td>
                                        <td class="text-center">
                                            <a title="edit data" href="/news/{{ $post->slug }}/edit"
                                                class="btn btn-warning "><i class="ri-edit-2-line"></i></a>
                                            <form action="/news/{{ $post->slug }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-light mt-1"
                                                    onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i
                                                        class="mdi mdi-delete-forever"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $posts->links() }} --}}
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
