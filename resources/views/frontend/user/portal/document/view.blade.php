@extends('frontend.user.layouts.app')

@section('title', 'Tambah Pengunguman')

<?php
    $breadcrumbs = [
        'Dashboard' => route('frontend.user.dashboard'),
        'Pengurusan Portal' => route('frontend.user.portal.index'),
        'Dokumen' => route('frontend.user.portal.document.index'),
        'Lihat' => '#',
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
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">Kategory</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ portalGetDocumentGroup($document->group) }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Tajuk</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{ $document->name }}" type="text" class="form-control" id="title" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_show" class="col-sm-2 col-form-label">Papar</label>
                            <div class="col-sm-10">
                                {!! ($document->is_show)? "<span class='badge badge-success'>YA</span>" : "<span class='badge badge-dark'>TIDAK</span>" !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="show_until" class="col-sm-2 col-form-label">Dokumen Asal</label>
                            <div class="col-sm-6">
                                <div class='embed-responsive' style='padding-bottom:150%'>
                                    <object data='{{ getFile($document->file) }}' type='application/pdf' width='100%' height='100%'></object>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Huraian</label>
                            <div class="col-sm-10">
                                <div class="m-2">{!!  $document->description !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-white" href="{{ route('frontend.user.portal.document.index') }}">Kembali</a>
                    </div>
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

