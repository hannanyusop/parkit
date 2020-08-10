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
            <div class="card card-info">
                <div class="card-body">

                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i>Anda Bukan Guru Kelas!</h5>
                        Klik <b><a href="{{ route('frontend.user.kehadiran.ct.add-class') }}">pautan</a></b> ini untuk menambah kelas anda
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kelas</th>
                                <th>Guru Kelas</th>
                                <th>Kehadiran Hari Ini</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td>6 ATAS</td>
                                <td>HAFIZ HASRIN</td>
                                <td><b>22/24</b></td>
                                <td>
                                    <a href="{{ route('frontend.user.kehadiran.ct.view-today-attendance', 1) }}" class="btn btn-success btn-xs">Laporan Kehadiran Hari Ini</a>
                                    <a href="{{ route('frontend.user.kehadiran.ct.student-list', 1) }}" class="btn btn-info btn-xs">Lihat Senarai Pelajar</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
