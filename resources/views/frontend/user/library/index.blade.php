@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">

                        <h6 class="d-inline mb-2">Statistik Penguparnjung</h6>
                        <div class="bg-light m-4">
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <div class="detail-value">{{ getLibTodayActive() }}</div>
                                    <div class="detail-name">Pengunjung Aktif</div>
                                </div>
                                <div class="statistic-details-item">
                                    <div class="detail-value">{{ getLibTodayAll() }}</div>
                                    <div class="detail-name">Pengunjung Hari Ini</div>
                                </div>
                                <div class="statistic-details-item">
                                    <div class="detail-value">{{ getLibMonthAll() }}</div>
                                    <div class="detail-name">Pengunjung Bulan Ini</div>
                                </div>
                                <div class="statistic-details-item">
                                    <div class="detail-value">{{ getLate() }}</div>
                                    <div class="detail-name">Peminjam Lewat</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @can('lib_prefects')
                                <p class="">Selamat datang, {{ session('prefect')['name'] }}</p>
                                <small><a class="" onclick="return confirm('Adakah anda pasti untuk log keluar ID ini?')" href="{{ route('frontend.user.library.prefect-logout') }}">Log Keluar</a></small>
                            @endcan
                        </div>

                        <div class="row icons-list-demo"></div>

                        <div class="row">
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-handshake"></i> </h3>

                                        <p>Peminjaman Buku</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <a href="{{ route('frontend.user.library.visitor.today') }}" class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-user-clock"></i> </h3>

                                        <p>Rekod Pengunjung</p>
                                    </div>
                                </a>
                            </div>
                            @if(auth()->user()->can('lib_staff') || auth()->user()->can('lib_admin'))
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.library.admin.booking.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-swatchbook"></i> </h3>

                                            <p>Tempahan Slot</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <a href="{{ route('frontend.user.library.admin.book.index') }}" class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-book"></i> </h3>

                                            <p>Pegurusan Buku</p>
                                        </div>
                                    </a>
                                </div>
                            @endif

                            @can('lib_admin')
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <a href="{{ route('frontend.user.library.admin.report.index') }}" class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-chart-area"></i> </h3>

                                        <p>Laporan Data</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <a href="{{ route('frontend.user.library.admin.setting.index') }}" class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-cogs"></i> </h3>

                                        <p>Tetapan</p>
                                    </div>
                                </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="summary">
                            <div class="summary-item">
                                <h6>Tempahan Slot Hari Ini<span class="text-muted"> ({{ $bookings->count() }} tempahan)</span></h6>
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach($bookings as $booking)
                                    <li class="media" style="margin-bottom: -25px">
                                        <div class="media-body">
                                            <div class="media-title"><a href="#">{{ $booking->start." - ".$booking->end }}</a></div>
                                            <div class="text-muted text-small">by <a href="#">{{ strtolower($booking->applicant->name) }}</a> <div class="bullet"></div> {{ $booking->purpose }}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
