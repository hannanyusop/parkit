@extends('frontend.user.layouts.app')

@section('title', 'Add Event')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <style type="text/css">
        #clock {
            font-family: 'Orbitron', sans-serif;
            color: #000000;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <!-- form start -->
                <div class="card-body">


                    <div class="text-center">
                        <h1>Check-in</h1>
                        <h2 id="clock"></h2>

                        <p>Staff Name : <b class="text-uppercase">{{ auth()->user()->name }}</b></p>
                        <p>NRIC / Unique Id : <b>{{ auth()->user()->unique_id }}</b></p>
                        <p>Event Name : <b>{{ $event->name }}</b></p>
                        <p>Check-in Time : <b>{{ reformatDatetime($cv_logs->updated_at, "h:i A") }}</b></p>
                        <p>Check-in Date : <b>{{ reformatDatetime($cv_logs->updated_at, "d M Y") }}</b></p>
                        <h3>Temperature</h3>

                            <div class="">
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <h1 class="font-weight-bold" id="temperatue">{{ $cv_logs->temperature }} °C</h1>

                                        <p>Condition:</p>
                                        <h4 id="condition"></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="">
                                <button id="checkin" class="btn btn-dark" onclick="window.close()">Close Page</button>
                            </div>
                            <!-- /.card-footer -->

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>

        temp = {{ $cv_logs->temperature }};

        if(temp <= 35){
            $("#condition").text("Cool Fever").addClass("text-warning").removeClass("text-danger text-success");
        }else if(temp >= 36.5 && temp <= 37.5){
            $("#condition").text("Normal").addClass("text-success").removeClass("text-danger text-warning");
        }else if(temp > 37.5) {
            $("#condition").text("Fever").addClass("text-danger").removeClass("text-warning text-success");
        }

    </script>
@endpush
