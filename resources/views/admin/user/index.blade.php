@extends('layouts.admin')

@section('content')

        <div class="content-body">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar User</h4>
                                <a href=""><button class="btn btn-primary">Tambah User</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>No Hp</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ ucwords($user->nama) }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ ucfirst($user->alamat) }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>{{ ucwords($user->jenis_kelamin) }}</td>
                                                    <td>{{ ucwords($user->role) }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button id="toa" class="btn btn-sm btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <span class="bi bi-three-dots-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a href="" class="dropdown-item"><i class="fas fa-info-circle"></i> Detail </a>
                                                                <a href="" class="dropdown-item"><i class="fa fa-edit" id="from1"></i> Edit</a>
                                                                <a href="" class="dropdown-item" onclick="return confirm('Yakin hapus user ?')"><i class="fa fa-trash"></i> Hapus</a>
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
