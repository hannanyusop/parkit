@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" placeholder="Scan Barcode / Insert 'No Perolehan'" autofocus>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-barcode"></i> Search</button>
                                </span>
                            </div>
                        </div>

                        <div class="m-5">
                            <h4 class="font-weight-bold mb-3">Student Information</h4>
                            <dl class="row">
                                <dt class="col-sm-4">Name</dt>
                                <dd class="col-sm-8">ABDUL HANNAN BIN YUSOP</dd>

                                <dt class="col-sm-4">NRIC/Unique ID</dt>
                                <dd class="col-sm-8">960516131111</dd>

                                <dt class="col-sm-4">CLASS</dt>
                                <dd class="col-sm-8">4 SAINS 2</dd>
                            </dl>

                            <h4 class="font-weight-bold mb-3">Book Information</h4>
                            <dl class="row">
                                <dt class="col-sm-4">Title</dt>
                                <dd class="col-sm-8">AMZING WORLD</dd>

                                <dt class="col-sm-4">Group/Genre</dt>
                                <dd class="col-sm-8"><b>520</b> - Astronomi (SAINS TULEN)</dd>

                                <dt class="col-sm-4">Shelves/Section</dt>
                                <dd class="col-sm-8">2 - 1</dd>

                            </dl>

                            <h4 class="font-weight-bold mb-3">Borrow Information</h4>
                            <dl class="row">
                                <dt class="col-sm-4">Borrowed On</dt>
                                <dd class="col-sm-8">1 August 2020 </dd>

                                <dt class="col-sm-4">Staff In charge</dt>
                                <dd class="col-sm-8">MOHD. KHAIRI AZIM</dd>

                                <dt class="col-sm-4">Return Before</dt>
                                <dd class="col-sm-8">7 August 2020 </dd>

                                <dt class="col-sm-4">Late (Day)</dt>
                                <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">2</h3></dd>

                                <dt class="col-sm-4">Amount Of Fine</dt>
                                <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">RM0.40</h3></dd>
                            </dl>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger btn-lg">Proceed</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
