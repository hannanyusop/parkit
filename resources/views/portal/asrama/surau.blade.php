@extends('portal.layout.app')

@section('content')
    <!--=================================
    header -->

    <!--=================================
    Header Inner -->
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/surau/1.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">KEMUDAHAN</h1>
                        <p class="text-white mb-0">SURAU</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.kemudahan')
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="section-title text-center">
                        <h2>Established 2010 in Hi-soft has been offering world-class information technology.</h2>
                        <p class="px-xl-5">Positive pleasure-oriented goals are much more powerful motivators than negative fear-based ones. Although each is successful separately, the right combination of both is the most powerful motivational force known to humankind.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 order-lg-1 order-1">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/surau/1.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 order-lg-2 order-3">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/surau/2.jpg') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/surau/3.jpg') }}');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3 order-2">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/surau/5.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/surau/6.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study ">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/surau/7.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/surau/8.jpg') }}');">
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
