@extends('frontend.user.layouts.app')

@section('title', 'My Campaign List')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Campaign Name</th>
                            <th>Date (Start - End)</th>
                            <th>Status</th>
                            <th>Target Participation</th>
                            <th>Actual (Take Part / Registered)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                UNDIAN PARKING SMKAL 2020<br>
                                <small>CODE: SMKALCODE2020 <i class="text-info fa fa-link"></i> </small>
                            </td>
                            <td>11:00 AM 01/08/2020  <br>
                                11:59 PM 04/08/2020</td>
                            <td><span class="badge bg-success">Running</span></td>
                            <td><small class="text-info"><i class="fa fa-user"></i> 34 </small></td>
                            <td>12/31</td>
                            <td>
                                <a href="{{ route('frontend.user.campaign.view', '1') }}" class="btn btn-primary btn-xs">View </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                UNDIAN MEJA GURU SMKAL 2020<br>
                                <small>CODE: SMKALGURU2020</small>
                            </td>
                            <td>11:00 AM 03/04/2020  <br>
                                11:59 PM 15/04/2020</td>
                            <td><span class="badge bg-danger">Ended</span></td>
                            <td><small class="text-info"><i class="fa fa-user"></i> 65 </small></td>
                            <td>65/65</td>
                            <td>
                                <a href="{{ route('frontend.user.campaign.view', '1') }}" class="btn btn-primary btn-xs">View</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
