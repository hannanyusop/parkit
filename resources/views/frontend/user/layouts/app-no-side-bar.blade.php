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

    @stack('after-styles')
    <script src="{{ asset('ui/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('ui/modules/izitoast/js/iziToast.min.js') }}"></script>


</head>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@stack('before-scripts')
<script src="{{ asset('ui/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ui/modules/moment.min.js') }}"></script>
<script src="{{ asset('ui/js/stisla.js') }}"></script>
<script src="{{ asset('ui/modules/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('ui/js/scripts.js') }}"></script>
<script src="{{ asset('ui/js/custom.js') }}"></script>
@stack('after-scripts')
</body>
</html>
