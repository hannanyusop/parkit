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
                    <div class="card-body text-center">
                        <h5 class="mb-4">Peminjaman Buku</h5>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-info"></i> Notis Peminjaman Buku</h4>
                            Mohon Maaf, Peminjaman buku tidak dibenarkan pada masa ini.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
