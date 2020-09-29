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
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center pb-4 pb-md-5">
                <div class="col-lg-12">
                    <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                        <div class="mr-3">
                            <h2 class="mb-3 mb-lg-0">Prosidur Oprasi Standard(SOP) Yang Ditetapkan</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Menggunakan pakaian yang lengkap dan kemas sepanjang waktu bertugas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>
                                Memastikan semua peralatan dalam keadaan yang baik.
                            </p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Memastikan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6  mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('img/portal/asrama/pkk/2.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <p>Memastikan semua petugas mematuhi masa</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-ptb bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="text-white">Award Winning Digital Agency</h2>
                        <p class="text-white">We take pride in helping our clients deliver marvelous results when it comes to their projects. From data to performance, we’ve got you covered.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <ul class="list list-unstyled">
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>The sad thing is the majority of people have no clue about what they truly want. They have no clarity. When asked the question</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>If success is a process with a number of defined steps,</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Without clarity, you send a very garbled message out to the Universe.</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>This is perhaps the single biggest obstacle that all of us must overcome in order to be successful.</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Once you have a clear understanding of what you want,</span></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list list-unstyled mt-3 mt-lg-0">
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Commitment is something that comes from understanding that everything has its price.</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>you may want to reconsider doing it at that time.</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>What steps are required to get you to the goals? Make the plan as detailed as possible.</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>The best way is to develop and follow a plan. Start with your goals in mind and then work backwards to develop the plan.</span></li>
                        <li class="d-flex text-white"><i class="fas fa-check fa-2x pr-3 pt-1 text-white"></i><span>Before starting any new activity,</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    About -->


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
