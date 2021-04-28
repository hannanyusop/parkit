@extends('frontend.user.layouts.app')

@section('title', __('Search Student'))

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    __('Student Management') => route('frontend.user.student.index'),
    __('Search') => route('frontend.user.student.index'),
];
?>

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form method="get" class="form-horizontal">
                    <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{ request('search') }}" placeholder="{{ __('Enter Student Name/MyKad  ') }}" name="search">
                                    <span class="input-group-append">
                                        <button class="btn btn-primary" type="submit">{{ __('Search') }}</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body">

                    @if(!is_null($students ))
                        @if($students->count() > 0)
                            <p class="text-center font-weight-bold">{{ $students->count() }} {{ __('Student found.') }}</p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('MyKad No.') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Gender') }}</th>
                                        <th>{{ __('Dormitory Status') }}</th>
                                        <th>{{ __('Status') }}</th>
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
                                                        <a class="dropdown-item" href="{{ route('frontend.user.student.view', $student->id) }}">{{ __('View') }}</a>
                                                        <a class="dropdown-item" href="{{ route('frontend.user.student.print-card', $student->id) }}">{{ __('Print Student Card') }}</a>
                                                        <a class="dropdown-item" href="{{ route('frontend.user.student.edit', $student->id) }}">{{ __('Edit') }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h6 class="text-center">{{ __('No Student Information Found For') }} "{{ request('search') }}"</h6>
                        @endif
                    @endif

                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
