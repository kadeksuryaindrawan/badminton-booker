<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
    <meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
    <meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PAGE TITLE HERE -->
    <title>Badminton Booker - Verify Email</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/images/favicon.png">
    <link href="{{ asset('admin') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ url('/') }}" class="brand-logo">
                                            <p class="text-primary" style="font-size: 20px; font-weight: 800; letter-spacing: 1px;">BADMINTON BOOKER</p>
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Verify Your Email Address</h4>

                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                                    <p>{{ __('If you did not receive the email') }},</p>

                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Click here to request another') }}</button>
                                        </div>
                                    </form>

                                    <div class="new-account mt-3">
                                        <p>
                                            <a href="{{ route('logout') }}" class="text-primary" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                Back To Home
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin') }}/js/custom.min.js"></script>
    <script src="{{ asset('admin') }}/js/dlabnav-init.js"></script>

</body>
</html>
