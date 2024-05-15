<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Badminton Booker - Tempat Sewa Lapangan</title>
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
        <a href="{{ url('/') }}"><img src="{{ asset('landing') }}/img/logo.svg" alt="BAD BOOK"></a>
      </div>
      <div class="vs-mobile-menu">
        <ul>
            <li>
            <a href="{{ url('/') }}">Home</a>
            </li>
            <li>
            <a href="{{ url('/') }}">About Us</a>
            </li>
            <li>
            <a href="{{ url('/') }}">Lapangan</a>
            </li>
            <li>
            <a href="{{ url('/') }}">Contact Us</a>
            </li>
        </ul>
      </div>
    </div>
  </div>

  <!--==============================
    Header Area
  ==============================-->
  <header class="vs-header header-layout2">
    <div class="header-top">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col d-none d-lg-block">
            <ul class="header-contact">
              <li><i class="fas fa-envelope"></i> <a href="mailto:info@travolo.com">info@travolo.com</a>
              </li>
              <li><i class="fas fa-phone-alt"></i> <a href="tel:02073885619">020 7388 5619</a></li>
            </ul>
          </div>
          <div class="col-auto">
            <div class="header-social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
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
                <a href="{{ url('/') }}"><img src="{{ asset('landing') }}/img/logo.svg" alt="logo"></a>
              </div>
            </div>
            <div>
              <nav class="main-menu menu-style1 d-none d-lg-block">
                <ul>
                  <li>
                    <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li>
                    <a href="{{ url('/') }}">About Us</a>
                  </li>
                  <li>
                    <a href="{{ url('/') }}">Lapangan</a>
                  </li>
                  <li>
                    <a href="{{ url('/') }}">Contact Us</a>
                  </li>
                </ul>
              </nav>
              <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
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
                  <a href="index.html"><img src="{{ asset('landing') }}/img/white-logo.svg" alt="Travolo" class="logo" /></a>
                </div>
                <p class="footer-text">Curabitur aliquet quam id dui bandit posuere blandit. Vivamfdsus magna justo
                  blandit aliquet.</p>
                <div class="social-style1">
                  <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-2">
            <div class="widget widget_nav_menu footer-widget">
              <h3 class="widget_title">Useful Links</h3>
              <div class="menu-all-pages-container">
                <ul class="menu">
                  <li><a href="index.html"><i class="far fa-angle-right"></i> Home</a></li>
                  <li><a href="destinations.html"><i class="far fa-angle-right"></i> Destinations</a></li>
                  <li><a href="tours.html"><i class="far fa-angle-right"></i> Tour</a></li>
                  <li><a href="shop.html"><i class="far fa-angle-right"></i> Shop</a></li>
                  <li><a href="blog.html"><i class="far fa-angle-right"></i> Blog</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-2">
            <div class="widget widget_nav_menu footer-widget footer-contact">
              <h3 class="widget_title">Contact</h3>
              <div class="menu-all-pages-container">
                <ul class="menu">
                  <li><a href="#"><i class="fas fa-map-marker-alt"></i> Fifth Avenue 5501, Broadway, New York Morris
                      Street.</a></li>
                  <li><a href="#"><i class="fas fa-envelope"></i> info@travolo.com</a></li>
                  <li><a href="#"><i class="fas fa-phone-alt"></i> +880 1234 567890</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3">
            <div class="widget footer-widget">
              <h4 class="widget_title">Our Instagram</h4>
              <div class="sidebar-gallery">
                <a href="{{ asset('landing') }}/img/footer/insta1.jpg" class="popup-image"><img src="{{ asset('landing') }}/img/footer/insta1.jpg" alt="Gallery Image" class="w-100" />
                </a>
                <a href="{{ asset('landing') }}/img/footer/insta2.jpg" class="popup-image"><img src="{{ asset('landing') }}/img/footer/insta2.jpg" alt="Gallery Image" class="w-100" />
                </a>
                <a href="{{ asset('landing') }}/img/footer/insta3.jpg" class="popup-image"><img src="{{ asset('landing') }}/img/footer/insta3.jpg" alt="Gallery Image" class="w-100" />
                </a>
                <a href="{{ asset('landing') }}/img/footer/insta4.jpg" class="popup-image"><img src="{{ asset('landing') }}/img/footer/insta4.jpg" alt="Gallery Image" class="w-100" />
                </a>
                <a href="{{ asset('landing') }}/img/footer/insta5.jpg" class="popup-image"><img src="{{ asset('landing') }}/img/footer/insta5.jpg" alt="Gallery Image" class="w-100" />
                </a>
                <a href="{{ asset('landing') }}/img/footer/insta6.jpg" class="popup-image"><img src="{{ asset('landing') }}/img/footer/insta6.jpg" alt="Gallery Image" class="w-100" />
                </a>
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
            <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> <script>document.write(new Date().getFullYear())</script> <a href="index.html">Travolo</a>.
              All Rights Reserved By <a href="https://themeforest.net/user/vecuro">Vecuro</a></p>
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
