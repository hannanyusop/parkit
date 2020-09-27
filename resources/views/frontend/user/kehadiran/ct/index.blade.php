@extends('frontend.user.layouts.app')

@section('title', 'Senarai Kelas')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Pangkalan Data Pelajar' => '',
    'Senarai Kelas' => route('frontend.user.kehadiran.ct.index')
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
            @include('frontend.user.student.layout.topbar')
            <div class="card">
                <div class="card-header">
                    <h4>Senarai Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kelas</th>
                                <th>Guru Kelas</th>
                                <th>Senarai Pelajar</th>
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
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.student-list', $class->id) }}">Senarai Pelajar</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.printQrByClass', $class->id) }}">Print QR</a>
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
