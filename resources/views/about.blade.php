@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>About Us</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        About Area Start
    ==============================-->
    <section class="space">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
            <div class="image-box1">
                <img class="img1" src="{{ asset('landing') }}/img/about/4.jpeg" alt="image1">
                <img class="img2" src="{{ asset('landing') }}/img/about/1.jpg" alt="image2">
                <div class="media-box1">
                <span class="media-info">2 Years</span>
                <p class="media-text">Of Experience</p>
                </div>
                <div class="media-box2">
                <span class="media-info">1000+</span>
                <p class="media-text">Happy Clients</p>
                </div>
            </div>
            </div>
            <div class="col-lg-5">
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
        </div>
        </div>
    </section>
    <!--==============================
        About Area End
    ==============================-->

@endsection
