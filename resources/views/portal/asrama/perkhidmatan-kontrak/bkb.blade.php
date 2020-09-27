@extends('portal.layout.app')

@section('content')
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
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

    <section class="space-pb">
        <div class="container">
            <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                <div class="col-lg-6">
                    <h2 class="mb-3 mb-lg-0">Gambar Semasa Bertugas</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- owl carousel -->
                    <div class="owl-carousel text-left" data-nav-dots="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xx-items="1">
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">The Sports Space</a>
                                    <a class="case-study-services" href="#">Sports</a>
                                    <p class="mt-2">From its founding in 1990 in Cambridge in the UK, it has grown to become a …</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Educatgenix</a>
                                    <a class="case-study-services" href="#">Education</a>
                                    <p class="mt-2">We all carry a lot of baggage, thanks to our upbringing...</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Financeoont</a>
                                    <a class="case-study-services" href="#">Finance</a>
                                    <p class="mt-2">It is truly amazing the damage that we, as parents, can inflict on our children...</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Healthque</a>
                                    <a class="case-study-services" href="#">Health</a>
                                    <p class="mt-2">Get the oars in the water and start rowing. Execution is the single biggest...</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Travelomatic</a>
                                    <a class="case-study-services" href="#">Traveling</a>
                                    <p class="mt-2">Success is something of which we all want more.</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Mobifluent</a>
                                    <a class="case-study-services" href="#">Mobile</a>
                                    <p class="mt-2">Most people believe that success is difficult.</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Dentzoid</a>
                                    <a class="case-study-services" href="#">Dental</a>
                                    <p class="mt-2">Commitment – understanding the price and having the willingness to pay that price</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Gozzby</a>
                                    <a class="case-study-services" href="#">Music</a>
                                    <p class="mt-2">If success is a process with a number of defined steps, then it is just like any other process.</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Foodocity</a>
                                    <a class="case-study-services" href="#">Food</a>
                                    <p class="mt-2">Without clarity, you send a very garbled message out to the Universe.</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="case-study case-study-style-02">
                                <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/asrama/3.jpg') }}');">
                                </div>
                                <div class="case-study-info">
                                    <a class="case-study-title font-weight-bold" href="#">Petfluent</a>
                                    <a class="case-study-services" href="#">Pet Care</a>
                                    <p class="mt-2">You will drift aimlessly until you arrive back at the original dock</p>
                                    <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
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
