
@extends('layout.main')
@section('container')

<div class="row ms-2 mb-2">
    <div class="col-sm-12"><h3 class="card-title">Data Input Berita</h3></div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="/news/create" class="btn btn-primary">Tambah Data Input Berita</a>
            </div>
            <div class="card-body">
                <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td><img src="{{ asset('post-images/' . $post->image) }}" alt="{{ $post->title }}" width="50"></td>
                                <td>
                                    <a title="lihat gambar" href="{{ route('news.show', $post->slug) }}" class="btn btn-primary" target="_blank"><i class="bi bi-card-image"></i></a>
                                    <a title="edit data"  href="{{ route('news.edit', $post->slug) }}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                    <form action="{{ route('news.destroy', $post->slug) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-light" onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i class="mdi mdi-delete-forever"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $posts->links() }} --}}

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->

@endsection

