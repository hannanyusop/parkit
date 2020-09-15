@extends('portal.layout.app')

@section('content')
    <br><br>
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>Direktori Pengurusan Asarama</h2>
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
@endsection
