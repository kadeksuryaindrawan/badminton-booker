@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Lapangan</h4>
                                <a href="{{ route('lapangan.create') }}"><button class="btn btn-primary">Tambah Lapangan</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama Lapangan</th>
                                                <th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @foreach ($lapangans as $lapangan)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <a class="example-image-link" href="{{ asset('storage/lapangan/'.$lapangan->foto) }}" data-lightbox="example-1">
                                                            <img style="width: 50px; height: 50px; object-fit:cover;" src="{{ asset('storage/lapangan/'.$lapangan->foto) }}" alt="">
                                                        </a>
                                                    </td>
                                                    <td>{{ ucwords($lapangan->nama_lapangan) }}</td>
                                                    <td>Rp. {{ number_format($lapangan->harga,0,",",".") }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button id="toa" class="btn btn-sm btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <span class="bi bi-three-dots-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                {{-- <a href="" class="dropdown-item"><i class="fas fa-info-circle"></i> Detail </a> --}}
                                                                <a href="{{ route('lapangan.edit',$lapangan->id) }}" class="dropdown-item"><i class="fa fa-edit" id="from1"></i> Edit</a>
                                                                <form action="{{route('lapangan.destroy',$lapangan->id)}}" method="post" onsubmit="return confirm('Yakin hapus lapangan?')">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>

@endsection
