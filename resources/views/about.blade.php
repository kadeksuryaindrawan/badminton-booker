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
                <img class="img1" src="{{ asset('landing') }}/img/about/img-2-1.jpg" alt="image1">
                <img class="img2" src="{{ asset('landing') }}/img/about/img-2-2.jpg" alt="image2">
                <div class="media-box1">
                <span class="media-info">25 Years</span>
                <p class="media-text">Of Experience</p>
                </div>
                <div class="media-box2">
                <span class="media-info">20,000+</span>
                <p class="media-text">Happy Clients</p>
                </div>
            </div>
            </div>
            <div class="col-lg-5">
            <div class="about-content">
                <div class="title-area">
                <span class="sec-subtitle">We are Travolo</span>
                <h2 class="sec-title h1">We Are The Best For Your Travel </h2>
                <p class="sec-text">Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei. Xei an
                    periculaeuripidis, fincartem ei est. Dlienum phaed is in mei. Lei an Hericulaeuripidis, hincartem ei
                    est.</p>
                </div>
                <ul class="about-list1">
                <li>Mei an periculaeuripidis.</li>
                <li>Lorem ipsum dolor sit am.</li>
                <li>Blienum nhaedrum tortos.</li>
                <li>Dlienum phaed is in meis.</li>
                <li>torquatos nec euls vis.</li>
                <li>peric uripidis, fincartem.</li>
                <li>pericu laeuri pidis Mei sm.</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--==============================
        About Area End
    ==============================-->

@endsection
