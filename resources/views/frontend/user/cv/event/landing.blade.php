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
                <div class="card-body">
                    <div class="text-center">
                        <h2 id="clock"></h2>
                        {{ getQr($event->token) }}

                        <br>
                        <a href="{{ route('frontend.user.cv.event.checkin', $event->token ) }}" target="_blank">{{ route('frontend.user.cv.event.checkin', $event->token ) }}</a>

                        <p>Event Name : <b>{{ $event->name }}</b></p>
                        <p>Datetime : <b>{{ $event->created_at }}</b></p>
                        <p>Total User Checked-in  : <b id="total"></b></p>

                        <h4 class="text-success">PREVIOUS USER :</h4>
                        <h5 class="text-uppercase" id="last-user"></h5>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('frontend.user.cv.event.index') }}" type="submit" class="btn btn-info">Back</a>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(function () {
            $('#campaigndatetime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'YYYY/MM/DD HH:mm'
                }
            })

        })

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

        $(document).ready(function() {


            check();

            function check() {
                $.ajax({
                    url:"{{ route('frontend.user.cv.event.checkin-last', $event->id) }}",
                    method:'GET',
                    dataType:'json',
                    success:function(data)
                    {
                        $("#total").text(data.total);

                        if(data.last_user_id == 0){
                            $("#last-user").text("NO CHECK-IN USER");
                        }else{
                            $("#last-user").text(data.name);
                        }
                    }
                })
            }

            setInterval(function() {
               check();
            }, 7000);  //Delay here = 5 seconds
        });


    </script>
@endpush
