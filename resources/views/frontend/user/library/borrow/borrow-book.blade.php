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

                        <div class="table-responsive">
                            <table class="table table-striped table-valign-middle mt-5">
                                <thead>
                                <tr>
                                    <th>No Perolehan</th>
                                    <th>Title</th>
                                    <th>Publisher / Author</th>
                                    <th>Type</th>
                                    <th>More</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>3003202</td>
                                    <td>Ali Baba Bujang Lapok</td>
                                    <td><b>Pelangi Sdn. Bhd</b> <small><br>Mohd. Syar Abdullah</small>  </td>
                                    <td><b>401 Bahasa</b>-Linguistik</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" onclick="return confirm('Are you user want to remove this book?')">
                                            <i class="fas fa-times"></i> Remove
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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

                        </div>

                        <div class="text-center">
                            <h4 class="text-success font-weight-bold m-4">Return before :  18 August 2020</h4>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-success btn-lg">Proceed</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
