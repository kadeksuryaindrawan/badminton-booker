@extends('layouts.user')

@section('content')

    <!--==============================
      Hero Area Start
    ==============================-->
    <section class="hero-layout1">
        <div>
        <div class="vs-carousel hero-slider2" data-slide-show="1" data-fade="true">
            <div class="hero-slide hero-mask" data-bg-src="{{ asset('landing') }}/img/banner/1.jpg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="hero-content">
                    <span class="hero-subtitle">Ayo Hidup Sehat</span>
                    <h1 class="hero-title">Booking Lapangan Anda Sekarang</h1>
                    <p class="hero-text">Kami Menyediakan Berbagai Gor Dan Lapangan Bulu Tangkis Untuk Anda.</p>
                    <a href="{{ url('/gor') }}" class="vs-btn style4">Daftar Gor</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="hero-slide hero-mask" data-bg-src="{{ asset('landing') }}/img/banner/2.jpg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="hero-content">
                    <span class="hero-subtitle">Ayo Hidup Sehat</span>
                    <h1 class="hero-title">Harga Yang Sangat Terjangkau</h1>
                    <p class="hero-text">Harga sewa lapangan kami sangat terjangkau. Ayo sewa lapangan disini.</p>
                    <a href="{{ url('/gor') }}" class="vs-btn style4">Daftar Gor</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div>
            <button class="icon-btn prev-btn" data-slick-prev=".hero-slider2"><i class="fas fa-chevron-left"></i></button>
            <button class="icon-btn next-btn" data-slick-next=".hero-slider2"><i class="fas fa-chevron-right"></i></button>
        </div>
        </div>
    </section>
    <!-- ============================
            Hero Area End
        ==============================-->

    <!--==============================
        About Area Start
    ==============================-->
    <section class="space shape-mockup-wrap">
        <div class="shape-mockup d-none d-xl-block jump z-index-negative" data-top="10%" data-right="10%">
        <img src="{{ asset('landing') }}/img/shape/up-arrow.png" alt="svg">
        </div>
        <div class="shape-mockup d-none d-xl-block jump z-index-negative" data-bottom="15%" data-right="5%">
        <img src="{{ asset('landing') }}/img/shape/Lines.png" alt="svg">
        </div>
        <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-5">
            <div class="about-content">
                <div class="title-area">
                <span class="sec-subtitle">We are Badminton Booker</span>
                <h2 class="sec-title h1">Kami Adalah Yang Terbaik</h2>
                <p class="sec-text">Situs kami menyediakan berbagai macam lapangan
                    bulu tangkis. Sudah pasti terlengkap dan harga terjangkau.
                    Kami akan mempermudah anda untuk menyewa lapangan.</p>
                </div>
            </div>
            </div>
            <div class="col-xl-6">
            <div class="img-box3">
                <img class="img1" src="{{ asset('landing') }}/img/about/4.jpeg" alt="about image">
                <div class="bottom-img">
                <img class="img2" src="{{ asset('landing') }}/img/about/3.jpg" alt="about image">
                <img class="img3" src="{{ asset('landing') }}/img/about/2.jpg" alt="about image">
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--==============================
        About Area End
    ==============================-->

    <!--==============================
        Destiniations Area Start
    ==============================-->
    <section class="space space-extra-bottom bg-light shape-mockup-wrap" data-bg-src="{{ asset('landing') }}/img/shape/Bg.png">
        <div class="shape-mockup d-none d-xl-block spin z-index-negative" data-top="-20%" data-right="-8%">
        <img src="{{ asset('landing') }}/img/shape/circle1.png" alt="circle">
        </div>
        <div class="shape-mockup d-none d-xl-block  z-index-negative" data-bottom="13%" data-left="0%">
        <img src="{{ asset('landing') }}/img/shape/walk.png" alt="circle">
        </div>
        <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
            <div class="title-area">
                <span class="sec-subtitle">Daftar Gor</span>
                <h2 class="sec-title h1">Gor Kami</h2>
                <p class="sec-text">Berikut merupakan daftar gor yang kami sediakan untuk anda</p>
            </div>
            </div>
            <div class="col-auto">
            <div class="sec-btns">
                <button class="icon-btn" data-slick-prev=".destinationSlide"><i class="fas fa-chevron-left"></i></button>
                <button class="icon-btn" data-slick-next=".destinationSlide"><i class="fas fa-chevron-right"></i></button>
            </div>
            </div>
        </div>
        <div class="row destinationSlide vs-carousel" data-slide-show="3" data-arrows="false" data-lg-slide-show="2"
            data-md-slide-show="2" data-sm-slide-show="1">
            @foreach ($gors as $gor)
                <div class="col-xl-4">
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
        Destinations Area End
    ==============================-->

@endsection
