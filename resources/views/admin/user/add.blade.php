@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-bx">
                            <div class="card-header">
                                <h4 class="title">Form Tambah User</h4>
                            </div>
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                            @error('password')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Password Confirmation</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">No Hp</label>
                                            <input type="number" class="form-control" value="{{ old('no_hp') }}" name="no_hp" required>
                                            @error('no_hp')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                                            @error('alamat')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="jenis_kelamin" required>
                                                <option selected disabled>- Pilih Jenis Kelamin -</option>
                                                @php
                                                    $jenis_kelamin = ['laki-laki', 'perempuan'];
                                                @endphp
                                                @foreach ($jenis_kelamin as $jenis_kelamin)
                                                    <option value="{{ $jenis_kelamin }}">{{ ucwords($jenis_kelamin) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Role</label>
                                            <select class="form-select" name="role" required>
                                                <option selected disabled>- Pilih Role -</option>
                                                @php
                                                    $role = ['super admin', 'admin', 'user'];
                                                @endphp
                                                @foreach ($role as $role)
                                                    <option value="{{ $role }}">{{ ucwords($role) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
