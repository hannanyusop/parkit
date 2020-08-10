@extends('frontend.user.layouts.app')

@section('title', 'Classroom Teacher/ View Today Attendance')

@push('after-styles')
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-body">
                    <p class="text-center text-uppercase font-weight-bold">SENARAI PELAJAR KELAS TINGKATAN 6 ATAS <br>BAGI TAHUN 2020</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <table class="table-borderless">
                                    <tr>
                                        <td>Bilangan Pelajar</td>
                                        <td>: 24</td>
                                    </tr>
                                    <tr>
                                        <td>Bilagan Pelajar Lelaki</td>
                                        <td>: 6</td>
                                    </tr>
                                    <tr>
                                        <td>Bilangan Pelajar Perempuan</td>
                                        <td>: 18</td>
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
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td>MOHD AMMAR BIN BAKAR</td>
                                <td>111111-11-1111</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('frontend.user.kehadiran.ct.print-student-card', 1) }}">Cetak Kad Pelajar v1</a>
                                    <a class="btn btn-info btn-sm" href="{{ route('frontend.user.kehadiran.ct.print-student-card-v2', 1) }}">QR Meja v2</a>
                                </td>
                            </tr>
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
