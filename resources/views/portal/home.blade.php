@extends('portal.layout.app')

@section('content')
    <section class="banner">
        <div class="swiper-container">
            <div class="swiper-wrapper h-700 h-sm-500">
                <div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30" style="background-image:url({{ asset('img/portal/sekolah/7.jpg') }}); background-size: cover; background-position: center center;">
                    <div class="swipeinner container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-md-10 text-center">
                                <h4 class="text-white" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s">SEKOLAH MENENGAH AGAMA LIMBANG</h4>
                                <h6 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.5s">Beriman, Berilmu, Beramal</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30" style="background-image:url({{ asset('img/portal/sekolah/6.jpg') }}); background-size: cover; background-position: center center;">
                    <div class="swipeinner container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-md-11 text-center">
                                <h4 class="text-white" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s">SEKOLAH MENENGAH AGAMA LIMBANG</h4>
                                <h6 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.5s">Mukhlisun Mencipta Kecemerlangan</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"><i class="fas fa-arrow-left icon-btn"></i></div>
            <div class="swiper-button-next"><i class="fas fa-arrow-right icon-btn"></i></div>
        </div>
    </section>

    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4 pb-md-5">
                <div class="col-lg-10">
                    <div class="d-md-flex align-items-center">
                        <div class="mr-3">
                            <h2 class="mb-0"></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex h-100">
                        <div class="nav flex-column nav-pills w-100 align-self-lg-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="mission-and-vision-tab" data-toggle="pill" href="#mission-and-vision" role="tab" aria-controls="mission-and-vision" aria-selected="true"><span class="data-hover" data-title="Sebut Harga/Tender">Sebut Harga/Tender</span></a>
                            <a class="nav-link active" id="our-challenges-tab" data-toggle="pill" href="#our-challenges" role="tab" aria-controls="our-challenges" aria-selected="false"><span class="data-hover" data-title="Bakal Pelajar">Bakal Pelajar</span></a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#technology-partners" role="tab" aria-controls="technology-partners" aria-selected="false"><span class="data-hover" data-title="Pelajar">Pelajar</span></a>
                            <a class="nav-link" id="meet-the-our-team-tab" data-toggle="pill" href="#meet-the-our-team" role="tab" aria-controls="meet-the-our-team" aria-selected="false"><span class="data-hover" data-title="Staff Tetap / Kontrak">Staff Tetap / Kontrak</span></a>
                            <a class="nav-link" id="careers-with-us-tab" data-toggle="pill" href="#careers-with-us" role="tab" aria-controls="careers-with-us" aria-selected="false"><span class="data-hover" data-title="Muat Trun Borang">Muat Trun Borang</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mt-3 mt-md-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="mission-and-vision" role="tabpanel" aria-labelledby="mission-and-vision-tab">
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane  fade show active" id="our-challenges" role="tabpanel" aria-labelledby="our-challenges-tab">
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane fade" id="technology-partners" role="tabpanel">
                            <div class="row">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="meet-the-our-team" role="tabpanel" aria-labelledby="meet-the-our-team-tab">
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane fade" id="careers-with-us" role="tabpanel" aria-labelledby="careers-with-us-tab">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
