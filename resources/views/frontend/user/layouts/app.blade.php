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
    <link rel="stylesheet" href="{{ asset('ui/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    @stack('after-styles')
    <script src="{{ asset('ui/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('ui/modules/izitoast/js/iziToast.min.js') }}"></script>


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
                    <a href="{{ route('admin.dashboard') }}"><img class="img-fluid" width="80px"  alt="logo" src="{{ getLogoUrl()}}"></a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('admin.dashboard') }}"><img class="img-fluid" width="80px  alt="logo" src="{{ getLogoUrl()}}"></a>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.dashboard') }}">
                            <i class="fas fa-home"></i> <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="menu-header">{{ __('Student Management') }}</li>
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.kehadiran.ct.index') }}">
                            <i class="fas fa-users"></i> <span>{{ __('List By Class') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.student.index') }}">
                            <i class="fas fa-search"></i> <span>{{ __('Search Student') }}</span>
                        </a>
                    </li>
                    <li class="menu-header">{{ __('Event Attendance Management') }}</li>
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.kehadiran.index') }}">
                            <i class="fas fa-chalkboard-teacher"></i> <span>{{ __('Event List') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('frontend.user.kehadiran.create') }}">
                            <i class="fas fa-calendar-plus"></i> <span>{{ __('Organize New Event') }}</span>
                        </a>
                    </li>
                    @can('lib_can')
                        <li class="menu-header">Perpustakaan</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.library.index') }}">
                                <i class="fas fa-book-reader"></i> <span>Laman Utama</span>
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
                    @can('cv_can')
                        <li class="menu-header">CV19 CHECK-IN</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.cv.event.checkin-scan') }}">
                                <i class="fas fa-camera"></i> <span>QR Check-in</span>
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
                    @can('poll_can')
                        <li class="menu-header">Voting System</li>
                        <li>
                            <a class="nav-link" href="{{ route('frontend.user.vote.index') }}">
                                <i class="fas fa-vote-yea"></i> <span>Voting</span>
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
                    <h6>@yield('title')</h6>
                    <div class="section-header-breadcrumb">
                        @if(isset($breadcrumbs))
                            @foreach($breadcrumbs as $name => $url)
                                <div class="breadcrumb-item {{ ($url != "#")? "active" : "" }}"><a href="{{ $url }}">{{ $name }}</a></div>
                            @endforeach
                        @endif
                    </div>
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
<script src="{{ asset('ui/modules/popper.js') }}"></script>
<script src="{{ asset('ui/modules/tooltip.js') }}"></script>
<script src="{{ asset('ui/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ui/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('ui/modules/moment.min.js') }}"></script>
<script src="{{ asset('ui/js/stisla.js') }}"></script>

<script src="{{ asset('ui/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('ui/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('ui/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('ui/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('ui/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('ui/modules/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('ui/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('ui/modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('ui/modules/chart.min.js') }}"></script>


<script src="{{ asset('ui/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('ui/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('ui/modules/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('ui/js/scripts.js') }}"></script>
<script src="{{ asset('ui/js/custom.js') }}"></script>
<script type="text/javascript">

    @if(session()->has('login_message'))
        swal('{{ __('Announcement') }}', '{{ session()->get('login_message') }}', 'info');
     <?php session()->forget('login_message'); ?>
    @endif

    $("#datable").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });

    $(document).ready(function () {
        var submit_buttons = $("[data-delete]");
        submit_buttons.on('click', function (e) {

            e.preventDefault();

            var button = $(this); // Get the button
            var msg = button.data('delete'); // Get the confirm message
            var title = button.data('title');
            var url = button.data('url');

            swal({
                title: title,
                text: msg,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                    if (result.isConfirmed) {
                    }else{
                        window.location=url;
                    }
                });
        });

    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
@stack('after-scripts')
</body>
</html>
