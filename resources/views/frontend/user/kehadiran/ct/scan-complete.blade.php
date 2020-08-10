@extends('frontend.user.layouts.app')

@section('title', 'Checkin Completed')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <!-- form start -->
                <div class="card-body">


                    <div class="text-center">
                        <h1>Kehadiran Pelajar Dimasukan</h1>

                        <p>Nama Pelajar : <b>AMAR MAKRUF</b></p>
                        <p>No. K/P : <b>111111-11-111</b></p>
                        <p>Kelas : <b>4 SAINS 2</b></p>
                        <h3>Suhu</h3>

                            <div class="">
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <h1 class="font-weight-bold" id="temperatue">35.7 °C</h1>

                                        <p>Keadaan:</p>
                                        <h4 id="condition"></h4>
                                    </div>
                                </div>
                            </div>


                        <a href="{{ route('frontend.user.kehadiran.ct.scan') }}" class="btn btn-lg btn-success">Scan Qr Pelajar</a>

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

        temp = 35.7;

        if(temp <= 35){
            $("#condition").text("Cool Fever").addClass("text-warning").removeClass("text-danger text-success");
        }else if(temp > 35.0 && temp <= 37.5){
            $("#condition").text("Normal").addClass("text-success").removeClass("text-danger text-warning");
        }else if(temp > 37.5) {
            $("#condition").text("Fever").addClass("text-danger").removeClass("text-warning text-success");
        }

    </script>
@endpush
