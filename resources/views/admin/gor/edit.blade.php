@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-bx">
                            <div class="card-header">
                                <h4 class="title">Form Edit Gor</h4>
                            </div>
                            <form method="POST" action="{{ route('gor.update',$gor->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Pilih Admin</label>
                                            <select name="admin_id" id="" class="form-select" required>
                                                <option value="" selected disabled>- Pilih Admin -</option>
                                                @foreach ($admins as $admin)
                                                    <option value="{{ $admin->admin_id }}" {{ ($admin->admin_id == $gor->admin_id) ? 'selected' : '' }}>{{ ucwords($admin->nama) }}</option>
                                                @endforeach
                                            </select>
                                            @error('admin_id')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Nama Gor</label>
                                            <input type="text" class="form-control" name="nama_gor" placeholder="Masukkan Nama Gor" value="{{ $gor->nama_gor }}" required>
                                            @error('nama_gor')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $gor->alamat }}</textarea>
                                            @error('alamat')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Link Maps</label>
                                            <input type="text" class="form-control" name="link_maps" placeholder="Masukkan Link Google Maps" value="{{ $gor->link_maps }}" required>
                                            @error('link_maps')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Jam Buka</label>
                                            <input type="text" class="form-control" name="jam_buka" placeholder="Example: 08.00" value="{{ $gor->jam_buka }}" required>
                                            @error('jam_buka')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Jam Tutup</label>
                                            <input type="text" class="form-control" name="jam_tutup" placeholder="Example: 17.00" value="{{ $gor->jam_tutup }}" required>
                                            @error('jam_tutup')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="foto">
                                            @error('foto')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
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
