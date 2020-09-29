@extends('frontend.user.layouts.app')

@section('title', 'Kemaskini Pengumuman')

<?php
    $breadcrumbs = [
        'Dashboard' => route('frontend.user.dashboard'),
        'Pengurusan Portal' => route('frontend.user.portal.index'),
        'Pengumuman' => route('frontend.user.portal.document.index'),
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
                <x-forms.post :action="route('frontend.user.portal.document.edit', $document->id)" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">Kumpulan</label>
                            <div class="col-sm-10">
                                <select class="select2" name="group" id="group">
                                    @foreach(portalGetDocumentGroup() as $key => $group)
                                        <option value="{{ $key }}" {{ ($document->group == $key)? "selected" : "" }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tajuk</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{ (old('name'))? old('name') : $document->name }}" type="text" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_show" class="col-sm-2 col-form-label">Papar</label>
                            <div class="col-sm-10">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="is_show" id="is_show" value="1" class="custom-switch-input" {{ (old('is_show') == 1)? "checked" : (($document->is_show == 1)? "checked" : "") }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Papar Pengumuman</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="show_until" class="col-sm-2 col-form-label">Dokumen</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control"  name="file" id="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="show_until" class="col-sm-2 col-form-label">Dokumen Asal</label>
                            <div class="col-sm-6">
                                <div class='embed-responsive' style='padding-bottom:150%'>
                                    <object data='{{ $document->file }}' type='application/pdf' width='100%' height='100%'></object>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Huraian</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description">{!!  (old('description'))? old('description') : $document->description !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Hantar</button>
                        <a class="btn btn-white" href="{{ route('frontend.user.portal.document.index') }}">Kembali</a>
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

