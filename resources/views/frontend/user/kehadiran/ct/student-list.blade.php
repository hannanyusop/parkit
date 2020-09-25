@extends('frontend.user.layouts.app')

@section('title', 'Senarai Pelajar')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'E-Hadir' => route('frontend.user.kehadiran.ct.index'),
    'Senarai Kelas' => '#'
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-uppercase font-weight-bold">SENARAI PELAJAR {{ $class->generate_name }} <br>BAGI TAHUN {{ date('Y') }}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <table class="table-borderless">
                                    <tr>
                                        <td>Bilangan Pelajar</td>
                                        <td>: {{ $class->currentStudent->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bilagan Pelajar Lelaki</td>
                                        <td>: {{ $class->currentStudentM->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bilangan Pelajar Perempuan</td>
                                        <td>: {{ $class->currentStudentF->count() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <b>Senarai Pelajar</b><br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NAMA</th>
                                <th>NO. K/P</th>
                                <th>Jantina</th>
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
                                        <a target="_blank" href="{{ route('frontend.user.kehadiran.ct.download-qr', $has_student->student->no_ic) }}" class="btn btn-icon btn-primary"><i class="fa fa-qrcode"></i> </a>
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('frontend.user.student.view', $has_student->student_id) }}">Lihat</a>
                                            <a class="dropdown-item" href="{{ route('frontend.user.student.edit', $has_student->student_id) }}">Kemaskini</a>
                                            <a class="dropdown-item" target="_blank" href="{{ route('frontend.user.kehadiran.ct.print-student-card', $has_student->student_id) }}">Cetak Kad Pelajar</a>
                                            <a class="dropdown-item" target="_blank" href="{{ route('frontend.user.kehadiran.ct.print-student-card-v2', $has_student->student_id) }}">QR Meja v2</a>
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
