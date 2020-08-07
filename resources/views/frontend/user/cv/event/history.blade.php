@extends('frontend.user.layouts.app')

@section('title', 'History')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">History</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Temperature</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $key => $log)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $log->event->name }}</td>
                                <td>{{ reformatDatetime($log->created_at, "H:i A") }}</td>
                                <td>{{ reformatDatetime($log->created_at, "d M Y") }}</td>
                                <td>{{ $log->temperature }}  °C</td>
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
