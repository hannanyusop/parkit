@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Log Masuk Pengawas Perpustakaan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <x-forms.post :action="route('frontend.user.library.prefect-login-check')" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <input type="text" name="no_ic" class="form-control" placeholder="Nombor Kad Pengenalan Pengawas Peperiksaan">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Log Masuk</button>
                        </div>
                        <!-- /.card-footer -->
                    </x-forms.post>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
