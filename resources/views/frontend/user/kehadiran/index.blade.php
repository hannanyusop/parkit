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
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-light">
                        <div class="alert-body">
                            Modul Rekod Kehadiran ini masih dalam fasa pembinaan dan percubaan. Jika anda menghadapi ralat sistem sila
                            <i>screenshot</i> dan laporkan kepada pihak teknikal kami.
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tajuk</th>
                                <th>Admin</th>
                                <th class="text-center">Satus</th>
                                <th class="text-center">Jumlah Pelajar Terlibat</th>
                                <th class="text-center">Peratus Kehadiran</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($generated as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $data->title }}<br>
                                    <small>{{ reformatDatetime('created_at', $data->created_at) }}</small>
                                </td>
                                <td>{{ $data->admin->name }}</td>
                                <td class="text-center">{!! attendanceGetUgaStatus($data->status) !!}</td>
                                <td class="text-center">{{ $data->attendances->count() }}</td>
                                <td class="text-center">{{ number_format((float)$data->attends->count()/$data->attendances->count()*100, 2, '.', '') }}%</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.checkin', encrypt($data->id)) }}">Lihat</a>
                                            @if($data->status == 1)
                                                <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.checkin-qr', encrypt($data->id)) }}">Scan Masuk</a>
                                                @if($data->is_checkout == 1)
                                                    <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.checkout-qr', encrypt($data->id)) }}">Scan Keluar</a>
                                                @endif
                                            @endif
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
