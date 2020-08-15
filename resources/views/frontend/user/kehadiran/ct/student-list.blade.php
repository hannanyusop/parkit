@extends('frontend.user.layouts.app')

@section('title', ' Sisitem Maklumat Pelajar / Kelas / Senarai Pelajar')

@push('after-styles')
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-body">
                    <p class="text-center text-uppercase font-weight-bold">SENARAI PELAJAR KELAS TINGKATAN {{ $class->generate_name }} <br>BAGI TAHUN {{ date('Y') }}</p>

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
                        <table class="table table-bordered">
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
                                    <a class="btn btn-info btn-sm" target="_blank" href="{{ route('frontend.user.kehadiran.ct.print-student-card', $has_student->student_id) }}">Cetak Kad Pelajar v1</a>
                                    <a class="btn btn-info btn-sm" target="_blank" href="{{ route('frontend.user.kehadiran.ct.print-student-card-v2', $has_student->student_id) }}">QR Meja v2</a>
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
