@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ __('Total Staff') }}</h4>
                    </div>
                    <div class="card-body">{{ $count['staff'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ __('Total Students') }}</h4>
                    </div>
                    <div class="card-body">{{ $count['students'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-home"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ __('Total Class') }}</h4>
                    </div>
                    <div class="card-body">{{ $count['class'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-calendar-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ __('Attendance') }}</h4>
                    </div>
                    <div class="card-body">{{ $count['attendance'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics</h4>
                </div>
                <div class="card-body">
                    <canvas id="statistic" height="182"></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <div class="detail-value">{{ $attendance['today'] }}</div>
                            <div class="detail-name">{{ __('Today\'s Event') }}</div>
                        </div>
                        <div class="statistic-details-item">
                            <div class="detail-value">{{ $attendance['week'] }}</div>
                            <div class="detail-name">{{ __('This Week\'s Event') }}</div>
                        </div>
                        <div class="statistic-details-item">
                            <div class="detail-value">{{ $attendance['month'] }}</div>
                            <div class="detail-name">{{ __('This Month\'s Event') }}</div>
                        </div>
                        <div class="statistic-details-item">
                            <div class="detail-value">{{ $attendance['year'] }}</div>
                            <div class="detail-name">{{ __('This Year\'s Event') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Recent Event Created') }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($latest as $event)
                        <li class="media">
                            <div class="media-body">
                                <div class="float-right text-primary">{{ getHumanDiff($event->created_at) }}</div>
                                <div class="media-title">{{ limitString($event->title, 20) }}</div>
                                <span class="text-small text-muted">
                                    {{ __('Organised By') }} : {{ $event->admin->name }}<br>
                                    Start : {{ $event->start }}<br>
                                    End   : {{ $event->end }}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="{{ asset('ui/modules/chart.min.js') }}"></script>
    <script type="text/javascript">
        var ctx = document.getElementById("statistic").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'Jun', 'July', 'Aug', 'Sept','Oct',  'Nov', 'Dec'],
                datasets: [{
                    data: @json($graph),
                    backgroundColor: '#6777ef',
                    borderColor: '#6777ef',
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            },
        });
    </script>
@endpush
