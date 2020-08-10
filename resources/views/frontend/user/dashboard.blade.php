@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <h5 class="mb-2">System To Use (BETA)</h5>
                            <hr><br><br>
                        </div>

                        <div class="row">
                            @can('poll_can')
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-vote-yea"></i> </h3>

                                            <p>Parking Vote System</p>
                                        </div>
                                        <a href="{{ route('frontend.user.vote.index') }}" class="small-box-footer">Vote Now <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endcan

                            @can('cv_can')
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-qrcode"></i> </h3>

                                            <p>Covid-19 Check-in</p>
                                        </div>
                                        <a href="{{ route('frontend.user.cv.event.history') }}" class="small-box-footer">Check History <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endcan

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-book-reader"></i> </h3>

                                            <p>My-Library</p>
                                        </div>
                                        <a href="{{ route('frontend.user.library.index') }}" class="small-box-footer">Dashboard <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-fuchsia">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-clipboard-list"></i> </h3>

                                            <p>E-Kehadiran</p>
                                        </div>
                                        <a href="{{ route('frontend.user.kehadiran.index') }}" class="small-box-footer">Test Tag Student <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <h5 class="mb-2">Quick Links</h5>
                            <hr><br>
                        </div>

                        <div class="row">

                            @can('cv_guard')

                                @if($active_ca_events->count() > 0)
                                    <div class="card-body">
                                        <p>Check-in QR Link</p>
                                        <ol>
                                            @foreach($active_ca_events as $event)
                                                <li><a href="{{ route('frontend.user.cv.event.landing', $event->id) }}">{{ $event->name }}-{{ reformatDatetime($event->created_at, "d M Y") }}</a> </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
