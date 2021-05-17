@extends('frontend.user.layouts.app')

@section('title', 'Report')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    __('Event List') => "#",
    $uga->title => '#',
    'Report' => '#',
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

                    <div class="statistic-details m-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ number_format((float)($attend/$total*100), 2, '.', '') }}%</span>
                            <div class="detail-value">{{ $attend }}</div>
                            <div class="detail-name">{{ __('Cheked-in') }}</div>
                        </div>
                        @if($uga->is_checkout == 1)
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ number_format((float)($checkouts/$total*100), 2, '.', '') }}%</span>
                                <div class="detail-value">{{ $checkouts }}</div>
                                <div class="detail-name">{{ __('Checked-out') }}</div>
                            </div>
                        @endif
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>{{ number_format((float)($absent/$total*100), 2, '.', '') }}%</span>
                            <div class="detail-value">{{ $absent }}</div>
                            <div class="detail-name">{{ __('Absent') }}</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span></span>
                            <div class="detail-value">{{ $total }}</div>
                            <div class="detail-name">{{ __('Expected Participant') }}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="race"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="gender"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="nationality"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="religion"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="is_hostel"></canvas>
                        </div>
                    </div>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        var ctx = document.getElementById("race").getContext('2d');
        var race = new Chart(ctx, {
            type: 'pie',
            data: @json($data['race']),
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

        var ctx2 = document.getElementById("gender").getContext('2d');
        var gender = new Chart(ctx2, {
            type: 'pie',
            data: @json($data['gender']),
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

        var ctx3 = document.getElementById("nationality").getContext('2d');
        var nationality = new Chart(ctx3, {
            type: 'pie',
            data: @json($data['nationality']),
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

        var ctx4 = document.getElementById("religion").getContext('2d');
        var religion = new Chart(ctx4, {
            type: 'pie',
            data: @json($data['religion']),
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

        var ctx5 = document.getElementById("is_hostel").getContext('2d');
        var is_hostel = new Chart(ctx5, {
            type: 'pie',
            data: @json($data['is_hostel']),
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

    </script>
@endpush
