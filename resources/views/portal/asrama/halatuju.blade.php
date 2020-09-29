@extends('portal.layout.app')

@section('content')
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/asrama/6.JPG') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">HALA TUJU</h1>
                        <p class="text-white mb-0">VISI MISI</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.halatuju')
    </section>
    <section class="space-pt mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>VISI</h2>
                        <p>ASRAMA SMK AGAMA LIMBANG SEBAGAI KEDIAMAN SELAMAT, KONDISIF DAN CEMERLANG</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>MISI</h2>
                        <section class="space-ptb">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="owl-carousel testimonial" data-nav-arrow="true" data-nav-dots="false" data-items="1" data-lg-items="1" data-md-items="1" data-sm-items="1" data-space="0" data-autoheight="true">
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>
                                                            MEMPERKASA WARGA ASRAMA YANG TAAT PADA PERINTAH AGAMA SERTA SIHAT MENTAL DAN FIZIKAL
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>
                                                            MENJADIKAN ASRAMA KAWAN YANG SELAMAT,CERIA DAN KONDUSIF
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>
                                                            MEMBINA KEPERIHATINAN WARGA ASRAMA TERHADAP TANGGUNGJAWAB MENUNTUT DAN BERBUDAYA ILMU
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>
                                                            MELATIH WARGA ASRAM BERDISIPLIN DAN WUJUD MARHABBAH ANTARA WARGANYA
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>
                                                            MELONJAK NILAI TANGGUNGJAWAB WARGA ASRAMA TERHADAP SEKOLAH, ASRAMA, RAKAN, GURU DAN SEKOLAH
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @php
                    $objectives = [
    1 => "MEMASTIKAN TEMPAT TINGGAL DAN IKLIM ASRAMA SENTIASA DALAM KEADAAN KOMDUSIF",
    2 => "MEMBINA DAN MENYUBURKAN KETERPERIHATINAN SAHSIAH KEPIMPINAN PELAJAR ASARAM",
    3 => "MENJAGA KEBAJIKAN PENGHUNI ASRAMA",
    4 => "MEMASTIKAN PERATURAN ASRAMA DIPATUHI",
    5 => "MEMASTIKAN KESELAMATAN BANGUNAN DAN PENGHUNI ASRAMA",
    6 => "MEMBANTU MELICINKAN PENGURUSAN DAN PENTADBIRAN ASRAMA",
    7 => "MEMASTIKAN PRESTASI AKEDEMIK PENGHUNI ASRAMA MENCAPAI MATLAMAT SMKA"
];
                @endphp
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>OBJEKTIF JAWATAN KUASA ASRAMA</h2>
                        <section class="space-ptb">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="owl-carousel testimonial" data-nav-arrow="true" data-nav-dots="false" data-items="1" data-lg-items="1" data-md-items="1" data-sm-items="1" data-space="0" data-autoheight="true">
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>
                                                            MEMPERKASA WARGA ASRAMA YANG TAAT PADA PERINTAH AGAMA SERTA SIHAT MENTAL DAN FIZIKAL
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($objectives as $objective)
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>{{ $objective }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
