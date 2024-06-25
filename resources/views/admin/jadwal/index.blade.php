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
                                <h4 class="card-title">Daftar Jadwal {{ $lapangan->nama_lapangan }}</h4>
                                <a href="{{ route('tambah-jadwal',$lapangan->id) }}"><button class="btn btn-primary">Tambah Jadwal</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jadwal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @foreach ($jadwals as $jadwal)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ ucwords($jadwal->jadwal) }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button id="toa" class="btn btn-sm btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <span class="bi bi-three-dots-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                {{-- <a href="" class="dropdown-item"><i class="fas fa-info-circle"></i> Detail </a> --}}
                                                                <a href="{{ route('edit-jadwal',$jadwal->id) }}" class="dropdown-item"><i class="fa fa-edit" id="from1"></i> Edit</a>
                                                                <form action="{{route('hapus-jadwal',$jadwal->id)}}" method="post" onsubmit="return confirm('Yakin hapus jadwal?')">
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
