@extends('portal.layout.app')

@section('content')
    <section class="space-ptb">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="row no-gutters d-flex align-items-end mb-4 mb-sm-2">
                            <img class="img-fluid border-radius" src="{{ asset('img/portal/sekolah/pengetua.jpg') }}" alt="">
                        <p class="text-center m-2">USTAZ ZAINI (PENGETUA SMKAL 2019 – KINI)</p>
                    </div>
                </div>
                <div class="col-lg-6 pl-xl-5">
                    <h2 class="mb-4">Perutusan Pengetua</h2>
                    <p class="mb-4">
                        {!! $perutusan->text !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
