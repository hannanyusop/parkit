@extends('portal.layout.app')

@section('content')
    <style type="text/css">

        .title {
            font-family: inherit;
            font-size: 2rem;
            font-weight: 600;
            line-height: inherit;
            color: #252b46;
        }
        .bg-none{
            background-color: #ffffff;
        }
        .paragraph {
            font-family: inherit;
            font-size: 1rem;
            font-weight: normal;
            line-height: inherit;
            color: #9194a1;
        }
        .tab {
            width: 100%;
            height: auto;
            padding: 8rem 0;
            margin: 25px;
        }
        .tab-menu {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
            height: auto;
            margin: 0 auto;
            border-bottom: 1.3px solid #dbdbdb;
            transition: all 0.3s ease;
        }
        .tab-menu-link {
            position: relative;
            overflow: hidden;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 200;
            line-height: inherit;
            cursor: pointer;
            width: calc(100% / 4);
            height: auto;
            padding: 1rem 0;
            border-bottom: 2.5px solid transparent;
            color: #9194a1;
            background: #fff;
            border-top: none;
            border-left: none;
            border-right: none;
            transition: all 0.3s ease;
        }
        .tab-menu-link::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            z-index: 2;
        }
        .tab-menu-link.active {
            bottom: 0px;
            z-index: 0;
            overflow: hidden;
            border-bottom: 2.5px solid #fa5757;
            border-top: none;
            color: #252b46;
            background: #fff;
        }
        .tab-bar {
            padding: 0.5rem 0;
            overflow: hidden;
            background: #fff;
        }
        .tab-bar-content {
            display: none;
            width: 100%;
            min-height: 10rem;
            margin: 5px;
            transition: all 0.3s ease;
        }
        .tab-bar-content.active {
            display: block;
        }

    </style>
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

    <section class="mt--3">
        <div class="container">
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
                                            Tiada Pengunguman Buat Masa Kini
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
