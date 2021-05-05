@extends('frontend.user.layouts.app')

@section('title', 'MRK')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    __('Event List') => "#",
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-light">

                        <div class="alert-body">
                            This module is still in the development phase. If you encounter any system error please
                            <b>screenshot</b> and report to our technical team.
                        </div>

                        <p class="m-2">
                            * Please refer to this  <a href="{{ asset('user_guide/ug_mrk.pdf') }}" download="" class="text-primary font-weight-bold">{{ __('User Guide') }}</a>.
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{ __('Event') }}</th>
                                <th>{{ __('Organized By') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                                <th class="text-center">{{ __('Total of participants') }}</th>
                                <th class="text-center">{{ __('Attendance Percentage') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($generated as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $data->title }}<br>
                                    <small>{{ reformatDatetime('created_at', $data->created_at) }}</small>
                                </td>
                                <td>{{ $data->admin->name }}</td>
                                <td>{{ getEventCategory($data->category) }}</td>
                                <td class="text-center">{!! attendanceGetUgaStatus($data->status) !!}</td>
                                <td class="text-center">{{ $data->attendances->count() }}</td>
                                <td class="text-center">{{ number_format((float)$data->attends->count()/$data->attendances->count()*100, 2, '.', '') }}%</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ __('Action') }} <span class="caret"></span> </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.checkin', encrypt($data->id)) }}">{{ __('View') }}</a>
                                            @if($data->status == 1)
                                                <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.checkin-qr', encrypt($data->id)) }}">{{ __('Check-in Scanner') }}</a>
                                                @if($data->is_checkout == 1)
                                                    <a class="dropdown-item" href="{{ route('frontend.user.kehadiran.checkout-qr', encrypt($data->id)) }}">{{ __('Check-out Scanner') }}</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
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
