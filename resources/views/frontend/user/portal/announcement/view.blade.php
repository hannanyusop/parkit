@extends('frontend.user.layouts.app')

@section('title', 'Tambah Pengunguman')

<?php
    $breadcrumbs = [
        'Dashboard' => route('frontend.user.dashboard'),
        'Pengurusan Portal' => route('frontend.user.portal.index'),
        'Pengunguman' => route('frontend.user.portal.announcement.index'),
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
                            <label for="group" class="col-sm-2 col-form-label">Kumpulan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $announcement->group }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Tajuk</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{ $announcement->title }}" type="text" class="form-control" id="title" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_show" class="col-sm-2 col-form-label">Papar</label>
                            <div class="col-sm-10">
                                {!! ($announcement->is_show)? "<span class='badge badge-success'>YA</span>" : "<span class='badge badge-dark'>TIDAK</span>" !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tarkh Pengunguman</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datepicker"  name="date" id="date" value="{{ $announcement->date }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="show_until" class="col-sm-2 col-form-label">Papar Sehingga</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datepicker"  name="show_until" id="show_until" value="{{ $announcement->show_until }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Pengunguman</label>
                            <div class="col-sm-10">
                                <div class="m-2">{!!  (old('text'))? old('text') : $announcement->text !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-white" href="{{ route('frontend.user.portal.announcement.index') }}">Kembali</a>
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

