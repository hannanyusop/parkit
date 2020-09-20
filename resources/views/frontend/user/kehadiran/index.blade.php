@extends('frontend.user.layouts.app')

@section('title', 'Senarai Kelas')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'E-Hadir' => route('frontend.user.kehadiran.ct.index'),
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
            @include('frontend.user.student.layout.topbar')
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <li><a href="{{ route('frontend.user.kehadiran.create') }}" class="dropdown-item">Jana Kehadiran</a></li>
                            <li><a href="#" class="dropdown-item">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tajuk</th>
                                <th>Tarikh</th>
                                <th>Satus</th>
                                <th>Jumlah Pelahjar</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($generated as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ reformatDatetime('created_at', $data->created_at) }}</td>
                                <td class="text-center">{{ $data->status }}</td>
                                <td>{{ $data->attendances->count() }}</td>
                                <td>
                                    <a href="{{ route('frontend.user.kehadiran.checkin', $data->id) }}" class="btn btn-icon btn-success"> Kehadiran</a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.view-today-attendance', $data->id) }}">Laporan Kehadiran</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.ct.student-list', $data->id) }}">Senarai Pelajar</a>
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
