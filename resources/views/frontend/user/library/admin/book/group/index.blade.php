@extends('frontend.user.layouts.app')

@section('title', 'Library / Book / Group')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.admin.book.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Book Title">
                            </div>
                            <div class="col-4">
                                <select class="form-control">
                                    <option>BOOK TYPE</option>
                                    <optgroup label="BAHASA">
                                        <option value="">Linguistik</option>
                                        <option value="">Bahasa Lain</option>
                                    </optgroup>
                                    <optgroup label="TEKNOLOGI">
                                        <option value="">Perubatan</option>
                                        <option value="">Kejuruteraan</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-control">
                                    <option>SELECT STATUS</option>
                                    <option>Active</option>
                                    <option>Borrowed</option>
                                    <option>Disposed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card">
                    <div class="card-header border-0">
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Publisher / Author</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Ali Baba Bujang Lapok</td>
                                <td><b>Pelangi Sdn. Bhd</b> <small><br>Mohd. Syar Abdullah</small>  </td>
                                <td><b>401 Bahasa</b>-Linguistik</td>
                                <td><span class="badge badge-dark">Disposed</span> </td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
