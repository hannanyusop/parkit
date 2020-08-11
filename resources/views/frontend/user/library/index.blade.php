@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fa fa-user-check"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengunjung Aktif</span>
                        <span class="info-box-number">3</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-maroon">
                    <span class="info-box-icon"><i class="fa fa-user-friends"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pengunjung Hari Ini</span>
                        <span class="info-box-number">21</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-indigo">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pengunjung Bulan Ini</span>
                        <span class="info-box-number">269</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-fuchsia">
                    <span class="info-box-icon"><i class="fa fa-clock"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Peminjam Lewat</span>
                        <span class="info-box-number">1</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-handshake"></i> </h3>

                                        <p>Borrow & Return</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-book"></i> </h3>

                                        <p>Manage Book</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.admin.book.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-chart-area"></i> </h3>

                                        <p>Data Report</p>
                                    </div>
                                    <a href="#" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-orange">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-user-lock"></i> </h3>

                                        <p>Pengurusan Pengunjung</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.visitor.today') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-cogs"></i> </h3>

                                        <p>Tetapan</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.admin.setting.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
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

                        <div class="row">
                            <h6 class="font-weight-bold">Senarai Peminjam Lewat</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>NAMA</th>
                                        <th>BIL. HARI LEWAT</th>
                                    </tr>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>AHMAD MUSTAKIM</td>
                                        <td>6</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
