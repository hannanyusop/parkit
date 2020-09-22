<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PORTAL RASMI SMKAL</title>

    <link rel="shortcut icon" href="{{ asset('img/smkal-logo.png') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo:400,500,600,700&amp;display=swap">

    <link rel="stylesheet" href="{{ asset('portal/css/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('portal/css/flaticon/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('portal/css/bootstrap/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('portal/css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('portal/css/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('portal/css/animate/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('portal/css/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('portal/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('portal/css/custom.css') }}" />

</head>
<body>

<header class="header default">
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <img style="width: 100%;height: auto;"  src="{{ asset('img/header.PNG') }}">
{{--                    <div class="d-block d-md-flex align-items-center text-center">--}}
{{--                        <div class="mr-4 d-inline-block py-1">--}}
{{--                            <a href="#"><i class="far fa-envelope mr-2 fa-flip-horizontal text-primary"></i>admin@smkal.edu.my</a>--}}
{{--                        </div>--}}
{{--                        <div class="mr-auto d-inline-block py-1">--}}
{{--                            <a href="tel:1-800-555-1234"><i class="fas fa-map-marker-alt text-primary mr-2"></i>Km 11.7,Jalan Pandaruan, Peti Surat 493, 98700, Limbang</a>--}}
{{--                        </div>--}}
{{--                        <div class="d-inline-block py-1">--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li><a href="{{ route('frontend.auth.login') }}">Log Masuk Staff</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar bg-white navbar-static-top navbar-expand-lg">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
            <a class="navbar-brand" href="{{ route('frontend.portal.home') }}">
                <img class="img-fluid" src="{{ asset('img/white.png') }}" alt="logo">
            </a>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <a class="nav-link" href="{{ route('frontend.portal.home') }}">Utama</a>
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">Mengenai SMKAL</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.pengenalan') }}">Pengenalan<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.pengetua') }}">Perutusan Pengetua<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.organisasi') }}">Carta Organisasi<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.visi') }}">Visi Misi<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">Asrama</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.asrama.direktori') }}">Direktori Asrama<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.asrama.halatuju') }}">Hala Tuju<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.asrama.kemudahan') }}">Kemudahan<i class="fas fa-arrow-right"></i></a></li>

                        </ul>
                    </li>
                    <a class="nav-link" href="{{ route('frontend.portal.download.borang') }}">Muat Turun Borang</a>
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">Sistem Atas Talian</a>
                        <ul class="dropdown-menu">
                            @if(auth()->user())
                                <li><a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">Sistem Maklumat Sekolah(Logged in)<i class="fas fa-arrow-right"></i></a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('frontend.auth.login') }}">Sistem Maklumat Sekolah<i class="fas fa-arrow-right"></i></a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')
<div id="back-to-top" class="back-to-top">up</div>

{{--<footer class="footer mt-3">--}}
{{--    <div class="footer-bottom py-sm-5 py-4">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <p class="mb-0">©Copyright 2020 <a href="{{ route('frontend.portal.home') }}">SMK Agama Limbang</a></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}

<footer class="footer space-ptb bg-light mt-n5">
    <div class="footer-bottom mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="list-unstyled mb-3 mb-md-5 social-icon social-icon-lg">
                        <li><a href="#"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter fa-2x"></i></a></li>
                    </ul>
                    <p class="mb-0">©Copyright 2020 <a href="{{ route('frontend.portal.home') }}">SMK Agama Limbang</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('portal/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('portal/js/popper/popper.min.js') }}"></script>
<script src="{{ asset('portal/js/bootstrap/bootstrap.min.js') }}"></script>

<script src="{{ asset('portal/js/jquery.appear.js') }}"></script>
<script src="{{ asset('portal/js/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('portal/js/swiperanimation/SwiperAnimation.min.js') }}"></script>
<script src="{{ asset('portal/js/counter/jquery.countTo.js') }}"></script>
<script src="{{ asset('portal/js/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('portal/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Template Scripts (Do not remove)-->
<script src="{{ asset('portal/js/custom.js') }}"></script>

</body>

</html>
