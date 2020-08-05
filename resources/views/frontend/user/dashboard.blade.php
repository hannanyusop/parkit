@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">System To Use</h3>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="card card-widget">
                            <div class="card-body">
                                <img class="img-fluid pad" src="{{ asset('img/sys-logo/poll.jpg') }}" alt="Photo">
                                <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-success btn-block btn-lg mt-5">POLL-i</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
