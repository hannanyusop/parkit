@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-handshake"></i> </h3>

                                        <p>Borrow & Return</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-book"></i> </h3>

                                        <p>Manage Book</p>
                                    </div>
                                    <a href="{{ route('frontend.user.library.admin.book.index') }}" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-chart-area"></i> </h3>

                                        <p>Data Report</p>
                                    </div>
                                    <a href="#" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark">
                                    <div class="inner text-center">
                                        <h3><i class="fa fa-cogs"></i> </h3>

                                        <p>Library Settings</p>
                                    </div>
                                    <a href="#" class="small-box-footer">Go <i class="fas fa-arrow-circle-right"></i></a>
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
                            <h5 class="mb-2">Important Information</h5>
                            <hr><br>
                        </div>

                        <div class="row">
                            sdsdf
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
