@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('/landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Pembayaran</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Pembayaran</li>
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
        <form action="{{ route('bayar-process',$pemesanan->id) }}" class="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row ">
            <div class="col-lg-12">
                <h2 class="h4">Pembayaran</h2>
            </div>

        <div class="mt-5">
            <div class="woocommerce-checkout-payment">
            <div class="card mb-5 p-3">
                <div class="card-title">
                    <h4>Tujuan Transfer</h4>
                </div>
                <div class="card-body">
                    <strong><h5 class="text-danger">Silahkan lakukan transfer ke rekening BCA 87873287 an Walter Andrian atau BRI 8787234 an Walter Andrian, sebesar Rp.{{ number_format($pemesanan->total,0,",",".") }}</h5></strong>
                    <p>*Setelah melakukan transfer, silahkan lengkapi form dibawah dan isi data diri anda serta upload bukti transfer berupa foto(jpg,jpeg,png)!*</p>
                    <p class="text-danger">*Harap melakukan pembayaran maksimal 30 menit setelah anda checkout. Jika pembayaran dilakukan lebih dari 30 menit setelah anda checkout, maka pemesanan akan dibatalkan secara otomatis*</p>
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
                <button onclick="return confirm('Yakin bayar? Pastikan data anda sudah benar!')" type="submit" class="vs-btn style4">Bayar</button>
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
