@extends('frontend.user.layouts.app')

@section('title', 'View Event')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="mt-2 float-right">
                        <a href="{{ route('frontend.user.cv.event.edit', $event->id) }}" class="btn btn-info btn-sm m-1"><i class="fas fa-edit"></i> Edit Event</a>
                        <a href="{{ route('frontend.user.cv.event.regenerate', $event->id) }}" onclick="return confirm('Are you sure want to regenerate this token?')" class="btn btn-warning btn-sm m-1"><i class="fa fa-key mr-2"></i>Refresh Token</a>
                        <a href="{{ route('frontend.user.cv.event.landing', $event->id) }}" class="btn btn-success btn-sm m-1"><i class="fa fa-qrcode mr-2"></i>Show QR</a>
                        <a href="{{ route('frontend.user.cv.event.export', $event->id) }}" onclick="return confirm('Are you sure want to download excel file for this event?')" class="btn btn-dark btn-sm m-1"><i class="fa fa-file-excel mr-2"></i>Download List</a>
                    </div>

                    <h3>Event Details</h3><br>

                    <div class="ml-5">
                        <p>Event Name:<b class="ml-2">{{ $event->name }}</b> </p>
                        <p>Event Time:<b class="ml-2">{{ reformatDatetime($event->created_at, "h:i A") }}</b></p>
                        <p>Event Date:<b class="ml-2">{{ reformatDatetime($event->created_at, "d M Y") }}</b></p>
                        <p>Status: <b class="ml-2">{!! badgeEventStatus($event->status) !!}</b></p>
                        <p>
                            @if($event->status == 1)
                                <a href="{{ route('frontend.user.cv.event.deactivate', $event->id) }}" onclick="return confirm('Are you sure want to deactivate this event?')" class="btn btn-warning btn-sm"><i class="fas fa-pause mr-2"></i> Deactivate</a>
                            @elseif($event->status == 2)
                                <a href="{{ route('frontend.user.cv.event.activate', $event->id) }}" onclick="return confirm('Are you sure want to activate this evenet?')" class="btn btn-success btn-sm"><i class="fas fa-play mr-2"></i> Activate</a>
                            @endif
                        </p>
                        <p>Total Checked-in :<small class="text-info"><i class="fa fa-user ml-1"></i> {{ $event->users->count() }} </small></p>

                    </div>
                    <hr>
                    <h3 class="mt-5">Checked-in List</h3><br>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Name</th>
                                <td>NRIC / Unique ID</td>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Temperature</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($event->users as $key => $log)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->user->unique_id }}</td>
                                    <td>{{ reformatDatetime($log->created_at, "H:i A") }}</td>
                                    <td>{{ reformatDatetime($log->created_at, "d M Y") }}</td>
                                    <td>{{ $log->temperature }}  °C</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
