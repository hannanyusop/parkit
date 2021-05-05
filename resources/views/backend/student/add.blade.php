@extends('backend.layouts.app')

@section('title', __('Register Student'))

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-12">
            @include('backend.student.layout.topbar')
            <div class="card">

                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <x-forms.get method="post">
                        <div class="input-group input-group-lg">
                            <input type="text"  name="no_ic" class="form-control" value="{{ request('no_ic') }}" placeholder="{{ __('Student MyKad No.') }}" required>
                            <span class="input-group-append">
                            <button type="submit" class="btn btn-info btn-sm">{{ __('Check MyKad Availability') }}</button>
                          </span>
                        </div>
                        <p class="text-center">
                            <small class="text-success font-weight-bold">{{ __('Example') }} : 9605161312234 | {{ __('Without \'-\'') }}</small>
                        </p>
                    </x-forms.get>
                </div>
                @if($check)
                <x-forms.post :action="route('admin.student.insert')" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{ old('name') }}"  type="text" class="form-control text-uppercase" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_ic" class="col-sm-2 col-form-label">{{ __('MyKad No.') }}</label>
                            <div class="col-sm-6">
                                <input name="no_ic" value="{{ $no_ic }}" type="text" class="form-control text-uppercase" id="no_ic" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                            <div class="col-md-4">

                                @foreach(getGenderList() as $key => $type)
                                    <div class="form-check">
                                        <div class="icheck-success d-inline">
                                            <input id="gender_{{ $key }}" class="form-check-input" value="{{ $key }}" type="radio" name="gender" {{ ($detail['gender'] == $key)? "checked=''" : "disabled" }}>
                                            <label for="gender_{{ $key }}" class="form-check-label">{{ $type }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-sm-2 col-form-label form">{{ __('Date Of Birth') }}</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="dob" name="dob" value="{{ $detail['dob'] }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">{{ __('Dormitory Status') }}</label>
                            <div class="col-md-4">

                                @foreach(studentType() as $key => $type)
                                    <div class="form-check">
                                        <input id="type_{{ $key }}" class="form-check-input" value="{{ $key }}" type="radio" name="type" {{ (old('type') == $key)? "checked=''" : "" }} required>
                                        <label for="type_{{ $key }}" class="form-check-label">{{ $type }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class_id" class="col-sm-2 col-form-label form">{{ __('Class') }}</label>
                            <div class="col-md-4">
                                <select class="form-control select2" id="class_id" name="class_id">
                                    <option value="">--{{ __('Ignore If None') }}--</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" value="{{ (old('class_id') == $class->id)? "checked" : "" }}">{{ $class->generate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Hantar</button>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $('#dob').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush

