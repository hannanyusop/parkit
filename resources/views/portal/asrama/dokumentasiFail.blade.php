@extends('portal.layout.app')

@section('content')
    <style>
        .embed-responsive {
            position: relative;
            display: block;
            height: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">HALA TUJU</h1>
                        <p class="text-white mb-0">Senarai Dokumen/Bahan Semakan</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.halatuju')
    </section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h5>Senarai Dokumen/Bahan Untuk Semakan</h5>
                    <p>{{ $doc->name }}</p>
                </div>
            </div>
        </div>
        <section class="space-pb mt-1">
            <div class="row text-center">
                <div class="col-md-6 offset-md-3">
                    <div class='embed-responsive' style='padding-bottom:150%'>
                        <object data='{{ getFile($doc->file) }}' type='application/pdf' width='100%' height='100%'></object>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
