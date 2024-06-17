@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-bx">
                            <div class="card-header">
                                <h4 class="title">Form Tambah Lapangan</h4>
                            </div>
                            <form method="POST" action="{{ route('lapangan.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Nama Lapangan</label>
                                            <input type="text" class="form-control" name="nama_lapangan" value="{{ old('nama_lapangan') }}" placeholder="Lapangan A, Lapangan B, ..." required>
                                            @error('nama_lapangan')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Harga Per Jam</label>
                                            <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga" value="{{ old('harga') }}" required>
                                            @error('harga')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="foto" value="{{ old('foto') }}" required>
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
