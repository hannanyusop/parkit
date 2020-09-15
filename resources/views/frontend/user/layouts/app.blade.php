<!DOCTYPE html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Hannan Yusop')">
    @yield('meta')

    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('ui/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/components.css') }}">
    @stack('after-styles')
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>

</head>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ $logged_in_user->avatar }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ $logged_in_user->name ?? '' }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">
                            @if($logged_in_user->last_login_at)
                                Logged in @displayDate($logged_in_user->last_login_at)
                            @else
                                @lang('N/A')
                            @endif
                        </div>

                        <a href=" {{ route('frontend.user.account') }}" class="dropdown-item has-icon text-dark"><i class="fa fa-cogs"></i> Akaun</a>
                        <x-utils.link
                            class="dropdown-item has-icon text-danger"
                            icon="fas fa-sign-out-alt"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Log Keluar')
                                <x-forms.get :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('admin.dashboard') }}"><img style="width: 100%; height: auto" alt="logo" src="{{ asset('img/logo2.PNG') }}"></a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('admin.dashboard') }}"><img width="30px" alt="logo" src="{{ asset('img/smkal-logo.png') }}"></a>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.dashboard') }}">
                            <i class="fas fa-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-header">Maklumat Pelajar</li>
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.student.index') }}">
                            <i class="fas fa-search"></i> <span>Carian Pelajar</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.kehadiran.ct.index') }}">
                            <i class="fas fa-chalkboard-teacher"></i> <span>E-Hadir</span>
                        </a>
                    </li>
                    @can('cv_can')
                        <li class="menu-header">CV19 CHECK-IN</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.cv.event.checkin-scan') }}">
                                <i class="fas fa-camera"></i> <span>QR Check-in</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.cv.event.checkin-manual') }}">
                                <i class="fas fa-user-check"></i> <span>Manual Check-in</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.cv.event.history') }}">
                                <i class="fas fa-history"></i> <span>History</span>
                            </a>
                        </li>
                        @can('cv_guard')
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-day"></i><span>Manage Event</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ route('frontend.user.cv.event.index') }}">List</a>
                                    <li><a class="nav-link" href="{{ route('frontend.user.cv.event.add') }}">Create Event</a></li>
                                </ul>
                            </li>
                        @endcan
                    @endcan
                    @can('lib_can')
                        <li class="menu-header">My-Library</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.library.index') }}">
                                <i class="fas fa-book-reader"></i> <span>Laman</span>
                            </a>
                        </li>
                    @endcan
                    @can('portal_can')
                        <li class="menu-header">Portal</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.portal.index') }}">
                                <i class="fas fa-pencil-ruler"></i> <span>Pengurusan Portal</span>
                            </a>
                        </li>
                    @endcan
                    @can('poll_can')
                        <li class="menu-header">Voting System</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.vote.index') }}">
                                <i class="fas fa-vote-yea"></i> <span>Voting</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.vote.apply') }}">
                                <i class="fas fa-file-signature"></i> <span>Join Campaign</span>
                            </a>
                        </li>

                        @can('poll_admin')
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-day"></i><span>Manage Event</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{ route('frontend.user.campaign.index') }}">View My Campaign</a>
                                    <li><a class="nav-link" href="{{ route('frontend.user.campaign.add') }}">Create New Campaign</a></li>
                                </ul>
                            </li>
                        @endcan
                    @endcan
                </ul>


            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('title')</h1>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('includes.partials.read-only')
                        @include('includes.partials.logged-in-as')
{{--                        @include('includes.partials.announcements')--}}
                    </div>
                    <div class="col-12">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
        @include('backend.includes.footer')
    </div>
</div>

@stack('before-scripts')
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>--}}
<script src="{{ asset('ui/js/stisla.js') }}"></script>
<script src="{{ asset('ui/js/scripts.js') }}"></script>
<script src="{{ asset('ui/js/custom.js') }}"></script>
@stack('after-scripts')
</body>
</html>
