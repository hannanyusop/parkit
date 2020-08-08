@extends('frontend.user.layouts.app')

@section('title', 'Checkin')

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

                        <p>Staff Name : <b>{{ auth()->user()->name }}</b></p>
                        <p>NRIC / Unique Id : <b>{{ auth()->user()->unique_id }}</b></p>
                        <p>Event Name : <b>{{ $event->name }}</b></p>
                        <p>Datetime : <b>{{ $event->created_at }}</b></p>
                        <h3>Temperature</h3>

                        <x-forms.post :action="route('frontend.user.cv.event.checkin-new', $event->token)" class="form-horizontal">
                            <div class="">
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <div class="input-group mb-3">
                                            <input type="number" step=".01" value="{{ old('temperature') }}" name="temperature" id="temperature" class="form-control" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>

                                        <p>Condition:</p>
                                        <h4 id="condition"></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="">
                                <button id="checkin" type="submit" class="btn btn-success">Check-in</button>
                            </div>
                            <!-- /.card-footer -->
                        </x-forms.post>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script>
        $( "#temperature" ).keyup(function() {

            temp = $(this).val();
            checkin = $("#checkin");

            if(temp <= 28 || temp >= 40){
                $("#condition").text("Invalid Input").addClass("text-danger").removeClass("text-warning text-success");

            }else{
                if(temp <= 35){
                    $("#condition").text("Cool Fever").addClass("text-warning").removeClass("text-danger text-success");
                }else if(temp > 35 && temp <= 37.5){
                    $("#condition").text("Normal").addClass("text-success").removeClass("text-danger text-warning");
                }else if(temp > 37.5){
                    $("#condition").text("Fever").addClass("text-danger").removeClass("text-warning text-success");
                }
            }

        });

        function currentTime() {
            var date = new Date(); /* creating object of Date class */
            var hour = date.getHours();
            var min = date.getMinutes();
            var sec = date.getSeconds();
            hour = updateTime(hour);
            min = updateTime(min);
            sec = updateTime(sec);
            document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
            var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
        }

        function updateTime(k) {
            if (k < 10) {
                return "0" + k;
            }
            else {
                return k;
            }
        }

        currentTime();

    </script>
@endpush
