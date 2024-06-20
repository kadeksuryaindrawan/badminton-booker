@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Detail Lapangan</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Detail Lapangan</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Shop Details Start
        ==============================-->
    <section class="vs-product-wrapper space">
        <div class="container">
        <div class="product-details">
            <div class="row gx-60">
            <div class="col-lg-5">
                <div class="product-big-img">
                    <div class="img"><img style="width: 100%; height: 500px; object-fit:cover;" src="{{ asset('storage/gor/'.$lapangan->gor->foto) }}" alt="Product Image"></div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="product-about">
                    <h2 class="product-title">
                        {{ ucwords($lapangan->nama_lapangan) }}
                    </h2>
                    <h3 class="product-text">
                        {{ ucwords($lapangan->gor->nama_gor) }}
                    </h3>
                    <p class="product-price">Rp.{{ number_format($lapangan->harga,0,",",".") }}/Jam</p>

                    <form action="">
                        @csrf
                        <label for="tanggal">Pilih Tanggal</label>
                        <input type="date" class="form-control"><br>


                        <label for="jadwal">Jam Tersedia</label>
                        <select name="" id="" class="form-select">
                            <option value="" selected disabled>--Pilih Jam--</option>
                            <option value="">08.00 - 09.00</option>
                        </select>

                        <button type="submit" class="vs-btn style4 mt-4">Add to cart</button>
                    </form>

                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!--==============================
        Shop Details End
        ==============================-->

@endsection
