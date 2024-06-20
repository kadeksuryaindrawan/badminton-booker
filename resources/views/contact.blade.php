@extends('layouts.user')

@section('content')

    <!--==============================
	  Hero area Start
	==============================-->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('landing') }}/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!--==============================
        Hero Area End
        ==============================-->

    <!--==============================
        Contact box Area Start
        ==============================-->
    <section class="space contact-box_wrapper">
        <div class="outer-wrap">
        <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                <div class="contact-box_icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="contact-box__title h5">Address</h3>
                <p class="contact-box__text">
                    272 Rodney St, Brooklyn, East Houston Street New York City
                </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                <div class="contact-box_icon">
                    <i class="fas fa-address-card"></i>
                </div>
                <h3 class="contact-box__title h5">Contact</h3>
                <ul class="contact-box_list">
                    <li>Mobile: <a href="#123456789">123456789</a></li>
                    <li>Hotline: <a href="#123456789">123456789</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                <div class="contact-box_icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="contact-box__title h5">Office Hour</h3>
                <ul class="contact-box_list">
                    <li>Monday - Friday: 8:30 - 20:00</li>
                    <li>Saturday & Sunday: 9:30 - 21:30</li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--==============================
        Contact box Area End
        ==============================-->

@endsection
