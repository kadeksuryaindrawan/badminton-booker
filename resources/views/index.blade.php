@extends('layouts.user')

@section('content')

    <!--==============================
      Hero Area Start
    ==============================-->
    <section class="hero-layout1">
        <div>
        <div class="vs-carousel hero-slider2" data-slide-show="1" data-fade="true">
            <div class="hero-slide hero-mask" data-bg-src="{{ asset('landing') }}/img/banner/hero2-bg.jpg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="hero-content">
                    <span class="hero-subtitle">Let's Go Now</span>
                    <h1 class="hero-title">Let’s Enjoy Your Trip With Travolo</h1>
                    <p class="hero-text">Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
                        consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.</p>
                    <a href="about.html" class="vs-btn style4">Read More</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="hero-slide hero-mask" data-bg-src="{{ asset('landing') }}/img/banner/hero2-bg2.jpg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="hero-content">
                    <span class="hero-subtitle">Let's Go Now</span>
                    <h1 class="hero-title">Riding The Tide Of Endless World</h1>
                    <p class="hero-text">Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
                        consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.</p>
                    <a href="about.html" class="vs-btn style4">Read More</a>
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
        Tour Package Area Start
    ==============================-->
    <section class="space bg-light shape-mockup-wrap" data-bg-src="{{ asset('landing') }}/img/shape/Bg.png">
        <div class="shape-mockup d-none d-xl-block spin z-index-negative" data-bottom="-5%" data-right="-5%">
        <img src="{{ asset('landing') }}/img/shape/circle1.png" alt="Circle">
        </div>
        <div class="container ">
        <div class="row justify-content-center text-center">
            <div class="col-xl-6 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
            <div class="title-area">
                <span class="sec-subtitle">Awesome Tours</span>
                <h2 class="sec-title h1">Best Holiday Package</h2>
                <p class="sec-text">Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget
                consectetur sed, convgallis at tellus. Vestibulum ac diam sit.</p>
            </div>
            </div>
        </div>
        <div class="row vs-carousel" data-slide-show="4" data-arrows="false" data-lg-slide-show="3" data-md-slide-show="2"
            data-sm-slide-show="1">
            <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="package-style1">
                <div class="package-img">
                <a href="tour-booking.html"><img class="w-100" src="{{ asset('landing') }}/img/tours/tour-1-1.jpg" alt="Package Image"></a>
                </div>
                <div class="package-content">
                <div class="package-review">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h3 class="package-title"><a href="tour-booking.html">Peek Mountain View</a></h3>
                <p class="package-text">Las Vegas, Nevada</p>
                <div class="package-meta">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                    <a href="#"><i class="fas fa-user"></i> People: 3</a>
                </div>
                <div class="package-footer">
                    <span class="package-price">$399</span>
                    <a href="tour-booking.html" class="vs-btn style4">View Details</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="package-style1">
                <div class="package-img">
                <a href="tour-booking.html"><img class="w-100" src="{{ asset('landing') }}/img/tours/tour-1-2.jpg" alt="Package Image"></a>
                </div>
                <div class="package-content">
                <div class="package-review">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="package-title"><a href="tour-booking.html">Explore Our World</a></h3>
                <p class="package-text">Las Vegas, Nevada</p>
                <div class="package-meta">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                    <a href="#"><i class="fas fa-user"></i> People: 3</a>
                </div>
                <div class="package-footer">
                    <span class="package-price">$259</span>
                    <a href="tour-booking.html" class="vs-btn style4">View Details</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="package-style1">
                <div class="package-img">
                <a href="tour-booking.html"><img class="w-100" src="{{ asset('landing') }}/img/tours/tour-1-3.jpg" alt="Package Image"></a>
                </div>
                <div class="package-content">
                <div class="package-review">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h3 class="package-title"><a href="tour-booking.html">Guided Adventures</a></h3>
                <p class="package-text">Las Vegas, Nevada</p>
                <div class="package-meta">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                    <a href="#"><i class="fas fa-user"></i> People: 3</a>
                </div>
                <div class="package-footer">
                    <span class="package-price">$299</span>
                    <a href="tour-booking.html" class="vs-btn style4">View Details</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="package-style1">
                <div class="package-img">
                <a href="tour-booking.html"><img class="w-100" src="{{ asset('landing') }}/img/tours/tour-1-4.jpg" alt="Package Image"></a>
                </div>
                <div class="package-content">
                <div class="package-review">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h3 class="package-title"><a href="tour-booking.html">Relax With Beach View</a></h3>
                <p class="package-text">Las Vegas, Nevada</p>
                <div class="package-meta">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                    <a href="#"><i class="fas fa-user"></i> People: 3</a>
                </div>
                <div class="package-footer">
                    <span class="package-price">$299</span>
                    <a href="tour-booking.html" class="vs-btn style4">View Details</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="package-style1">
                <div class="package-img">
                <a href="tour-booking.html"><img class="w-100" src="{{ asset('landing') }}/img/tours/tour-1-5.jpg" alt="Package Image"></a>
                </div>
                <div class="package-content">
                <div class="package-review">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h3 class="package-title"><a href="tour-booking.html">Wanderlust Wonderland</a></h3>
                <p class="package-text">Las Vegas, Nevada</p>
                <div class="package-meta">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Days: 2</a>
                    <a href="#"><i class="fas fa-user"></i> People: 2</a>
                </div>
                <div class="package-footer">
                    <span class="package-price">$199</span>
                    <a href="tour-booking.html" class="vs-btn style4">View Details</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="package-style1">
                <div class="package-img">
                <a href="tour-booking.html"><img class="w-100" src="{{ asset('landing') }}/img/tours/tour-1-6.jpg" alt="Package Image"></a>
                </div>
                <div class="package-content">
                <div class="package-review">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="package-title"><a href="tour-booking.html">Explore Our World</a></h3>
                <p class="package-text">Las Vegas, Nevada</p>
                <div class="package-meta">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                    <a href="#"><i class="fas fa-user"></i> People: 3</a>
                </div>
                <div class="package-footer">
                    <span class="package-price">$259</span>
                    <a href="tour-booking.html" class="vs-btn style4">View Details</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="text-center pt-lg-2">
            <a href="tours.html" class="vs-btn">View More</a>
        </div>
        </div>
    </section>
    <!--==============================
        Tour Package Area End
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
                <a href="about.html" class="vs-btn style4 ">View More</a>
            </div>
            </div>
            <div class="col-xl-6">
            <div class="img-box3">
                <img class="img1" src="{{ asset('landing') }}/img/about/about-1-1.jpg" alt="about image">
                <div class="bottom-img">
                <img class="img2" src="{{ asset('landing') }}/img/about/about-1-2.jpg" alt="about image">
                <img class="img3" src="{{ asset('landing') }}/img/about/about-1-3.jpg" alt="about image">
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
        Features Area Start
    ==============================-->
    <section class="space-extra-bottom shape-mockup-wrap">
        <div class="shape-mockup d-none d-xl-block ripple-animation z-index-negative" data-bottom="10%" data-right="13%">
        <img src="{{ asset('landing') }}/img/shape/circle.png" alt="svg">
        </div>
        <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6 col-12">
            <div class="features-style1">
                <div class="features-bg" data-bg-src="{{ asset('landing') }}/img/shape/features.png"></div>
                <div class="features-image">
                <img src="{{ asset('landing') }}/img/features/features-1-1.png" alt="image">
                </div>
                <div class="features-content">
                <h3 class="features-title">Special Activities</h3>
                <p class="features-text">Curabitur aliquet qugbfam isfbd dgui posuedfdre bladscfndit vivgbagmus Bitur
                    aliquet</p>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 col-12">
            <div class="features-style1">
                <div class="features-bg" data-bg-src="{{ asset('landing') }}/img/shape/features.png"></div>
                <div class="features-image">
                <img src="{{ asset('landing') }}/img/features/features-1-2.png" alt="image">
                </div>
                <div class="features-content">
                <h3 class="features-title">Popper Guideline</h3>
                <p class="features-text">Curabitur aliquet qugbfam isfbd dgui posuedfdre bladscfndit vivgbagmus Bitur
                    aliquet</p>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 col-12">
            <div class="features-style1">
                <div class="features-bg" data-bg-src="{{ asset('landing') }}/img/shape/features.png"></div>
                <div class="features-image">
                <img src="{{ asset('landing') }}/img/features/features-1-3.png" alt="image">
                </div>
                <div class="features-content">
                <h3 class="features-title">Travel Arrangement </h3>
                <p class="features-text">Curabitur aliquet qugbfam isfbd dgui posuedfdre bladscfndit vivgbagmus Bitur
                    aliquet</p>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 col-12">
            <div class="features-style1">
                <div class="features-bg" data-bg-src="{{ asset('landing') }}/img/shape/features.png"></div>
                <div class="features-image">
                <img src="{{ asset('landing') }}/img/features/features-1-4.png" alt="image">
                </div>
                <div class="features-content">
                <h3 class="features-title">Location Manager</h3>
                <p class="features-text">Curabitur aliquet qugbfam isfbd dgui posuedfdre bladscfndit vivgbagmus Bitur
                    aliquet</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--==============================
        Features Area End
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
                <span class="sec-subtitle">Top Destination</span>
                <h2 class="sec-title h1">Unforgettable Cities</h2>
                <p class="sec-text">Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget
                consectetur sed,
                convgallis at tellus.</p>
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
            <div class="col-xl-4">
            <div class="destination-style1">
                <a href="destination-details.html"> <img src="{{ asset('landing') }}/img/destinations/destinations-1-1.jpg" alt="destination image"></a>
                <span class="destination-price">$259</span>
                <div class="destination-info">
                <h4 class="destination-name"><a href="#">Thailand</a></h4>
                <p class="destination-text">Explore Sea & Get Relax</p>
                </div>
            </div>
            </div>
            <div class="col-xl-4">
            <div class="destination-style1">
                <a href="destination-details.html"> <img src="{{ asset('landing') }}/img/destinations/destinations-1-2.jpg" alt="destination image"></a>
                <span class="destination-price">$369</span>
                <div class="destination-info">
                <h4 class="destination-name"><a href="#">Japan</a></h4>
                <p class="destination-text">Explore Sea & Get Relax</p>
                </div>
            </div>
            </div>
            <div class="col-xl-4">
            <div class="destination-style1">
                <a href="destination-details.html"> <img src="{{ asset('landing') }}/img/destinations/destinations-1-3.jpg" alt="destination image"></a>
                <span class="destination-price">$299</span>
                <div class="destination-info">
                <h4 class="destination-name"><a href="#">Spain</a></h4>
                <p class="destination-text">Explore Sea & Get Relax</p>
                </div>
            </div>
            </div>
            <div class="col-xl-4">
            <div class="destination-style1">
                <a href="destination-details.html">
                <img src="{{ asset('landing') }}/img/destinations/destinations-1-8.jpg" alt="destination image" /></a>
                <span class="destination-price">$158</span>
                <div class="destination-info">
                <h4 class="destination-name"><a href="#">Mexico</a></h4>
                <p class="destination-text">Explore World & Get Relax</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--==============================
        Destinations Area End
    ==============================-->

@endsection
