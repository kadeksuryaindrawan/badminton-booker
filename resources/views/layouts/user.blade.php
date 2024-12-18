<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Badminton Booker - Tempat Sewa Lapangan Denpasar</title>
  <meta name="author" content="vecuro">
  <meta name="description" content="Travolo -  Travel Agency & Tour Booking HTML Template">
  <meta name="keywords" content="Travolo -  Travel Agency & Tour Booking HTML Template">
  <meta name="robots" content="INDEX,FOLLOW">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicons - Place favicon.ico in the root directory -->
  <link rel="icon" type="image/png" href="{{ asset('landing') }}/img/favicons/favicon.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!--==============================
	  Google Fonts
	============================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!--==============================
	    All CSS File
	============================== -->
  <!-- Bootstrap -->
  <!-- <link rel="stylesheet" href="{{ asset('landing') }}/css/app.min.css"> -->
  <link rel="stylesheet" href="{{ asset('landing') }}/css/bootstrap.min.css">
  <!-- Fontawesome Icon -->
  <link rel="stylesheet" href="{{ asset('landing') }}/css/fontawesome.min.css">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="{{ asset('landing') }}/css/magnific-popup.min.css">
  <!-- Slick Slider -->
  <link rel="stylesheet" href="{{ asset('landing') }}/css/slick.min.css">
  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{ asset('landing') }}/css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

  <!--********************************
  Code Start From Here
	******************************** -->

  <!--==============================
    Mobile Menu
  ============================== -->
  <div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
      <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
      <div class="mobile-logo">
        <a href="{{ url('/') }}"><p style="font-size: 20px; font-weight: 600; letter-spacing: 1px;">BADMINTON BOOKER</p></a>
      </div>
      <div class="vs-mobile-menu">
        <ul>
            <li>
            <a href="{{ url('/') }}">Home</a>
            </li>
            <li>
            <a href="{{ url('/about-us') }}">About Us</a>
            </li>
            <li>
            <a href="{{ url('/daftar-gor') }}">Gor</a>
            </li>
            <li>
            <a href="{{ url('/contact-us') }}">Contact Us</a>
            </li>
            @if (Auth::check() == true)
                <li class="menu-item-has-children">
                    <a href="#">{{ ucwords(Auth::user()->nama) }}</a>
                    <ul class="sub-menu">
                    <li><a href="{{ route('profile-user',Auth::user()->id) }}">Profile</a></li>
                    <li><a href="{{ url('/histori-transaksi') }}">Histori Transaksi</a></li>
                    </ul>
                </li>
            @endif
        </ul>
      </div>
    </div>
  </div>

  <!--==============================
    Header Area
  ==============================-->
  <header class="vs-header header-layout1">
    <div class="header-top py-2">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col d-none d-lg-block">
            <ul class="header-contact">
              <li><i class="fas fa-envelope"></i> <a href="mailto:info@travolo.com">info@badmintonbooker.com</a>
              </li>
              <li><i class="fas fa-phone-alt"></i> <a href="#">020 7388 5619</a></li>
            </ul>
          </div>
          <div class="col-auto">
            <div class="header-btns">
                <a href="{{ url('/cart') }}">
                    <button class=""><i class="fal fa-shopping-bag"></i>
                        @if (Auth::check() == true)
                        <span class="button-badge">{{ $count_cart }}</span>
                        @endif
                    </button>
                </a>
              </div>
          </div>
          <div class="col-auto">
            @if (Auth::check() == false)
                <a class="vs-btn style2 " href="{{ url('/login') }}">Login</a>
            @endif

            @if (Auth::check() == true)
                <a class="vs-btn style2 " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endif

          </div>
        </div>
      </div>
    </div>
    <div class="sticky-wrapper">
      <div class="sticky-active">
        <div class="container position-relative z-index-common">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <div class="vs-logo">
                <a href="{{ url('/') }}"><p class="sec-subtitle" style="font-size: 20px; font-weight: 800; letter-spacing: 1px; margin-top:10px;">BADMINTON BOOKER</p></a>
              </div>
            </div>
            <div class="col-auto">
              <nav class="main-menu menu-style1 d-none d-lg-block">
                <ul>
                  <li>
                    <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li>
                    <a href="{{ url('/about-us') }}">About Us</a>
                  </li>
                  <li>
                    <a href="{{ url('/daftar-gor') }}">Gor</a>
                  </li>
                  <li>
                    <a href="{{ url('/contact-us') }}">Contact Us</a>
                  </li>
                    @if (Auth::check() == true)
                        <li class="menu-item-has-children">
                            <a href="#">{{ ucwords(Auth::user()->nama) }}</a>
                            <ul class="sub-menu">
                            <li><a href="{{ route('profile-user',Auth::user()->id) }}">Profile</a></li>
                            <li><a href="{{ url('/histori-transaksi') }}">Histori Transaksi</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </nav>
              <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  @yield('content')

  <!--==============================
	  Footer Area
	============================== -->
  <footer class="footer-wrapper footer-layout1 shape-mockup-wrap">
    <div class="widget-area2">
      <div class="container">
        <div class="row g-5 justify-content-between">
          <div class="col-md-6 col-xl-3">
            <div class="widget footer-widget">
              <div class="vs-widget-about">
                <div class="footer-logo">
                  <a href="{{ url('/') }}"><p style="font-size: 20px; font-weight: 800; letter-spacing: 1px;">BADMINTON BOOKER</p></a>
                </div>
                <p class="footer-text">Tempat sewa lapangan bulu tangkis denpasar yang sudah terpercaya.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-2">
            <div class="widget widget_nav_menu footer-widget">
              <h3 class="widget_title">Menu</h3>
              <div class="menu-all-pages-container">
                <ul class="menu">
                  <li><a href="{{ url('/') }}"><i class="far fa-angle-right"></i> Home</a></li>
                  <li><a href="{{ url('/about-us') }}"><i class="far fa-angle-right"></i> About Us</a></li>
                  <li><a href="{{ url('/daftar-gor') }}"><i class="far fa-angle-right"></i> Gor</a></li>
                  <li><a href="{{ url('/contact') }}"><i class="far fa-angle-right"></i> Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-2">
            <div class="widget widget_nav_menu footer-widget footer-contact">
              <h3 class="widget_title">Contact</h3>
              <div class="menu-all-pages-container">
                <ul class="menu">
                  <li><a href="#"><i class="fas fa-map-marker-alt"></i> Denpasar</a></li>
                  <li><a href="#"><i class="fas fa-envelope"></i> info@badmintonbooker.com</a></li>
                  <li><a href="#"><i class="fas fa-phone-alt"></i> +880 1234 567890</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright-wrap">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-12">
            <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> <script>document.write(new Date().getFullYear())</script> <a href="{{ url('/') }}">BADMINTON BOOKER</a>.
              All Rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- ********************************
    Code Ends Here
	********************************* -->

  <!-- Scroll To Top -->
  <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

  <!-- ==============================
    All Js File
  ================================ -->
  <!-- Jquery -->
  <script src="{{ asset('landing') }}/js/vendor/jquery-3.6.0.min.js"></script>
  <!-- Slick Slider -->
  <script src="{{ asset('landing') }}/js/slick.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('landing') }}/js/bootstrap.min.js"></script>
  <!-- Magnific Popup -->
  <script src="{{ asset('landing') }}/js/jquery.magnific-popup.min.js"></script>
  <!-- jquery Ui -->
  <script src="{{ asset('landing') }}/js/jquery-ui.min.js"></script>
  <!-- Circle Progress -->
  <script src="{{ asset('landing') }}/js/circle-progress.min.js"></script>
  <!-- isotope -->
  <script src="{{ asset('landing') }}/js/imagesLoaded.js"></script>
  <script src="{{ asset('landing') }}/js/isotope.js"></script>
  <!-- Wow.js -->
  <script src="{{ asset('landing') }}/js/wow.min.js"></script>
  <!-- Main Js File -->
  <script src="{{ asset('landing') }}/js/main.js"></script>
</body>

</html>
