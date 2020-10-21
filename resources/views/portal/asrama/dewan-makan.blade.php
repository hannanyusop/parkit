@extends('portal.layout.app')

@section('content')
    <!--=================================
    header -->

    <!--=================================
    Header Inner -->
    <section class="header-inner header-inner-menu bg-overlay-black-50" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white font-weight-normal">KEMUDAHAN</h1>
                        <p class="text-white mb-0">DEWAN MAKAN</p>
                    </div>
                </div>
            </div>
        </div>
        @include('portal.include.kemudahan')
    </section>

    <section class="space-pb mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 order-lg-1 order-1">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/dewan makan/1.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 order-lg-2 order-3">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/dewan makan/2.jpg') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/dewan makan/3.jpg') }}');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3 order-2">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/dewan makan/5.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/dewan makan/6.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study ">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/dewan makan/7.jpg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg bg-holder" style="background-image: url('{{ asset('img/portal/dewan makan/8.jpg') }}');">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-0 mt-md-4">
                    <a href="{{ route('frontend.portal.asrama.bmb') }}" class="btn btn-primary-round btn-round mx-3">Seterusnya<i class="fas fa-arrow-right pl-3"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>Keadaan Dewan Makan</h2>
                        <p>Pihak pengurusan asrama komited untuk memastikan keadaan persekitran dewan makan dalam keadaan bersih dan ceria</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs nav-tabs-02 justify-content-center" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="false">2018 </a>
                            <a class="nav-item nav-link active" id="nav-tow-tab" data-toggle="tab" href="#nav-tow" role="tab" aria-controls="nav-tow" aria-selected="true">2019</a>
                        </div>
                    </nav>
                    <div class="tab-content mt-5" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <img class="img-fluid" src="images/about/06.jpg" alt="">
                                </div>
                                <div class="col-lg-5 col-md-7 mt-4 mt-md-0">
                                    <h4 class="text-dark">Explore our wide Range of E-commerce Solutions</h4>
                                    <ul class="list-unstyled list-number">
                                        <li class="mb-2"><span>01</span>Hassle-free setup &amp; administration</li>
                                        <li class="mb-2"><span>02</span>Customizable as required</li>
                                        <li class="mb-2"><span>03</span>Lifetime free update</li>
                                        <li class="mb-2"><span>04</span>Robust admin &amp; reporting features</li>
                                        <li class="mb-2"><span>05</span>Six months FREE support for bugs</li>
                                    </ul>
                                    <h6>Package start from <b class="text-primary font-xll">$600</b></h6>
                                </div>
                                <div class="col-lg-3 col-md-12 text-center mt-4 mt-lg-0">
                                    <div class="bg-light h-100 p-4">
                                        <div class="badge-round mt-2">
                                            <h4 class="text-white"><span class="d-block font-xlll">30+</span> Million</h4>
                                        </div>
                                        <p class="mt-3">Revenue generated by our partner and clients since 2005</p>
                                        <a class="btn btn-link mt-3" href="#">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="nav-tow" role="tabpanel" aria-labelledby="nav-tow-tab">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-4 text-dark">Why company needs a digital strategy?</h4>
                                    <p class="mb-4">Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse when things don’t go their way!</p>
                                    <blockquote class="blockquote">
                                        For those of you who are serious about having more, doing more, giving more and being more, success is achievable with some understanding of what to do.
                                        <cite class="d-block mt-3"> - InVisionApp Inc</cite>
                                    </blockquote>
                                    <a class="btn btn-light btn-sm mt-3" href="#">View Invition Case Stduy</a>
                                </div>
                                <div class="col-md-6 mt-4 mt-md-0">
                                    <iframe height="305" src="https://www.youtube.com/embed/AqcjdkPMPJA" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
