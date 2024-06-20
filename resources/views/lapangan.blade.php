@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
  <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">Lapangan</h1>
        <div class="breadcumb-menu-wrap">
          <ul class="breadcumb-menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Lapangan</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--==============================
	  Hero Area End
	==============================-->

  <!--==============================
	  Shop Area Start
	==============================-->
  <section class="space-bottom">
    <div class="outer-wrap wrap-style1">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <h3 class="text-center" style="margin-bottom: 70px;">Daftar Lapangan Di {{ ucwords($gor->nama_gor) }}</h3>
            <div class="row">
                @foreach ($lapangans as $lapangan)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="vs-product">
                        <div class="product-body">
                            <h3 class="product-title">{{ ucwords($lapangan->nama_lapangan) }}</h3>
                            <span class="product-price">Rp.{{ number_format($lapangan->harga,0,",",".") }}/Jam</span>
                            <a href="{{ route('detail-lapangan',$lapangan->id) }}" class="vs-btn style4 w-100">Detail</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--==============================
	  Shop Area End
	==============================-->

@endsection
