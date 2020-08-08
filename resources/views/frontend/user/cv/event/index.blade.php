@extends('frontend.user.layouts.app')

@section('title', 'My Campaign List')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Event List</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Event Name</th>
                            <th>Datetime</th>
                            <th>Status</th>
                            <th>Total User</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $key => $event)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $event->name }}<br></td>
                                <td class="text-center">{{ $event->created_at }}</td>
                                <td class="text-center">{!! badgeEventStatus($event->status) !!}</td>
                                <td class="text-center"><small class="text-info"><i class="fa fa-user"></i> {{ $event->users->count() }} </small></td>
                                <td>
                                    <a href="{{ route('frontend.user.cv.event.view', $event->id) }}" class="btn btn-dark btn-xs">View </a>
                                    @if($event->status == 1)
                                        <a href="{{ route('frontend.user.cv.event.landing', $event->id) }}" class="btn btn-success btn-xs"><i class="fa fa-qrcode mr-2"></i>Show QR</a>
                                        <a href="{{ route('frontend.user.cv.event.deactivate', $event->id) }}" onclick="return confirm('Are you sure want to deactivate this event?')" class="btn btn-danger btn-xs">Deactivate </a>
                                    @else
                                        <a href="{{ route('frontend.user.cv.event.activate', $event->id) }}" onclick="return confirm('Are you sure want to activate this event?')" class="btn btn-success btn-xs">Activate </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
