@extends('frontend.layouts.apps')

@section('title', __('Reset Password'))

@section('content')
    <body class="hold-transition login-page"
          style="
          {{--background-image: url('{{ asset('img/lg.jpg') }}');height: 100%;--}}
              background-color: #1d2832;
              /*background-position: center;*/
              background-repeat: no-repeat;
              background-size: cover;">

    <div class="login-box">

        <div class="login-logo">
            <img src="{{ getLogoUrl() }}" class="img-fluid" width="200px">
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Reset Password</p>
                @include('includes.partials.messages')

                <x-forms.post :action="route('frontend.auth.password.update')">
                    <input type="hidden" name="token" value="{{ $token }}" />

                    <div class="input-group mb-3">
                        <input name="email" id="email" type="email" class="form-control" value="{{ $email ?? old('email') }}" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="password" id="password" type="password" class="form-control" value="{{ old('password') }}" placeholder="New Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" value="{{ old('password_confirmation') }}" placeholder="New Password Confirm" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <button class="btn btn-success btn-block" type="submit">Change Password</button>
                    </div>
                </x-forms.post>
                <p class="text-center mt-4 text-sm text-dark">Already remember password? <a href="{{ route('frontend.auth.login') }}" class="text-center text-success">Login</a></p>

            </div>
        </div>
        <p class="text-white font-weight-lighter text-sm text-center">Developed By <b class="text-success">Hannan Yusop</b> for<br> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG</p>
    </div>
    </body>
@endsection
