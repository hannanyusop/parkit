@extends('frontend.user.layouts.app')

@section('title', 'Senarai Kelas')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'E-Hadir' => route('frontend.user.kehadiran.ct.index'),
];
?>

@push('after-styles')
    <style type="text/css">
        #clock {
            font-family: 'Orbitron', sans-serif;
            color: #000000;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <div class="col-md-12">
            @include('frontend.user.student.layout.topbar')
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('frontend.user.kehadiran.ct.add-class') }}" class="btn btn-sm btn-link float-right mb-3">Tambah Kelas
                        <i class="fa fa-plus ml-1"></i>
                    </a>
                    <h4 class="header-title mt-2">Senarai Kelas</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
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
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.view-today-attendance', $class->id) }}">Laporan Kehadiran</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.student-list', $class->id) }}">Senarai Pelajar</a>
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
