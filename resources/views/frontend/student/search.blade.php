
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
                            Data Pelajar Tidak Dijumapai
                        </div>
                        <div class="page-search">
                            <div class="mt-3">
                                <a href="{{ route('frontend.portal.home') }}">Kembali Ke Portal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </body>
@endsection



