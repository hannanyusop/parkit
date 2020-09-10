@extends('frontend.user.layouts.app')

@section('title', 'Classroom Teacher')

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
        <div class="col-md-8 offset-md-2">
            @include('frontend.user.student.layout.topbar')
            <div class="card card-info">
                <div class="card-body">

                    <div class="row">
                        @if($today)
                        @else
                            <a href="{{ route('frontend.user.kehadiran.ct.today-generate', $uHasClass->class_id) }}" onclick="return confirm('Adakah anda pasti untuk menjana senarai kehadiran hari ini?')" class="btn btn-app bg-success">
                                <i class="fas fa-user-plus"></i> Jana Kehadiran Hari Ini
                            </a>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Status Kehadiran</th>
                                <th>Suhu (°C)</th>
                                <th>Nota</th>
                                <th>Tarikh</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($today)
                                @foreach($today->attendances as $key => $attendance)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $attendance->student->name }}</td>
                                        <td>{{ attendanceStatus($attendance->status) }}</td>
                                        <td>{{ $attendance->temperature }}</td>
                                        <td>{{ $attendance->remark }}</td>
                                        <td>{{ reformatDatetime($attendance->created_at, 'H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="6">Tiada Kehadiran Hari Ini</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
