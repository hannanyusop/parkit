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

    <!--=================================
    About -->

    <section class="space-ptb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/1.png') }}" alt="">
                </div>
                <div class="col-lg-6">
                    <span class="text-uppercase text-mutedq"> </span>
                    <h3>PEMATUHAN SPESIFIKASI KERJA</h3>
                    <p>Setiap Pekerja Kotrak Perkhidmatan Kebersihan Dan Kawasan perlu:</p>
                    <ul class="list-unstyled list-number mb-0">
                        <li class="mb-2"><span>01</span> Memastikan bangunan seliaan masing-masing dalam keadaan kemas, selesa, bersih dan selamat.</li>

                        <li class="mb-2"><span>02</span> Pekerja membersih kawasan bangunan berdasarkan perturan yang ditetapkan dalam spesifikasi kontrak pembersih.</li>

                        <li class="mb-2"><span>03</span> Setiap pekerja diberi kawasan bangunan berdasarkan peraturan yang ditetapkan dalam spesifikasi kontrak pembersih.</li>

                        <li class="mb-2"><span>04</span> Pelbagai hiasan, landskap dan pembaikan dilakukan oleh pihak sekolah.</li>

                        <li class="mb-2"><span>05</span> Memastikan konsep tandas kering kepada pelajar selepas mereka menggunanakan tandas agar kebersihan
                        dan kekemasan tandas dapat dikekalkan malah keselamatan pelajar ditandas juga terjamin.</li>

                        <li class="mb-2"><span>06</span> Memberi krusus atau bengkel seperti nengkel membuat bahan hiasan menggunakan bahan terbuang
                        , bengkel pengurusan landskap kursus pengendalian bunga dan sebagainya meningkatkan kemahiran pekerja dalam menghias kawasan bangunan masing-masing.</li>

                        <li class="mb-2"><span>07</span> Pekerja mematuhi segala spesifikasi kerja mereka.</li>

                        <li class="mb-2"><span>08</span> Sekolah dengan pekerja pembersih kawasan berkerjasama untuk melahirkan perkembangan positif dan boleh
                        membuat landskap atas inisiatif dan inovasi pekerja itu sendiri.</li>

                        <li class="mb-2"><span>09</span> Memastikan semua pekerja membuat laporan tugas harian yang telah disediakan dan menghantar laporan tersebut setiap jumaat sebelah petang.</li>









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
