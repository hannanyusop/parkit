@extends('frontend.user.layouts.app')

@section('title', 'Kemaskini Pengunguman')

<?php
    $breadcrumbs = [
        'Dashboard' => route('frontend.user.dashboard'),
        'Pengurusan Portal' => route('frontend.user.portal.index'),
        'Pengunguman' => route('frontend.user.portal.announcement.index'),
        'kemaskini' => '#',
    ];
?>

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <x-forms.post :action="route('frontend.user.portal.announcement.edit', $announcement->id)" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">Kumpulan</label>
                            <div class="col-sm-10">
                                <select class="select2" name="group" id="group">
                                    @foreach(portalGetAnnouncementGroup() as $key => $group)
                                        <option value="{{ $key }}" {{ ($announcement->group == $key)? "selected" : "" }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Tajuk</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{ (old('title'))? old('title') : $announcement->title }}" type="text" class="form-control" id="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_show" class="col-sm-2 col-form-label">Papar</label>
                            <div class="col-sm-10">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="is_show" id="is_show" value="1" class="custom-switch-input" {{ (old('is_show') == 1)? "checked" : (($announcement->is_show == 1)? "checked" : "") }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Papar Pengunguman</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tarkh Pengunguman</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datepicker"  name="date" id="date" value="{{ (old('date'))? old('date') : $announcement->date }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="show_until" class="col-sm-2 col-form-label">Papar Sehingga</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datepicker"  name="show_until" id="show_until" value="{{ (old('show_until'))? old('show_until') : $announcement->show_until }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Pengunguman</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" name="text" id="text">{!!  (old('text'))? old('text') : $announcement->text !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Hantar</button>
                        <a class="btn btn-white" href="{{ route('frontend.user.portal.announcement.index') }}">Kembali</a>
                    </div>
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

