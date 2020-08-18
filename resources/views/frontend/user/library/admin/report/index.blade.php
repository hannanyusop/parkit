@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                @include('frontend.user.library.admin.report.layout.side-div')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">LAPORAN HARIAN BAGI BULAN {{ request('month') }} {{ date('Y') }}</h4>
                        <x-forms.get>
                            <div class="form-group">
                                <select class="form-control" name="year">
                                    @foreach(getMonth() as $key => $month)
                                        <option value="{{ $key }}" {{ (request('month') == $key)? "SELECTED" : "" }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">CARI</button>
                        </x-forms.get>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/chart.js/utils.js') }}"></script>
    <script>
        var config = {
            type: 'line',
            data: {
                labels: @json($days),
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: @json($visitors),
                    fill: false,
                }, {
                    label: 'Jumlah Peminjaman Buku',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: @json($borrows),
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'LAPORAN HARIAN BAGI BULAN {{ request('month') }} {{ date('Y') }}'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Bulan'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Jumlah'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };

    </script>
@endpush
