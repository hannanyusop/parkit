@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Pengunjung Aktif</span>
                        </p>
                        <i class="uil uil-users-alt float-right"></i>
                        <h6 class="text-uppercase mt-0"></h6>
                        <h2 class="my-2" id="active-users-count">{{ getLibTodayActive() }}</h2>
                    </div> <!-- end card-body-->
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Jumlah Pengunjung Hari Ini</span>
                        </p>
                        <i class="uil uil-users-alt float-right"></i>
                        <h2 class="my-2" id="active-users-count">{{ getLibTodayAll() }}</h2>
                    </div> <!-- end card-body-->
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Jumlah Pengunjung Bulan Ini</span>
                        </p>
                        <i class="uil uil-users-alt float-right"></i>
                        <h2 class="my-2" id="active-users-count">{{ getLibMonthAll() }}</h2>
                    </div> <!-- end card-body-->
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Peminjam Lewat</span>
                        </p>
                        <i class="uil uil-users-alt float-right"></i>
                        <h2 class="my-2" id="active-users-count">{{ getLate() }}</h2>
                    </div> <!-- end card-body-->
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

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
                                <div class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-handshake"></i> </h3>

                                        <p>Peminjaman Buku</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-user-clock"></i> </h3>

                                        <p>Rekod Pengunjung</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.visitor.today') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @can(['lib_staff', 'lib_admin'])
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-swatchbook"></i> </h3>

                                            <p>Tempahan Slot</p>
                                        </div>
                                        <a href="{{ route('frontend.user.library.admin.booking.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-white">
                                        <div class="inner text-center">
                                            <h3><i class="fa fa-book"></i> </h3>

                                            <p>Pegurusan Buku</p>
                                        </div>
                                        <a href="{{ route('frontend.user.library.admin.book.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endcan

                            @can('lib_admin')
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-chart-area"></i> </h3>

                                        <p>Laporan Data</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.admin.report.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-cogs"></i> </h3>

                                        <p>Tetapan</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.admin.setting.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <h5 class="mb-2">Sudut Informasi</h5>
                            <hr><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
