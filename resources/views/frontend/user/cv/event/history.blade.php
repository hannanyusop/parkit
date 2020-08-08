@extends('frontend.user.layouts.app')

@section('title', 'Checkin History')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">


                        @foreach($logs as $key => $log)
                            <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-navy">{{ reformatDatetime($log->created_at, "d M. Y") }}</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-temperature-low bg-green"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> {{ reformatDatetime($log->created_at, "H:i A") }}</span>
                                        <h3 class="timeline-header no-border">{{ $log->event->name }}
                                            <br><p class="text-success"> Temperature :  {{ $log->temperature }}  °C</p>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </section>
@endsection
