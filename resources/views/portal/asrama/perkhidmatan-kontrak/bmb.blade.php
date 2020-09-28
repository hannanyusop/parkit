@extends('portal.layout.app')

@section('content')
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">PERKHIDMATAN KONTRAK</h1>
                        <p class="text-white mb-0">Bantuan Makanan Bermasak (BMB)</p>
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
                    <div class="row d-lg-flex align-items-center justify-content-center">
                        <div class="mr-3">
                            <h4 class="mb-3 mb-lg-0">Gerak Kerja Semasa Penyediaan Makanan</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/bmb/1.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Menggunakan pakaian yang lengkap dan sesuai semasa menyediakan makanan</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/bmb/8.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Menggunakan peralatan yang sesuai semasa penyediaan makanan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/bmb/3.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Memastikan persekitran dalam keadaan bersih sepanjang proses penyediaan makanan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/bmb/7.jpg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Memastikan peralatan disusun dengan kemas bagi memudahkan proses penyediaan makanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    About -->

    @php

    $rules = [
    1 => ' Suiz peralatan elektrik hendaklah ditutup selepas digunakan',
    2 => ' Pastikan tida sampah diatas meja dan lantai',
    3 => 'Pastikan semua peralatan dalam,perhiasan, persekitaran berada dalam keadaan tersusun, bersih dan kemas',
    4 => 'Semua perlatan yang telah digunakan hendaklah disusun semula ditempat yang asal selepas digunakan',
    5 => 'Sebarang kerosakan perlu dipaporkan kepada pegawai yang bertanggungjawab',
    6 => 'Sebarang kemasukan atau pengeluaran perabot/ barang dari luar dan dalam dewan hendaklah dimaklumkan kepada pegawai yang bertanggungjawab',
    7 => 'Kebersihan dan keselamatan dewan makan hendaklah sentiansa dijaga'
];

    @endphp

    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="section-title text-center">
                        <h4>Panduan Penggunaan Dan Langkah-langkah Keselamatan Dewan Makan</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($rules as $rule)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-info feature-info-style-02" style="min-height: 200px">
                            <div class="feature-info-content">
                                <h6 class="mb-0">
                                    {{ $rule }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="space-pb">
        <div class="container">
            <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                <div class="col-lg-6">
                    <h4 class="mb-3 mb-lg-0 text-center">Senarai Contoh Dokumen Pengurusan</h4>
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
