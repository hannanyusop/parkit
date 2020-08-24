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
        @include('backend.includes.header')
        @include('backend.includes.sidebar')
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
                        @include('includes.partials.announcements')
                        @include('includes.partials.messages')
                    </div>
                    <div class="col-12">
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
