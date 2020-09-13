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

</head>
<body>

<header class="header default">
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-block d-md-flex align-items-center text-center">
                        <div class="mr-4 d-inline-block py-1">
                            <a href="#"><i class="far fa-envelope mr-2 fa-flip-horizontal text-primary"></i>admin@smkal.edu.my</a>
                        </div>
                        <div class="mr-auto d-inline-block py-1">
                            <a href="tel:1-800-555-1234"><i class="fas fa-map-marker-alt text-primary mr-2"></i>Km 11.7,Jalan Pandaruan, Peti Surat 493, 98700, Limbang</a>
                        </div>
                        <div class="d-inline-block py-1">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('frontend.auth.login') }}">Log Masuk Staff</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar bg-white navbar-static-top navbar-expand-lg">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
            <a class="navbar-brand" href="{{ route('frontend.portal.home') }}">
                <img class="img-fluid" src="{{ asset('img/portal/logo.png') }}" alt="logo">
            </a>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utama</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="active"><a class="dropdown-item" href="{{ route('frontend.portal.home') }}">Utama<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">Mengenai SMKAL</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.pengenalan') }}">Pengenalan<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.pengetua') }}">Perutusan Pengetua<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.pengetua') }}">Carta Organisasi<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.smkal.visi') }}">Visi Misi<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">Asrama</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.asrama.direktori') }}">Direktori Asrama<i class="fas fa-arrow-right"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.asrama.kemudahan') }}">Kemudahan<i class="fas fa-arrow-right"></i></a></li>

                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">Muat Turun Borang</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('frontend.portal.download.borang') }}">Senarai Borang<i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')
<div id="back-to-top" class="back-to-top">up</div>

<footer class="footer mt-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-primary mb-2 mb-sm-4">Pautan Atas Talian</h5>
                <div class="footer-link">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Sapskara</a></li>

                    </ul>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Sistem Maklumat Sekolah</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
                <h5 class="text-primary mb-2 mb-sm-4"></h5>
                <div class="footer-link">
                    <ul class="list-unstyled mb-0">

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 mb-4 mb-sm-0">
                <h5 class="text-primary mb-2 mb-sm-4"></h5>
                <div class="footer-link">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="footer-contact-info">
                    <h5 class="text-primary mb-3">Hubungi Kami</h5>
                    <div class="contact-address">
                        <div class="contact-item">
                            <label>Address:</label>
                            <p>Km 11.7,Jalan Pandaruan, Peti Surat 493, 98700, Limbang
                            </p>
                        </div>
                        <div class="contact-item">
                            <label>Phone:</label>
                            <h4 class="mb-0 font-weight-bold"><a href="#">+60 11657 50592</a></h4>
                        </div>
                        <div class="contact-item">
                            <label>Email:</label>
                            <a class="text-dark" href="#">admin@smkal.my</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-sm-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
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
