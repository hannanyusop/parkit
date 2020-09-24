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
        @include('backend.includes.header')
        @include('backend.includes.sidebar')
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


<script src="{{ asset('ui/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('ui/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('ui/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('ui/modules/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('ui/js/scripts.js') }}"></script>
<script src="{{ asset('ui/js/custom.js') }}"></script>
<script type="text/javascript">

    @if(session()->has('login_message'))
        swal('Pengunguman', '{{ session()->get('login_message') }}', 'info');
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
