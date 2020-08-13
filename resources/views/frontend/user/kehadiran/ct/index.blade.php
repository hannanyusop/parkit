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
                        <a href="{{ route('frontend.user.kehadiran.ct.add-class') }}" class="btn btn-app bg-success">
                            <i class="fas fa-user-plus"></i> Daftar Kelas
                        </a>
                    </div>

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
                                    <a href="{{ route('frontend.user.kehadiran.ct.view-today-attendance', $class->id) }}" class="btn btn-success btn-xs">Laporan Kehadiran Hari Ini</a>
                                    <a href="{{ route('frontend.user.kehadiran.ct.student-list', $class->id) }}" class="btn btn-info btn-xs">Lihat Senarai Pelajar</a>
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
