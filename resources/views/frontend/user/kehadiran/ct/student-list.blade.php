@extends('frontend.user.layouts.app')

@section('title', __('Student List'))

<?php
$breadcrumbs = [
    __('Dashboard') => route('frontend.user.dashboard'),
    __('Student Management') => route('frontend.user.kehadiran.ct.index'),
    $class->generate_name => "#",
    __('Student List') => "#"
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-uppercase font-weight-bold">{{ __('List Of Student For ') }}{{ $class->generate_name }} ( {{ date('Y') }})

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <table class="table-borderless">
                                    <tr>
                                        <td>{{ __('Total Students') }}</td>
                                        <td>: {{ $class->currentStudent->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Male') }}</td>
                                        <td>: {{ $class->currentStudentM->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Female') }}</td>
                                        <td>: {{ $class->currentStudentF->count() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('MyKad No.') }}</th>
                                <th>{{ __('Gender') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($class->currentStudent as $key=> $has_student)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $has_student->student->name }}</td>
                                <td>{{ $has_student->student->no_ic }}</td>
                                <td>{{ getGender($has_student->student->gender) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a target="_blank" href="{{ route('frontend.user.student.print-card', $has_student->id) }}" class="btn btn-icon btn-primary"><i class="fa fa-id-card"></i> </a>
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('frontend.user.student.view', $has_student->student_id) }}">{{ __('View') }}</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.student.edit', $has_student->student_id) }}">{{ __('Edit') }}</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.download-qr', $has_student->student->no_ic) }}">{{ __('Print QR') }}</a>
                                            <a class="dropdown-item" target="_blank" href="{{ route('frontend.user.kehadiran.ct.print-student-card-v2', $has_student->student_id) }}">{{ __('Print Student Label') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak Laporan</a>
                    <a href="{{ route('frontend.user.kehadiran.ct.index') }}" type="submit" class="btn btn-warning"> Kembali</a>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
