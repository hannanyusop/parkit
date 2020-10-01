@extends('portal.layout.app')

@section('content')
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/asrama/pkk/5.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">PERKHIDMATAN KONTRAK</h1>
                        <p class="text-white mb-0">Perkidmatan Pengawal Kontrak (PPK)</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.kontrak')
    </section>

    <!--=================================
   About -->
{{--    <section class="space-ptb bg-info">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="section-title text-center">--}}
{{--                        <h2 class="text-white">Award Winning Digital Agency</h2>--}}
{{--                        <p class="text-white">We take pride in helping our clients deliver marvelous results when it comes to their projects. From data to performance, we’ve got you covered.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <ul class="list list-unstyled">--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>The sad thing is the majority of people have no clue about what they truly want. They have no clarity. When asked the question</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>If success is a process with a number of defined steps,</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Without clarity, you send a very garbled message out to the Universe.</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>This is perhaps the single biggest obstacle that all of us must overcome in order to be successful.</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Once you have a clear understanding of what you want,</span></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <ul class="list list-unstyled mt-3 mt-lg-0">--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Commitment is something that comes from understanding that everything has its price.</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>you may want to reconsider doing it at that time.</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>What steps are required to get you to the goals? Make the plan as detailed as possible.</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>The best way is to develop and follow a plan. Start with your goals in mind and then work backwards to develop the plan.</span></li>--}}
{{--                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Before starting any new activity,</span></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--=================================
    About -->

    <section class="space-ptb bg-light position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title is-sticky" style="top: 80px;">
                        <h2>Penekanan Pemahaman
                            Dokumen Kontrak & Borang
                            Pengesahan Pelaksanann Kerja</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-info feature-info-style-01">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">SIJIL TAPISAN KESELAMATAN</h5>
                                    <p class="mb-0">
                                        Kontraktor wajib mengemukakan salinan Sijil Lulus Tapisan
                                        Keselamatan dari KDN bagi setiap pengawal yang dibekalkan
                                        kepada pihak pentadbir sekolah dalam tempoh tiga puluh (30) hari
                                        sebelum tarikh kontrak berkuatkuasa<br><br>
                                        Sekiranya Kontraktor masih dalam proses mendapatkan Sijil Lulus
                                        Tapisan Keselamatan dari KDN, Kontraktor wajib mengemukakan
                                        bukti atau dokumen permohonan proses tapisan keselamatan
                                        masih di dalam tindakan KDN.<br><br>
                                        Bukti atau dokumen yang dikemukakan ini hanya boleh diguna
                                        pakai tidak lebih daripada tempoh enam puluh (60) hari dari tarikh
                                        berkuatkuasa perjanjian ini atau tarikh pengawal mula berkhidmat,
                                        mengikut mana yang terkemudian.

                                    </p>
                                </div>
                            </div>
                            <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">UMUR PENGAWAL</h5>
                                    <p class="mb-0">
                                        Pengawal warganegara Malaysia yang berumur tidak kurang 18 tahun
                                        dan tidak melebihi 60 tahun sepanjang Tempoh Perjanjian.<br><br>

                                        Kontraktor hendaklah mengemukakan laporan pemeriksaan kesihatan
                                        yang dijalankan SETIAP TAHUN bagi pekerja yang berumur di antara 55
                                        tahun sehingga 60 tahun mengesahkan bahawa pekerja-pekerja ini
                                        disahkan sihat untuk bekerja (fit for duty) dan tidak menghidap
                                        penyakit berjangkit berbahaya oleh pihak hospital atau klinik Kerajaan.<br><br>

                                        Laporan hendaklah ditandatangani/ disahkan oleh sekurang-kurangnya
                                        Pegawai Perubatan KERAJAAN Gred 41 dan dikemukakan kepada
                                        untuk kelulusan. Kelulusan untuk bekerja diberikan secara tahunan
                                        oleh pihak SEKOLAH tertakluk kepada pemeriksaan kesihatan yang
                                        dijalankan secara berkala pada setiap tahun.<br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">UNIFORM SERAGAM</h5>
                                    <p class="mb-0">
                                        Semua pengawal yang ditugaskan hendaklah berpakaian
                                        seragam lengkap seperti di Lampiran 2.<br><br>

                                        Kemas berpakaian di samping menjaga tingkahlaku yang
                                        baik. Setiap pengawal menghormati pengetua, guru besar,
                                        guru dan penjawat awam yang diberi kuasa di Premis dan
                                        mematuhi arahan semasa yang ditetapkan oleh pentadbir
                                        Premis.<br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">“Close Circuit Television” (CCTV)</h5>
                                    <p class="mb-0">
                                        Pihak Kontraktor wajib memasang ”Close Circuit
                                        Television” (CCTV) bagi sekolah-sekolah/institusi
                                        pendidikan seperti di Jadual Harga, Lampiran E dan
                                        Lampiran 1 bagi membantu pihak Kerajaan,
                                        memantau terhadap premis dan merekod segala
                                        bentuk pencerobohan jika terdapat keperluan.<br><br>

                                        Pemasangan sistem pengawasan ini hendaklah
                                        disokong oleh “Central Monitoring System” (CMS)
                                        yang membolehkan pihak Kontraktor mengawasi dari
                                        jauh (remote monitoring) dan menghantar pasukan
                                        bertindak (response team) dengan serta merta.<br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">PERAKAM WAKTU (WATCHMAN CLOCK)</h5>
                                    <p class="mb-0">
                                        Kontraktor wajib memasang Analog Watchman
                                        Clock di lokasi-lokasi yang dipersetujui oleh
                                        pihak pentadbir sekolah/Institusi Pendidikan.<br><br>

                                        Segala kos pemasangan dan penyelenggaraan
                                        peralatan pengawasan tersebut akan
                                        ditanggung oleh pihak Kontraktor.
                                    </p>
                                </div>
                            </div>
                            <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">PEMATUHAN TUGAS</h5>
                                    <p class="mb-0">
                                        Pengawal hendaklah berdisiplin dan mematuhi
                                        peraturan-peraturan yang sedang berkuatkuasa yang
                                        ditetapkan oleh pihak Kerajaan dari semasa ke semasa.
                                        <br><br>

                                        Semua pengawal hendaklah memakai pakaian seragam
                                        yang disediakan dengan sempurna dan mempunyai
                                        kad/pas pengenalan diri yang dibekalkan oleh Kontraktor;
                                        <br><br>

                                        Kontraktor hendaklah memastikan rekod kedatangan dan
                                        jadual bertugas dikemaskini pada setiap hari;
                                    </p>
                                </div>
                            </div>

                            <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                                <div class="feature-info-content">
                                    <h5 class="mb-3 feature-info-title">KEROSAKKAN</h5>
                                    <p class="mb-0">
                                        Kontraktor adalah dikehendaki membaiki atau
                                        mengganti apa-apa kerosakan yang berlaku
                                        kepada harta benda premis akibat daripada
                                        kelalaian/ kecuaian pihak Pengawal
                                        Kontraktor semasa mengendalikan
                                        perkhidmatan berkenaan;
                                        <br><br>
                                    </p>
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
                    <h3 class="mb-3 mt-3 mb-lg-0 text-center">Senarai Dokumen PPK</h3>
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
