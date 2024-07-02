@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Histori Transaksi</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Histori Transaksi</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        pemesanan Area Start
        ==============================-->
    <div class="space vs-pemesanan-wrapper">
        <div class="container">
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
            </div>
            <h3 class="text-center">Histori Pemesanan</h3>
            <div class="table-responsive">
            <table class="cart_table">
                <thead>
                <tr>
                    <th class="cart-col-image">Tanggal</th>
                    <th class="cart-col-gor">Transaction ID</th>
                    <th class="cart-col-productname">Status</th>
                    <th class="cart-col-price">Bukti Bayar</th>
                    <th class="cart-col-quantity">Total</th>
                    <th class="cart-col-total">Keterangan</th>
                    <th class="cart-col-remove">Option</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanans as $pemesanan)
                        <tr class="pemesanan_item">
                            <td data-title="tanggal">
                            <span class="tanggal">{{ date("d M Y H:i:s",strtotime($pemesanan->created_at)) }}</span>
                            </td>
                            <td data-title="gor">
                            <strong><span>{{ $pemesanan->transaction_id }}</span></strong>
                            </td>
                            <td data-title="lapangan">
                                @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                                    <span class="text-warning">{{ $pemesanan->transaction_status }}</span>
                                @elseif($pemesanan->transaction_status == 'terbayar')
                                    <span class="text-success">{{ $pemesanan->transaction_status }}</span>
                                @else
                                    <span class="text-danger">{{ $pemesanan->transaction_status }}</span>
                                @endif

                            </td>

                            <td data-title="jadwal">
                                <a target="__BLANK" href="{{ asset('storage/bukti_bayar/'.$pemesanan->bukti_bayar) }}"><button class="btn btn-secondary">Lihat Bukti Bayar</button></a>
                            </td>
                            <td data-title="Total">
                            <span class="amount">Rp. {{ number_format($pemesanan->total,0,",",".") }}</span>
                            </td>
                            <td data-title="Remove">
                                @if ($pemesanan->keterangan == null)
                                    <span>-</span>
                                @else
                                    <span>{{ $pemesanan->keterangan }}</span>
                                @endif
                            </td>
                            <td data-title="Remove">
                                <a href="{{ route('detail-histori',$pemesanan->id) }}"><button class="btn btn-primary">Detail</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!--==============================
        pemesanan Area End
        ==============================-->

@endsection
