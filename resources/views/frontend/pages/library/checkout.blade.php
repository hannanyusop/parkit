@extends('frontend.layouts.apps')

@section('title', 'Login')

@section('content')
    <body class="hold-transition login-page"
          style="
              background-color: #1d2832;
          {{--background-image: url('{{ asset('img/lg.jpg') }}');height: 100%;--}}
              /*background-position: center;*/
              background-repeat: no-repeat;
              background-size: cover;">

    <div class="login-box">

        <div class="card mt-5">
            <div class="card-body login-card-body">

                <h5 class="text-center mb-4">SILA MASUKAN KATALALUAN</h5>
                @include('includes.partials.messages')

                <x-forms.post :action="route('frontend.user.library.visitor.checkout-check')">
                    <div class="input-group mb-3">
                        <input name="name" id="name" type="text" value="{{ auth()->user()->name }}" class="form-control" placeholder="name" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" id="password" type="password" class="form-control" placeholder="KATA LALUAN">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-lg">HANTAR</button>
                </x-forms.post>
                <p class="mt-2">
                    <a class="btn btn-outline-dark btn-sm float-right" href="{{ route('frontend.user.library.visitor.self') }}"><i class="fa fa-qrcode"></i></a>
                </p>
            </div>
        </div>
        <p class="text-white font-weight-lighter text-sm text-center">Developed By <b class="text-success">Hannan Yusop</b> for<br> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG</p>
    </div>
    </body>
@endsection
