@extends('frontend.user.layouts.app')

@section('title', 'Checkin')

@push('after-styles')
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
                        <h1>Kehadiran Pelajar</h1>

                        <p>Nama Pelajar : <b>AMAR MAKRUF</b></p>
                        <p>No. K/P : <b>111111-11-111</b></p>
                        <p>Kelas : <b>4 SAINS 2</b></p>
                        <h3>Temperature</h3>

                        <x-forms.post :action="route('frontend.user.kehadiran.ct.scan-insert', 1)" class="form-horizontal">
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