
@extends('frontend.user.layouts.app-no-side-bar')

@section('title', 'Scan E-Kehadiran Murid')
@section('content')
    <body class="sidebar-gone">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>404</h1>
                        <div class="page-description">
                            {{ __('Student Not Found') }}
                        </div>
                        <div class="page-search">
                            <div class="mt-3">
                                <a href="{{ route('frontend.auth.login') }}">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </body>
@endsection



