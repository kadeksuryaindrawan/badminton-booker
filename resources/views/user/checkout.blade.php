@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('/landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Checkout</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Checkout</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Checkout Area Start
        ==============================-->
    <section class="vs-checkout-wrapper space">
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
        <form action="{{ route('checkout-process') }}" class="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
            <div class="col-lg-12">
                <h2 class="h4">Billing Details</h2>
                <div class="row">
                <input type="hidden" name="user_id" id="" value="{{ $user->id }}">
                <input type="hidden" name="total" value="{{ $total_cart }}">
                <div class="col-6 form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" required readonly>
                </div>
                <div class="col-6 form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $user->nama }}" required readonly>
                </div>
                <div class="col-6 form-group">
                    <label for="">No Hp</label>
                    <input type="number" name="no_hp" class="form-control" placeholder="No Hp" value="{{ $user->no_hp }}" required readonly>
                </div>
                <div class="col-6 form-group">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="{{ $user->jenis_kelamin }}" required readonly>
                </div>
                <div class="col-12 form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $user->alamat }}" required readonly>
                </div>
                </div>
            </div>
            </div>
        <h4 class="mt-4 pt-lg-2">Your Order</h4>

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
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="checkout-ordertable">
                <tr class="order-total">
                    <th>Total</th>
                    <td data-title="Total" colspan="6"><strong><span class="woocommerce-Price-amount amount"><bdi><span
                            class="woocommerce-Price-currencySymbol">Rp. {{ number_format($total_cart,0,",",".") }}</strong>
                    </td>
                </tr>
                </tfoot>
            </table>
            </div>

        <div class="mt-5">
            <div class="woocommerce-checkout-payment">
            <div class="card mb-5 p-3">
                <div class="card-title">
                    <h4>Tujuan Transfer</h4>
                </div>
                <div class="card-body">
                    <strong><h5 class="text-danger">Silahkan lakukan transfer ke rekening BCA 87873287 an Walter Andrian atau BRI 8787234 an Walter Andrian, sebesar Rp.{{ number_format($total_cart,0,",",".") }}</h5></strong>
                    <p>*Setelah melakukan transfer, silahkan lengkapi form dibawah dan isi data diri anda serta upload bukti transfer berupa foto(jpg,jpeg,png)!*</p>
                    <p>*Jika anda sudah klik tombol checkout, maka proses pemesanan tidak bisa dibatalkan dengan alasan apapun! Terimakasih *</p>
                </div>
            </div>
            <label for="">Nama Bank Pelanggan*</label>
            <input type="text" name="nama_bank" class="form-control" required placeholder="Example: BCA"><br>

            <label for="">No Rekening Pelanggan*</label>
            <input type="number" name="no_bank" class="form-control" required placeholder="Example: 8782732"><br>

            <label for="">Pemilik Rekening*</label>
            <input type="text" name="pemilik_bank" class="form-control" required placeholder="Example: Walter Andrian"><br>

            <label for="">Upload Bukti Transfer Pelanggan (jpg,jpeg,png)*</label>
            <input type="file" name="bukti_bayar" class="form-control" required>

            <div class="form-row place-order pt-lg-2">
                <button onclick="return confirm('Yakin checkout? Pastikan data dan pesanan anda sudah benar! Jika anda sudah klik tombol checkout pemesanan tidak bisa dibatalkan!')" type="submit" class="vs-btn style4">Checkout</button>
            </div>
            </div>
        </form>
        </div>
        </div>
    </section>
    <!--==============================
        Checkout Area End
        ==============================-->

@endsection
