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

                <h5 class="text-center mb-4">SELAMAT DATANG KE PERPUSTAKAAN SMK AGAMA LIMBANG</h5>
                @include('includes.partials.messages')

                <x-forms.post :action="route('frontend.user.library.visitor.self-check')">
                    <div class="mb-3">
                        <input name="no_ic" id="password" type="text" class="form-control" placeholder="NOMBOR KAD PENGENALAN">
                    </div>
                    <div class="form-check text-center m-4">
                    <input type="checkbox" name="is_staff" class="form-check-input" id="is_staff" value="1">
                    <label class="form-check-label" for="is_staff">Staff Sekolah</label>
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-block btn-lg">CARI</button>
                </x-forms.post>
                <p class="mt-4">
                    <a class="btn btn-outline-dark btn-sm float-right" href="{{ route('frontend.user.library.visitor.checkout') }}"><i class="fa fa-sign-out-alt"></i></a>
                </p>
            </div>
        </div>
        <p class="text-white font-weight-lighter text-sm text-center">Developed By <b class="text-success">Hannan Yusop</b> for<br> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG</p>
    </div>
    </body>
@endsection
