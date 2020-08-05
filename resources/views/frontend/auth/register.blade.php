@extends('frontend.layouts.apps')

@section('title', __('Register'))

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
                <p class="login-box-msg">Register a new membership</p>

                @include('includes.partials.messages')

                <x-forms.post :action="route('frontend.auth.register')">

                    <div class="input-group mb-3">
                        <input name="name" id="password" type="text" class="form-control" value="{{ old('name') }}" placeholder="Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="unique_id" id="unique_id" type="text" class="form-control" value="{{ old('unique_id') }}" placeholder="NRIC / Staff ID/ Unique ID" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password" maxlength="100" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation" maxlength="100" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                                <label class="form-check-label" for="terms">
                                    @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}" target="_blank">@lang('Terms & Conditions')</a>
                                </label>
                            </div>
                        </div>
                    </div><!--form-group-->

                    @if(config('boilerplate.access.captcha.registration'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                <input type="hidden" name="captcha_status" value="true" />
                            </div><!--col-->
                        </div><!--row-->
                    @endif

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button class="btn btn-primary" type="submit">@lang('Register')</button>
                        </div>
                    </div><!--form-group-->
                </x-forms.post>
                <p class="text-center mt-4">Already have account? <a href="{{ route('frontend.auth.login') }}" class="text-center">Login</a></p>
            </div>
        </div>
        <p class="text-white text-center">Developed By <b class="text-danger">Hannan Yusop</b> for<br> SEKOLAH MENENGAH KEBANGSAAN AGAMA LIMBANG</p>
    </div>
    </body>
@endsection
