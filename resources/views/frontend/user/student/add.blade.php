@extends('frontend.user.layouts.app')

@section('title', 'Add Campaign')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pelajar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <x-forms.get method="post">
                        <div class="input-group input-group-lg">
                            <input type="text" name="no_ic" class="form-control" required>
                            <span class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat">Semak No. K/P</button>
                          </span>
                        </div>
                    </x-forms.get>
                </div>
                <x-forms.post :action="route('frontend.user.student.insert')" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{ old('name') }}"  type="text" class="form-control text-uppercase" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_ic" class="col-sm-2 col-form-label">No. K/P</label>
                            <div class="col-sm-6">
                                <input name="no_ic" value="{{ old('no_ic') }}" type="text" class="form-control text-uppercase" id="no_ic">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Jantina</label>
                            <div class="col-md-4">

                                @foreach(getGender() as $key => $type)
                                    <div class="form-check">
                                        <input id="gender_{{ $key }}" class="form-check-input" value="{{ $key }}" type="radio" name="gender" {{ (old('gender') == $key)? "checked=''" : "" }}>
                                        <label for="gender_{{ $key }}" class="form-check-label">{{ $type }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label"></label>
                            <div class="col-md-4">

                                @foreach(studentType() as $key => $type)
                                <div class="form-check">
                                    <input id="type_{{ $key }}" class="form-check-input" value="{{ $key }}" type="radio" name="type" {{ (old('type') == $key)? "checked=''" : "" }}>
                                    <label for="type_{{ $key }}" class="form-check-label">{{ $type }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class_id" class="col-sm-2 col-form-label form">Kelas</label>
                            <div class="col-md-4">
                                <select class="form-control select2" id="class_id" name="class_id">
                                    <option value="">--SILA PILIH KELAS--</option>
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
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
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

