@extends('frontend.user.layouts.app')

@section('title', 'Library / Late List')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

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
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
