@extends('portal.layout.app')

@section('content')

    <section class="header-inner" style="background-image: url('{{ asset('img/portal/sekolah/2.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal mb-0">Pengenalan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="blog-detail">
                        <div class="blog-post mb-4 mb-md-5">
                            <div class="blog-post-content">
                                <h5 class="blog-post-title">Sejarah Penubuhan</h5>
                                <div class="blog-post-details">
                                    <p class="mb-4">
                                        {!! $pengenalan->text !!}
                                    </p>

                                    <div class="blog-post-image">
                                        <img class="img-fluid" src="{{ asset('img/portal/sekolah/7.jpg') }}" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="blog-post mb-4 mb-md-5">
                            <div class="blog-post-content">
                                <h5 class="blog-post-title">Pencapaian Sekolah</h5>
                                <div class="blog-post-details">
                                    <p class="mb-md-5 mb-4">
                                        {!! $pencapaianSekolah->text !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post mb-4 mb-md-5">
                            <div class="blog-post-image position-relative">
                                <img class="img-fluid" src="{{ asset('img/portal/sekolah/tumbnail-lagu.PNG') }}" alt="">
                                <a class="icon-btn icon-btn-lg icon-btn-all-center btn-animation popup-youtube" href="https://www.youtube.com/watch?v=sY6sERCV7Vg"><i class="fas fa-play fa-1x"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="blog-post mb-4 mb-md-5">
                            <div class="blog-post-content">
                                <h5 class="blog-post-title">Kurikulum(Akedemik)</h5>
                                <div class="blog-post-details">
                                    <p class="mb-md-5 mb-4">
                                        {!! $kurikulumAkedemik->text !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post mb-md-5">
                            <div class="blog-post-content">
                                <h5 class="blog-post-title">Kokurikulum</h5>
                                <div class="blog-post-details">
                                    <p class="mb-md-5 mb-4">
                                        {!! $kokurikulum->text !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pb dark-background">
        <div class="container">
            <div class="bg-dark text-center rounded py-5 px-3">
                <h2 class="text-white">Kepimpinan sekolah yang cemerlang </h2>
                <h6 class="text-white font-italic">
                    "keberkesanan kepimpinan sekolah dijayakan oleh pemimpin yang beriman, berilmu dan bertaqwa  serta didokong oleh kolaborasi dan
                    kerjasama strategik semua pihak yang berkepentingan untuk mencapai visi yang dipersetujui bersama."
                </h6>
            </div>
        </div>
    </section>
@endsection
