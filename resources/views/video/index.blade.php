@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <section>
                <div class="card">
                    <div class="card-header">
                        <h2>Video Kegiatan</h2>
                        <a href="/video/create" class="btn btn-primary">Tambah Video</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-user" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        {{-- <th>Sampul</th> --}}
                                        <th>Link</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $video)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>
                                                @if ($video->sampul)
                                                    <a title="lihat gambar" href="/storage/{{ $video->sampul }}"
                                                        class="btn btn-transparent" target="_blank">
                                                        <img src="/storage/{{ $video->sampul_ }}" alt="Sampul"
                                                            width="50">
                                                @endif
                                            </td> --}}
                                            <td>{!! $video->link !!}</td>
                                            <td>
                                                <a title="edit data" href="/video/{{ $video->uuid }}/edit"
                                                    class="btn btn-warning mb-1"><i class="ri-edit-2-line"></i></a>
                                                <form action="/video/{{ $video->uuid }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-light"
                                                        onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i
                                                            class="mdi mdi-delete-forever"></i> </button>
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
