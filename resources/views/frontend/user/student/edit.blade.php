@extends('frontend.user.layouts.app')

@section('title', 'Add Campaign')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            @include('frontend.user.student.layout.topbar')
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Kemaskini Maklumat Pelajar</h3>
                </div>
                <x-forms.post :action="route('frontend.user.student.update', $student->id   )" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{ $student->name }}"  type="text" class="form-control text-uppercase" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_ic" class="col-sm-2 col-form-label">No. K/P</label>
                            <div class="col-sm-6">
                                <input name="no_ic" value="{{ $student->no_ic }}" type="text" class="form-control text-uppercase" id="no_ic" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Jantina</label>
                            <div class="col-md-4">

                                @foreach(getGender() as $key => $type)
                                    <div class="form-check">
                                        <div class="icheck-success d-inline">
                                            <input id="gender_{{ $key }}" class="form-check-input" value="{{ $key }}" type="radio" name="gender" {{ ($student->gender == $key)? "checked=''" : "disabled" }}>
                                            <label for="gender_{{ $key }}" class="form-check-label">{{ $type }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-sm-2 col-form-label form">Tarikh Lahir</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="dob" name="dob" value="{{ reformatDatetime($student->dob, 'j/m/Y') }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Asrama/Harian</label>
                            <div class="col-md-4">

                                @foreach(studentType() as $key => $type)
                                    <div class="form-check">
                                        <input id="type_{{ $key }}" class="form-check-input" value="{{ $key }}" type="radio" name="type" {{ ($student->type == $key)? "checked=''" : "" }} required>
                                        <label for="type_{{ $key }}" class="form-check-label">{{ $type }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-md-4">

                                <select class="form-control" id="status" name="status">
                                    @foreach(studentStatus() as $key => $status)
                                        <option value="{{ $key }}" value="{{ ($student->status == $key)? "checked" : "" }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class_id" class="col-sm-2 col-form-label form">Kelas</label>
                            <div class="col-md-4">
                                <select class="form-control select2" id="class_id" name="class_id">
                                    <option value="">--SILA ABAIKAN JIKA TIADA--</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ ($student->class_id == $class->id)? "selected=''" : "" }}>{{ $class->generate_name }}</option>
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

