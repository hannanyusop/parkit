@extends('portal.layout.app')

@section('content')
    <br><br>
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>Carta Organisasi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($staffs as $staff)
                    <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                        <div class="team">
                            <div class="team-bg"></div>
                            <div class="team-img">
                                <img class="img-fluid" src="{{ asset($staff->image) }}" alt="">
                            </div>
                            <div class="team-info">
                                <a href="#" class="team-name">{{ $staff->name }}</a>
                                <p>{{ $staff->position }}</p>
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="space-pb mt-5">
        <div class="container">
            <div class="row justify-content-center pb-4 pb-md-5">
                <div class="col-lg-12">
                    <div class="d-lg-flex align-items-center">
                        <div class="mr-4">
                            <p class="mb-0">Tahun</p>
                            <h3 class="display-3 font-weight-bold text-primary mb-0">2020</h3>
                        </div>
                        <div class="mr-3">
                            <h2 class="mb-3 mb-lg-0">Barisan Pentadbiran Sekolah</h2>
                        </div>
                        <div class="ml-auto">
                            <a href="{{ route('frontend.portal.smkal.pengetua') }}" class="btn btn-light-round btn-round w-space">Perutusan Pengetua<i class="fas fa-arrow-right pl-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 order-lg-1 order-1">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/pengurusan/1.jpeg') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 order-lg-2 order-3">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/pengurusan/2.jpeg') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="case-study">
                                <div class="case-study-img" style="background-image: url('{{ asset('img/portal/pengurusan/3.jpeg') }}');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-lg-3 order-2">
                    <div class="case-study">
                        <div class="case-study-img case-study-lg" style="background-image: url('{{ asset('img/portal/pengurusan/4.jpeg') }}');">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
