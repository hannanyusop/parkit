@extends('frontend.user.layouts.app')

@section('title', 'Vote')

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Campaign List</h3>

                    <div class="card-tools">
                       <a href="{{ route('frontend.user.vote.apply') }}" class="btn btn-primary btn-sm">Join Campaign</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Campaign Name</th>
                            <th>Campaign Status</th>
                            <th>Status</th>
                            <th>Attempt(s)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>UNDIAN PARKING SMKAL 2020</td>
                            <td>3 day(s) left</td>
                            <td><span class="badge bg-gradient-dark">Not Yet</span></td>
                            <td>2/5</td>
                            <td><a href="{{ route('frontend.user.vote.rules', 'SMKALPARK2020') }}" class="btn btn-success btn-xs">Vote Now</a> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>UNDIAN MEJA GURU 2020</td>
                            <td>Ended</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>1/1</td>
                            <td><a href="{{ route('frontend.user.vote.result', 'SMKALPARK2020') }}" class="btn btn-info btn-xs">View Result</a> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>CUTI PERISTIWA POLL</td>
                            <td>Ended</td>
                            <td><span class="badge bg-danger">Overdue</span></td>
                            <td>0/1</td>
                            <td><a href="{{ route('frontend.user.vote.result', 'SMKALPARK2020') }}" class="btn btn-info btn-xs">View Result</a> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
