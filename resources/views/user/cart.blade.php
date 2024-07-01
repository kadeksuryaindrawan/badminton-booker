@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Cart</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Cart</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Cart Area Start
        ==============================-->
    <div class="space vs-cart-wrapper">
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
                    <th class="cart-col-remove">Remove</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr class="cart_item">
                            <td data-title="foto">
                            <a class="cart-productimage" href="{{ route('detail-lapangan',$cart->lapangan->id) }}">
                                <img style="width: 70px; height: 50px; object-fit:cover;"
                                src="{{ asset('storage/gor/'.$cart->lapangan->gor->foto) }}" alt="Image" />
                            </a>
                            </td>
                            <td data-title="gor">
                            <span>{{ ucwords($cart->lapangan->gor->nama_gor) }}</span>
                            </td>
                            <td data-title="lapangan">
                            <a class="" href="{{ route('detail-lapangan',$cart->lapangan->id) }}">{{ ucwords($cart->lapangan->nama_lapangan) }}</a>
                            </td>
                            <td data-title="tanggal">
                            <span class="tanggal">{{ date("d M Y",strtotime($cart->tanggal)) }}</span>
                            </td>
                            <td data-title="jadwal">
                                <span class="jadwal">{{ $cart->jadwal }}</span>
                            </td>
                            <td data-title="Total">
                            <span class="amount">Rp. {{ number_format($cart->total,0,",",".") }}</span>
                            </td>
                            <td data-title="Remove">
                                <form action="{{ route('delete-cart',$cart->id) }}" method="post" onsubmit="return confirm('Yakin hapus lapangan dari cart?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-xs btn-danger"><i class="fal fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                <tr>
                    <td colspan="7" class="actions">
                    <a href="{{ url('/daftar-gor') }}" class="vs-btn style4">Lihat Lapangan Lain</a>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        <div class="row justify-content-end">
            <div class="col-md-8 col-lg-7 col-xl-6">
            <h2 class="h4 summary-title">Cart Total</h2>
            <table class="cart_totals">
                <tbody>
                <tr>
                    <td>Total</td>
                    <td data-title="Cart Total">
                    <span class="amount">Rp. {{ number_format($total_cart,0,",",".") }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="{{ url('/checkout') }}" class="vs-btn w-100 style4">Proses Checkout</a>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Cart Area End
        ==============================-->

@endsection
