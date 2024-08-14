@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Edit Data</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button> {{ session('error') }}
                                </div>
                            @endif
                            <form action="/auth/update/{{$user->uuid}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control  @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="example-email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control  @error('email') is-invalid @enderror" placeholder=""
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="example-password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control  @error('password') is-invalid @enderror" value="">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Pilih Role</label>
                                    <select class="form-select  @error('role') is-invalid @enderror" id="role"
                                        name="role">
                                        <option value="">-- Pilih Role --</option>
                                        <option value="admin" {{ old('role', $user->role)  == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">PERBARUI</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            @endsection
