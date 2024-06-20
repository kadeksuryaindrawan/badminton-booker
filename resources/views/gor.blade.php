@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Gor</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Daftar Gor</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Destiniations Area Start
    ==============================-->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($gors as $gor)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="destination-style1">
                            <a href="{{ route('daftar-lapangan',$gor->id) }}"> <img style="width: 100%; height: 450px; object-fit:cover;" src="{{ asset('storage/gor/'.$gor->foto) }}" alt="destination image"></a>
                            <div class="destination-info">
                                <h4 class="destination-name"><a href="{{ route('daftar-lapangan',$gor->id) }}">{{ ucwords($gor->nama_gor) }}</a></h4>
                                <p class="destination-text">{{ ucfirst($gor->alamat) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--==============================
        Destiniations Area End
    ==============================-->

@endsection
