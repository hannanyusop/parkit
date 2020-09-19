@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="row">
{{--            <div class="col-md-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body ">--}}

{{--                        <div class="row">--}}
{{--                            <h5 class="mb-2">Quick Links</h5>--}}
{{--                            <hr><br>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            @can('cv_guard')--}}
{{--                                <div class="card-body p-0">--}}
{{--                                    <ul class="users-list clearfix">--}}
{{--                                        @if($active_ca_events->count() > 0)--}}
{{--                                            @foreach($active_ca_events as $event)--}}
{{--                                                <li class="bg-white ml-2">--}}
{{--                                                    <i class="fa fa-qrcode"></i>--}}
{{--                                                    <a class="users-list-name" href="{{ route('frontend.user.cv.event.landing', $event->id) }}">{{ $event->name }}</a>--}}
{{--                                                    <span class="users-list-date">{{ reformatDatetime($event->created_at, "d-M") }}</span>--}}
{{--                                                </li>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                </div>--}}


{{--                            @endcan--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <h5 class="mb-2">Module Sistem</h5>
                            <hr><br><br>
                        </div>

                        <div class="row">
                            @can('poll_can')
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a  href="{{ route('frontend.user.vote.index') }}" class="small-box bg-info">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-vote-yea"></i> </h3>

                                            <p>Coop Voting System</p>
                                        </div>
                                    </a>
                                </div>
                            @endcan

                            @can('cv_can')
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.cv.event.checkin-scan') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-qrcode"></i> </h3>

                                            <p>Covid-19 Check-in</p>
                                        </div>
                                    </a>
                                </div>
                            @endcan
                            @can('lib_can')
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.library.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-book-reader"></i> </h3>

                                            <p>My-Library</p>
                                        </div>
                                    </a>
                                </div>
                            @endcan

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.student.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-user-friends"></i> </h3>

                                            <p>Data Pelajar</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.kehadiran.ct.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-clipboard-list"></i> </h3>

                                            <p>E-Kehadiran</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.kehadiran.ct.scan') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-barcode"></i> </h3>

                                            <p>E-Kehadiran</p>
                                        </div>
                                    </a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
