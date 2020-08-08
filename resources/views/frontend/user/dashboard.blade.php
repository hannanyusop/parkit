@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="card col-md-8 offset-md-2">
            <div class="card-body">

                <div class="row">
                    <h5 class="mb-2">System To Use (BETA)</h5>
                    <hr><br>
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

                                <p>Covid-19 Checkin</p>
                            </div>
                            <a href="{{ route('frontend.user.cv.event.history') }}" class="small-box-footer">Check History <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>

    </section>
@endsection
