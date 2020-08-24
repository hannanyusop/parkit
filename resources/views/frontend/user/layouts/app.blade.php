<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/ionicons/2.0.1/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/toastr/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @stack('after-styles')

    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>



</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{ $logged_in_user->name }}</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('frontend.user.account') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Account Setting
                    </a>

                    <div class="dropdown-divider"></div>
                    <x-utils.link
                        :text="__('Logout')"
                        class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            @lang('Logout')
                            <x-forms.get :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                    </x-utils.link>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-success elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('frontend.user.dashboard') }}" class="brand-link">
            <img src="{{ asset('img/smkal-logo.png') }}"
                 alt="Logo"
                 class="brand-image elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{ appName() }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('frontend.user.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>Home
                        </a>
                    </li>
                    <li class="nav-header">Sistem Maklumat Pelajar</li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.user.student.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>Carian Pelajar
                        </a>
                    </li>
                    <a href="{{ route('frontend.user.kehadiran.ct.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>E-Hadir</p>
                    </a>
                    @can('cv_can')
                        <li class="nav-header">CV19 CHECK-IN </li>
                        <li class="nav-item">
                            <a href="{{ route('frontend.user.cv.event.checkin-scan') }}" class="nav-link">
                                <i class="nav-icon fas fa-camera"></i>
                                <p>QR Check-in</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('frontend.user.cv.event.checkin-manual') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>Manual Check-in</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('frontend.user.cv.event.history') }}" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>History</p>
                            </a>
                        </li>
                        @can('cv_guard')
                            <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-day"></i>
                                <p>
                                    Manage Event
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('frontend.user.cv.event.index') }}" class="nav-link">
                                        <i class="far fa-calendar-alt nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('frontend.user.cv.event.add') }}" class="nav-link">
                                        <i class="far fa-calendar-plus nav-icon"></i>
                                        <p>Create Event</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                    @endcan
                    @can('lib_can')
                    <li class="nav-header">My-Library (Coming Soon)</li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.user.library.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @endcan
                    @can('poll_can')
                        <li class="nav-header">Coop Voting System</li>
                        <li class="nav-item">
                            <a href="{{ route('frontend.user.vote.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-vote-yea"></i>
                                <p>Vote</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('frontend.user.vote.apply') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Join Campaign</p>
                            </a>
                        </li>
                        @can('poll_admin')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                    <p>
                                        Manage Campaign
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.user.campaign.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View My Campaign</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frontend.user.campaign.add') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create New Campaign</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                    @endcan
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Header (Page header) -->
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.user.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="m-3">
            @include('includes.partials.messages')
        </div>
        @yield('content')

    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.0
        </div>
        <strong>Developed By <a href="#">HANNAN YUSOP </a></strong> for <b><img src="{{ asset('img/smkal-logo.png') }}" width="15px"> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG </b>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>

@stack('before-scripts')
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
@stack('after-scripts')
</body>

</html>
