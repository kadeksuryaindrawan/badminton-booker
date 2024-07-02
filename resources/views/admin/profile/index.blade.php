@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                        <div class="alert alert-success solid" role="alert">
                            {{session('success')}}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger solid" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-bx">
                            <div class="card-header">
                                <h4 class="title">Profile</h4>
                            </div>
                            <form method="POST" action="{{ route('profile-edit',$user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" required>
                                            @error('nama')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                            @error('email')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                            @error('password')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Password Confirmation</label>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">No Hp</label>
                                            <input type="number" class="form-control" value="{{ $user->no_hp }}" name="no_hp" required>
                                            @error('no_hp')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $user->alamat }}</textarea>
                                            @error('alamat')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="jenis_kelamin" required>
                                                <option selected disabled>- Pilih Jenis Kelamin -</option>
                                                @php
                                                    $jenis_kelamin = ['laki-laki', 'perempuan'];
                                                @endphp
                                                @foreach ($jenis_kelamin as $jenis_kelamin)
                                                    <option value="{{ $jenis_kelamin }}" {{ ($user->jenis_kelamin == $jenis_kelamin) ? 'selected' : ''; }}>{{ ucwords($jenis_kelamin) }}</option>
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
