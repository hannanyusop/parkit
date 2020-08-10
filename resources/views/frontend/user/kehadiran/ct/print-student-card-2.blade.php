@extends('frontend.user.layouts.app')

@section('title', 'QR Meja')

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
        <div class="col-md-4 offset-md-4">
            <div class="card card-info">
                <div class="card-body">
                    <div>
                        <div class="text-center">
                            <h6 class="product-title">
                                <img src="{{ asset('img/smkal-logo.png') }}" alt="Product Image" width="30px">
                                SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG
                            </h6>
                            <h4>MAKLUMAT PELAJAR</h4>
                            <div class="mt-2">
                                {{ getKehadiranStudent('960516131111') }}
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <p class="font-weight-bold font-size-lg">
                                {{ auth()->user()->name }}<br>
                                NO K/P : {{ auth()->user()->unique_id }}<br>
                                4 SAINS 2
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('frontend.user.kehadiran.ct.student-list', 1) }}" type="submit" class="btn btn-info">Kembali</a>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
