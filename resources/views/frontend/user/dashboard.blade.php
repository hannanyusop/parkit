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
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <h5 class="m-2 text-center">Submodul Sistem</h5>
                            </div>
                        </div>

                        <div class="row">
                            @can('poll_can')
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a  href="{{ route('frontend.user.vote.index') }}" class="small-box bg-info">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-vote-yea"></i> </h3>

                                            <p>Modul Undian Parking</p>
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

                                            <p>Modul Pengawasan CV-19</p>
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

                                            <p>Modul Pengurusan Perpustakaan</p>
                                        </div>
                                    </a>
                                </div>
                            @endcan

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.student.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-database"></i> </h3>

                                            <p>Pangkalan Data Pelajar</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.kehadiran.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-chalkboard-teacher"></i> </h3>

                                            <p>Modul Rekod Kehadiran</p>
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
