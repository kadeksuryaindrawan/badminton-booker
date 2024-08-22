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
                                <h4 class="card-title">Daftar Pemesanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Transaction ID</th>
                                                <th>Gor</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @foreach ($pemesanans as $pemesanan)
                                                @foreach ($pemesanan->detail_order as $detail)
                                                @endforeach
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ date("d M Y H:i:s",strtotime($pemesanan->created_at)) }}</td>
                                                    <td>{{ ucwords($pemesanan->transaction_id) }}</td>
                                                    <td>{{ ucwords($detail->lapangan->gor->nama_gor) }}</td>
                                                    <td>{{ ucwords($pemesanan->user->nama) }}</td>
                                                    <td>Rp. {{ number_format($pemesanan->total,0,",",".") }}</td>
                                                    <td>
                                                        @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                                                            <span class="badge badge-warning">{{ $pemesanan->transaction_status }}</span>
                                                        @elseif($pemesanan->transaction_status == 'terbayar')
                                                            <span class="badge badge-success">{{ $pemesanan->transaction_status }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $pemesanan->transaction_status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($pemesanan->keterangan == null)
                                                            -
                                                        @else
                                                            {{ $pemesanan->keterangan }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button id="toa" class="btn btn-sm btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <span class="bi bi-three-dots-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a href="{{ route('detail-pemesanan',$pemesanan->id) }}" class="dropdown-item"><i class="fas fa-info-circle"></i> Detail </a>
                                                                <form action="{{ route('pemesanan-delete',$pemesanan->id) }}" method="post" onsubmit="return confirm('Yakin hapus pemesanan?')">
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
