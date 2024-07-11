<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="" >
	<meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
	<meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
	<meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
	<meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice." >
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title -->
	<title>Badminton Booker - @if (request()->segment(1) == 'home')
                                    Dashboard
                                @else
                                    {{ ucwords(request()->segment(1)) }}
                                @endif</title>

	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/images/favicon.png">

	<!-- All StyleSheet -->
	<link href="{{ asset('admin') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{ asset('admin') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset('admin') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Globle CSS -->
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('admin/css/lightbox.css') }}" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('/') }}" class="brand-logo mx-2 text-center">

                <p class="text-primary" style="font-size: 13px; font-weight: 800; letter-spacing: 1px;">BADMINTON BOOKER</p>

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                @if (request()->segment(1) == 'home')
                                    Dashboard
                                @else
                                    {{ ucwords(request()->segment(1)) }}
                                @endif
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('admin') }}/images/profile/pic1.jpg" width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('profile-admin',Auth::user()->id) }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
         <div class="dlabnav">
            <div class="dlabnav-scroll">
				<div class="dropdown header-profile2 ">
					<a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
						<div class="header-info2 d-flex align-items-center">
							<img src="{{ asset('admin') }}/images/profile/pic1.jpg" alt="">
							<div class="d-flex align-items-center sidebar-info">
								<div>
									<span class="font-w400 d-block">{{ ucwords(Auth::user()->nama) }}</span>
									<small class="text-end font-w400">{{ ucwords(Auth::user()->role) }}</small>
								</div>
								<i class="fas fa-chevron-down"></i>
							</div>

						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a href="{{ route('profile-admin',Auth::user()->id) }}" class="dropdown-item ai-icon ">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
							<span class="ms-2">Profile </span>
						</a>
						<a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
					</div>
				</div>

				<ul class="metismenu" id="menu">
                    <li class="{{ (request()->segment(1) == 'home') ? 'mm-active' : '' }}">
                        <a href="{{ url('/home') }}" class="" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
                    @if (Auth::user()->role == 'super admin')
                        <li class="{{ (request()->segment(1) == 'user') ? 'mm-active' : '' }}">
                            <a href="{{ route('user.index') }}" class="" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="nav-text">User</span>
                            </a>
                        </li>
                        <li class="{{ (request()->segment(1) == 'gor') ? 'mm-active' : '' }}">
                            <a href="{{ route('gor.index') }}" class="" aria-expanded="false">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="nav-text">Gor</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'admin')
                        <li class="{{ (request()->segment(1) == 'lapangan') ? 'mm-active' : '' }}">
                            <a href="{{ route('lapangan.index') }}" class="" aria-expanded="false">
                                <i class="fas fa-map"></i>
                                <span class="nav-text">Lapangan</span>
                            </a>
                        </li>
                    @endif

                    <li class="{{ (request()->segment(1) == 'pemesanan') ? 'mm-active' : '' }}">
                        <a href="{{ route('daftar-pemesanan') }}" class="" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="nav-text">Pemesanan</span>
                        </a>
                    </li>

                    <li class="{{ (request()->segment(1) == 'laporan') ? 'mm-active' : '' }}">
                        <a href="{{ route('daftar-all-laporan') }}" class="" aria-expanded="false">
                            <i class="fas fa-file"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('admin') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('admin') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- Apex Chart -->
<script src="{{ asset('admin') }}/vendor/apexchart/apexchart.js"></script>
<script src="{{ asset('admin') }}/vendor/chartjs/chart.bundle.min.js"></script>

<!-- Datatable -->
<script src="{{ asset('admin') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/js/plugins-init/datatables.init.js"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('admin') }}/vendor/peity/jquery.peity.min.js"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('admin') }}/js/dashboard/dashboard-1.js"></script>

<script src="{{ asset('admin') }}/vendor/owl-carousel/owl.carousel.js"></script>

<script src="{{ asset('admin') }}/js/custom.min.js"></script>
<script src="{{ asset('admin') }}/js/dlabnav-init.js"></script>
<script src="{{ asset('admin/js/lightbox.js') }}"></script>


<script>
function JobickCarousel()
	{

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.front-view-slider').owlCarousel({
			loop:false,
			margin:30,
			nav:true,
			autoplaySpeed: 3000,
			navSpeed: 3000,
			autoWidth:true,
			paginationSpeed: 3000,
			slideSpeed: 3000,
			smartSpeed: 3000,
			autoplay: false,
			animateOut: 'fadeOut',
			dots:true,
			navText: ['', ''],
			responsive:{
				0:{
					items:1,

					margin:10
				},

				480:{
					items:1
				},

				767:{
					items:3
				},
				1750:{
					items:3
				}
			}
		})
	}

	jQuery(window).on('load',function(){
		setTimeout(function(){
			JobickCarousel();
		}, 1000);
	});
</script>
</body>
</html>
