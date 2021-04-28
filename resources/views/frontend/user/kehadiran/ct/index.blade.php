@extends('frontend.user.layouts.app')

@section('title', __('Student List'))

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    __('Student Management') => '',
    __('List') => route('frontend.user.kehadiran.ct.index')
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
{{--            @include('frontend.user.student.layout.topbar')--}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{ __('Class') }}</th>
                                <th>{{ __('Classroom Teacher') }}</th>
                                <th>{{ __('Total Student') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $key => $class)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $class->generate_name }}</td>
                                <td>{{ getCurrentClassroomTeacher($class->user_id) }}</td>
                                <td class="text-center">{{ $class->currentStudent->count() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                        <div class="dropdown-menu" style="">
{{--                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.view-today-attendance', $class->id) }}">Laporan Kehadiran</a>--}}
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.student-list', $class->id) }}">{{ __('View All Student') }}</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.printQrByClass', $class->id) }}">{{ __('Print QR') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
