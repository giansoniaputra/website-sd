@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Data User</h2>
                    <a href="/auth/create" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="table-user" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td class="text-center">
                                        <a title="edit data" href="/auth/edit/{{ $user->uuid }}"
                                            class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                                        @if (count($users) > 1)

                                        <form action="/auth/delete/{{ $user->uuid }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-light" onClick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Ini ?')"><i class="mdi mdi-delete-forever"></i> </button>
                                            {{-- <a title="delete data" class="btn btn-warning"><i class="mdi-delete-forever"></i></a> --}}
                                        </form>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
