@extends('backend.layouts.app')

@section('title', 'Carian Pelajar')

<?php
$breadcrumbs = [
    'Dashboard' => route('admin.dashboard'),
    'Pelajar' => route('admin.student.index'),
];
?>

@section('content')
    <section class="content">
        @include('backend.student.layout.topbar')
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="card-body">

                    @if(!is_null($students ))
                        @if($students->count() > 0)
                            <p class="text-center font-weight-bold">{{ $students->count() }} Pelajar dijumpai</p>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombor K/P</th>
                                        <th>Nama</th>
                                        <th>Jantina</th>
                                        <th>Asrama/Harian</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key => $student)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $student->no_ic }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ getGender($student->gender) }}</td>
                                            <td>{!! badgeStudentType($student->is_hostel) !!}</td>
                                            <td>{!! badgeStudentStatus($student->status) !!}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('admin.student.view', $student->id) }}">Lihat</a>
                                                        <a class="dropdown-item" href="{{ route('admin.student.edit', $student->id) }}">Kemaskini</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h6 class="text-center">Tiada Maklumat Pelajar Dijumpai Bagi "{{ request('search') }}"</h6>
                        @endif
                    @endif

                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
