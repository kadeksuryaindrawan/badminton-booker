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
                    <h4>Filter Laporan</h4>
                    <form action="{{ route('filter-laporan') }}" method="GET">
                        <div class="row">
                            <div class="col-auto">
                                <label for="dari">Dari Tanggal</label>
                                @if (isset($dari) && isset($sampai))
                                    <input type="date" value="{{ $dari }}" class="form-control" id="dari" name="dari" required>
                                @else
                                    <input type="date" class="form-control" id="dari" name="dari" required>
                                @endif
                            </div>
                            <div class="col-auto">
                                <label for="sampai">Sampai Tanggal</label>
                                @if (isset($dari) && isset($sampai))
                                    <input type="date" value="{{ $sampai }}" class="form-control" id="sampai" name="sampai" required>
                                @else
                                    <input type="date" class="form-control" id="sampai" name="sampai" required>
                                @endif
                            </div>
                            <div class="col-auto">
                                <label for=""></label>
                                <button type="submit" style="margin-top: 25px;" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('daftar-all-laporan') }}" class="mt-5"><button class="btn btn-secondary">Tampilkan Semua Data Tanpa Filter</button></a>
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Laporan Pemesanan</h4>
                                @if ($pemesanans->isNotEmpty())
                                    @if (isset($dari) && isset($sampai))
                                        <div>
                                            <a href="{{ route('export-filter-pdf', ['dari' => $dari, 'sampai' => $sampai]) }}"><button class="btn btn-danger">Export PDF</button></a>
                                            <a href="{{ route('export-filter-excel', ['dari' => $dari, 'sampai' => $sampai]) }}"><button class="btn btn-success">Export Excel</button></a>
                                        </div>
                                    @else
                                        <div>
                                            <a href="{{ route('export-all-pdf') }}"><button class="btn btn-danger">Export PDF</button></a>
                                            <a href="{{ route('export-all-excel') }}"><button class="btn btn-success">Export Excel</button></a>
                                        </div>
                                    @endif

                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Transaction ID</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Nama Bank Pelanggan</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @foreach ($pemesanans as $pemesanan)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ date("d M Y H:i:s",strtotime($pemesanan->created_at)) }}</td>
                                                    <td>{{ ucwords($pemesanan->transaction_id) }}</td>
                                                    <td>{{ ucwords($pemesanan->user->nama) }}</td>
                                                    <td>{{ strtoupper($pemesanan->nama_bank) }}</td>
                                                    <td>
                                                        @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                                                            <span class="badge badge-warning">{{ $pemesanan->transaction_status }}</span>
                                                        @elseif($pemesanan->transaction_status == 'terbayar')
                                                            <span class="badge badge-success">{{ $pemesanan->transaction_status }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $pemesanan->transaction_status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>Rp. {{ number_format($pemesanan->total,0,",",".") }}</td>
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
