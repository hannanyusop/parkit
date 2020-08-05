@extends('frontend.layouts.apps')

@section('title', 'Login')

@section('content')
    <body class="hold-transition login-page"
          style="background-image: url('{{ asset('img/lg.jpg') }}');height: 100%;
              /*background-position: center;*/
              background-repeat: no-repeat;
              background-size: cover;">

    <div class="login-box">

        <div class="card mt-5">
            <div class="card-body login-card-body">

                <div class="login-logo">
                    <a href=""><b>POLL-</b>I</a>
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
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </x-forms.post>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('frontend.auth.register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
        <p class="text-white text-center">Developed By <b class="text-danger">Hannan Yusop</b> for<br> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG</p>
    </div>
    </body>
@endsection
