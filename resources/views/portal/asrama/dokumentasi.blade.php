@extends('portal.layout.app')

@section('content')
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($docs as $key => $doc)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('frontend.portal.asrama.dokumentasi-fail', $doc->id)  }}" class="bg-light p-4 text-center border-radius mb-4 d-block">
                        <img class="img-fluid w-25" src="{{ asset('img/pdf-icon.png') }}" alt="">
                        <h6 class="mt-4">{{ $doc['name'] }}</h6>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
