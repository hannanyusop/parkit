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
        <div class="col-md-6 offset-md-3">
            <div class="card card-info">
                <div class="card-body">

                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> You're not Classroom Teacher!</h5>
                        To add your class click this <b><a href="{{ route('frontend.user.kehadiran.ct.add-class') }}">link</a></b>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Class</th>
                                <th>Monitor By</th>
                                <th style="width: 40px">Today Attendance</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td>6 ATAS</td>
                                <td>HAFIZ HASRIN</td>
                                <td><b>22/24</b></td>
                                <td><a href="#" class="btn btn-info btn-xs">View</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" type="submit" class="btn btn-info">Print</a>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
