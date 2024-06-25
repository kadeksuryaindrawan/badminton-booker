@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-bx">
                            <div class="card-header">
                                <h4 class="title">Form Tambah Jadwal {{ ucwords($lapangan->nama_lapangan) }}</h4>
                            </div>
                            <form method="POST" action="{{ route('add-jadwal',$lapangan->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label">Jadwal</label>
                                            <input type="text" class="form-control" name="jadwal" value="{{ old('jadwal') }}" placeholder="Example: 08.00 - 09.00" required>
                                            @error('jadwal')
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
