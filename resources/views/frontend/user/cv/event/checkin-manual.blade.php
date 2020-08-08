@extends('frontend.user.layouts.app')

@section('title', 'Manual Checkin')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <x-forms.get :action="route('frontend.user.cv.event.checkin-manual')">
                        <div class="text-center mb-3">
                            <h1>Manual Check-in</h1>
                            <h2 id="clock"></h2>

                            <div class="col-md-6 offset-md-3">
                                <div class="input-group input-group-lg">
                                    <input name="code" class="form-control form-control-lg" type="text" value="{{ request('code') }}" @if(!is_null($event)) disabled @endif">
                                    <span class="input-group-append">
                                     @if(is_null($event))
                                            <button type="submit" class="btn btn-success btn-lg">Search</button>
                                        @else
                                            <a href="{{ route('frontend.user.cv.event.checkin-manual') }}" class="btn btn-warning btn-lg">Reset</a>
                                        @endif
                                </span>
                                </div>
                            </div>

                            <div class="center">
                                <p class="text-sm text-gray">The code usually contain only a number with length of 6</p>
                            </div>
                        </div>
                    </x-forms.get>

                    @if(request()->has('code'))
                        @if(!$event)
                            <p class="text-center text-danger font-weight-bold">No Event found for " {{ request('code') }}"</p>
                        @endif
                        @if(!is_null($event))
                                <div class="text-center">

                                    <p>Staff Name : <b>{{ auth()->user()->name }}</b></p>
                                    <p>NRIC / Unique Id : <b>{{ auth()->user()->unique_id }}</b></p>
                                    <p>Event Name : <b>{{ $event->name }}</b></p>
                                    <p>Date : <b>{{ reformatDatetime($event->created_at, "d M Y") }}</b></p>
                                    <h3>Temperature</h3>

                                    <x-forms.post :action="route('frontend.user.cv.event.checkin-manual-insert')" class="form-horizontal">
                                        <div class="">

                                            <input type="hidden" name="token" value="{{ request('code') }}">
                                            <div class="form-group row">
                                                <div class="col-md-4 offset-md-4">
                                                    <div class="input-group mb-3">
                                                        <input type="number" step=".01" name="temperature" id="temperature" class="form-control" required>
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
                            @endif
                    @endif
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
                checkin.prop("disabled",true);
                $("#condition").text("Invalid Input").addClass("text-danger").removeClass("text-warning text-success");

            }else{
                checkin.prop("disabled",false);
                if(temp <= 35){
                    $("#condition").text("Cool Fever").addClass("text-warning").removeClass("text-danger text-success");
                }else if(temp >= 36.5 && temp <= 37.5){
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
