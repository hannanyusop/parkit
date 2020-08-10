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

                <div class="login-logo">
                    <a href=""><b>{{ appName() }}</b></a>
                </div>

                <p class="login-box-msg">Sign in to start your session</p>
                @include('includes.partials.messages')

                <x-forms.post :action="route('frontend.auth.login')">
                    <div class="input-group mb-3">
                        <input name="email" id="password" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember" id="remember" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </x-forms.post>

                <p class="text-sm text-center mt-3">
                    Sebarang masaalah berkenaan log masuk sistem boleh berhubung terus dengan<br>
                    Hannan Yusop <a href="https://wa.me/+601015960586"><i class="fa fa-whatsapp-square"></i> +60105960586</a>
                </p>

                <p class="mt-5">
                    <a class="font-weight-bold text-success text-sm float-right" href="{{ route('frontend.auth.password.request') }}">Reset Password</a>
                    <a class="font-weight-bold text-success text-sm float-left" href="{{ route('frontend.auth.register') }}" class="text-center">Create Account</a>

                </p>
            </div>
        </div>
        <p class="text-white font-weight-lighter text-sm text-center">Developed By <b class="text-success">Hannan Yusop</b> for<br> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG</p>
    </div>
    </body>
@endsection
