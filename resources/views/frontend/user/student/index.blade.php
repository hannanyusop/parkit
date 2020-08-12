@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <a href="{{ route('frontend.user.student.add') }}" class="btn btn-info"><i class="fa fa-plus"></i>Daftar Pelajar</a>
                <form method="get" class="form-horizontal">
                    <div class="card-body">

                        <h4 class="text-center mb-4">Carian Pelajar</h4>
                        <div class="input-group input-group-lg  col-md-6 offset-md-3">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">Carian</button>
                              </span>
                        </div>

                    </div>
                </form>

                <div class="card-body">

                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
