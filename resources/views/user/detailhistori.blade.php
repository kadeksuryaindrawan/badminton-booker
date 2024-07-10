@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Detail Histori</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Detail Histori</li>
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
            <h3 class="text-center">Detail Histori</h3>
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    <p>Transaction ID : <strong>{{ $pemesanan->transaction_id }}</strong></p>
                    <p>Tanggal Pemesanan : {{ date("d M Y H:i:s",strtotime($pemesanan->created_at)) }}</p>
                    <p>Status :
                        @if ($pemesanan->transaction_status == 'menunggu konfirmasi')
                            <span class="text-warning">{{ $pemesanan->transaction_status }}</span>
                        @elseif($pemesanan->transaction_status == 'terbayar')
                            <span class="text-success">{{ $pemesanan->transaction_status }}</span>
                        @else
                            <span class="text-danger">{{ $pemesanan->transaction_status }}</span>
                        @endif
                    </p>
                    <p>Keterangan :
                        @if ($pemesanan->keterangan == null)
                            <span>-</span>
                        @else
                            <span>{{ $pemesanan->keterangan }}</span>
                        @endif
                    </p>
                </div>
                <div class="">
                    @if ($pemesanan->nama_bank == null)
                        <p>Nama Bank Pelanggan : -</p>
                        <p>No Rekening Pelanggan : -</p>
                        <p>Pemilik Rekening : -</p>
                        <p>Tanggal Transfer : -</p>
                    @else
                        <p>Nama Bank Pelanggan : {{ $pemesanan->nama_bank }}</p>
                        <p>No Rekening Pelanggan : {{ $pemesanan->no_bank }}</p>
                        <p>Pemilik Rekening : {{ $pemesanan->pemilik_bank }}</p>
                        <p>Tanggal Transfer : {{ date("d M Y H:i:s",strtotime($pemesanan->tanggal_bayar)) }}</p>
                    @endif

                </div>
            </div>
            <div class="table-responsive">
            <table class="cart_table">
                <thead>
                <tr>
                    <th class="cart-col-image">Foto Gor</th>
                    <th class="cart-col-gor">Gor</th>
                    <th class="cart-col-productname">Lapangan</th>
                    <th class="cart-col-price">Tanggal Booking</th>
                    <th class="cart-col-quantity">Jadwal</th>
                    <th class="cart-col-total">Total</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($detail_orders as $detail_order)
                        <tr class="detail_order_item">
                            <td data-title="foto">
                            <a class="detail_order-productimage" href="{{ route('detail-lapangan',$detail_order->lapangan->id) }}">
                                <img style="width: 70px; height: 50px; object-fit:cover;"
                                src="{{ asset('storage/gor/'.$detail_order->lapangan->gor->foto) }}" alt="Image" />
                            </a>
                            </td>
                            <td data-title="gor">
                            <span>{{ ucwords($detail_order->lapangan->gor->nama_gor) }}</span>
                            </td>
                            <td data-title="lapangan">
                            <a class="" href="{{ route('detail-lapangan',$detail_order->lapangan->id) }}">{{ ucwords($detail_order->lapangan->nama_lapangan) }}</a>
                            </td>
                            <td data-title="tanggal">
                            <span class="tanggal">{{ date("d M Y",strtotime($detail_order->tanggal)) }}</span>
                            </td>
                            <td data-title="jadwal">
                                <span class="jadwal">{{ $detail_order->jadwal }}</span>
                            </td>
                            <td data-title="Total">
                            <span class="amount">Rp. {{ number_format($detail_order->total,0,",",".") }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        <div class="row justify-content-end">
            <div class="col-md-8 col-lg-7 col-xl-6">
            <h2 class="h4 summary-title">Total</h2>
            <table class="cart_totals">
                <tbody>
                <tr>
                    <td>Total</td>
                    <td data-title="Cart Total">
                    <span class="amount">Rp. {{ number_format($total,0,",",".") }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="{{ url('/histori-transaksi') }}" class="vs-btn w-100 style4">Kembali</a>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        pemesanan Area End
        ==============================-->

@endsection
