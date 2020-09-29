@extends('portal.layout.app')

@section('content')
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/asrama/kbk/4.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">PERKHIDMATAN KONTRAK</h1>
                        <p class="text-white mb-0">Perkhidmatan Kebersihan Bangunan & Kawasan (KBK)</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.kontrak')
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center pb-4 pb-md-5">
                <div class="col-lg-12">
                    <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                        <div class="mr-3">
                            <h2 class="mb-3 mb-lg-0">Prosidur Oprasi Standard(SOP) Yang Ditetapkan</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Pemakaian</h4>
                            <p>Menggunakan (Costume) yang lengkap dan kemas sepanjang waktu bertugas</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Peralatan</h4>
                            <p>
                                Memastikan semua peralatan dalam keadaan yang baik
                            </p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Masa</h4>
                            <p>Memastikan semua petugas mematuhi masa</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Masa</h4>
                            <p>Memastikan semua petugas mematuhi masa</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    About -->

    <section class="space-ptb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/1.png') }}" alt="">
                </div>
                <div class="col-lg-6">
                    <span class="text-uppercase text-mutedq">Years of experience </span>
                    <h3>Website development</h3>
                    <p>The following outlines our web-development process, which can be split into several sensible elements:</p>
                    <ul class="list-unstyled list-number mb-0">
                        <li class="mb-2"><span>01</span> Technical analysis</li>
                        <li class="mb-2"><span>02</span> Planning and Idea</li>
                        <li class="mb-2"><span>03</span> Design and Copywriting</li>
                        <li class="mb-2"><span>04</span> Front- &amp; Back-End Coding</li>
                        <li class="mb-2"><span>05</span> Quality Assurance</li>
                        <li class="mb-2"><span>06</span> Testing and Launch</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pb">
        <div class="container">
            <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                <div class="col-lg-6">
                    <h3 class="mb-3 mb-lg-0 text-center">Senarai Dokumen KBK</h3>
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                @foreach($docs as $key => $doc)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('frontend.portal.asrama.dokumentasi-fail', $doc->id)  }}" class="bg-light p-4 text-center border-radius mb-4 d-block">
                            <img class="img-fluid w-25" src="{{ asset('img/pdf-icon.png') }}" alt="">
                            <h6 class="mt-4">{{ $doc['name'] }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <br><br><br>
        </div>
    </section>
@endsection
