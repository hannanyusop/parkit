@extends('portal.layout.app')

@section('content')
    <!--=================================
    header -->

    <!--=================================
    Header Inner -->
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">KEMUDAHAN</h1>
                        <p class="text-white mb-0">DEWAN MAKAN</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.kemudahan')
    </section>

    <section class="space-pb mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 order-lg-1 order-1">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/dewan makan/1.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 order-lg-2 order-3">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/dewan makan/2.jpg') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/dewan makan/3.jpg') }}');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3 order-2">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/dewan makan/6.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study ">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/dewan makan/7.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/dewan makan/8.jpg') }}');">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-0 mt-md-4">
                    <a href="#" class="btn btn-primary-round btn-round mx-3">Load More<i class="fas fa-arrow-right pl-3"></i></a>
                </div>
            </div>
        </div>
    </section>

@endsection
