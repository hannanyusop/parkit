@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.admin.report.layout.side-div')
            </div>
            <div class="col-md-9">
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
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'line',
            data: {
                labels: MONTHS,
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
                    text: 'LAPORAN KPI PERPUSTAKAAN SMK AGAMA LIMBANG BAGI TAHUN {{ request('year') }}'
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
