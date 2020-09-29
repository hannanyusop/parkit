@extends('portal.layout.app')

@section('content')
    <section class="banner">
        <div class="swiper-container">
            <div class="swiper-wrapper h-500 h-sm-300">
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
    <section class="mt-n5 z-index-9 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="our-clients our-clients-style-02 bg-dark">
                        <div class="client-title pl-4">
                            <h5 class="text-white">Sistem Atas Talian</h5>
                            <div class="svg-item">
                            </div>
                        </div>
                        <div class="brand-logo pl-4">
                            <div class="owl-carousel testimonial-center owl-nav-bottom-center owl-loaded owl-drag" data-nav-arrow="false" data-items="5" data-md-items="4" data-sm-items="4" data-xs-items="3" data-xx-items="2" data-space="40" data-autoheight="true">
                                <div class="owl-stage-outer owl-height" style="height: 34px;">
                                    <div class="owl-stage" style="transform: translate3d(-1180px, 0px, 0px); transition: all 1s ease 0s; width: 1770px;">
                                        <div class="owl-item cloned" style="width: 78px; margin-right: 40px;">
                                            <div class="item">
                                                <img class="img-fluid center-block mx-auto" src="{{ asset('portal/heimages/client-logo/light/04.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt--3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="section-title text-center">
                        <h2>Info Semasa</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab">
                    <div class="tab-menu">
                        @foreach(portalGetAnnouncementGroup() as $key => $group)
                        <button class="tab-menu-link {{ ($key == "pelajar")? "active" : "" }}" data-content="{{ $key }}">
                            <span data-title="tender">{{ $group }}</span>
                        </button>
                        @endforeach
                    </div>
                    <div class="tab-bar">
                        @foreach(portalGetAnnouncementGroup() as $key => $group)
                            <div class="tab-bar-content {{ ($key == "pelajar")? "active" : "" }}" id="{{ $key }}">
                                <div class="texts">
                                    <p class="paragraph">

                                        <?php $announcements = portalGetAnnouncementsByGroup($key); ?>
                                        @if($announcements->count() == 0)
                                            Tiada Pengumuman Buat Masa Kini
                                        @else
                                            <div class="col-lg-12">
                                                <div class="accordion" id="group-{{ $key }}">
                                                    @foreach($announcements as $announcement)

                                                        <div class="card">
                                                            <div class="accordion-icon card-header" id="heading-{{ $key }}">
                                                                <h4 class="mb-0">
                                                                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#{{ $key."-".$announcement->id }}" aria-expanded="false" aria-controls="{{ $key."-".$announcement->id }}">{{ $announcement->title }}</button>
                                                                </h4>
                                                            </div>
                                                            <div id="{{ $key."-".$announcement->id }}" class="collapse" aria-labelledby="heading-{{ $key }}" data-parent="#group-{{ $key }}" style="">
                                                                <div class="card-body">
                                                                    <p class="mb-0">{!! $announcement->text !!}</p><small> Tarikh :{{ reformatDatetime($announcement->date, 'd-m-Y') }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        // Tabs Action
        const tabLink = document.querySelectorAll(".tab-menu-link");
        const tabContent = document.querySelectorAll(".tab-bar-content");

        tabLink.forEach((el) => {
            el.addEventListener("click", activeTab);
        });

        function activeTab(el) {
            const btnTarget = el.currentTarget;
            const content = btnTarget.dataset.content;

            tabContent.forEach((el) => {
                el.classList.remove("active");
            });

            tabLink.forEach((el) => {
                el.classList.remove("active");
            });

            document.querySelector("#" + content).classList.add("active");
            btnTarget.classList.add("active");
        }

    </script>
@endsection
