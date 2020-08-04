@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Campaign List</h3>
                </div>
                <!-- /.card-header -->

                <x-forms.post :action="route('frontend.user.vote.check', 'SMKALPARK2020')">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="col-md-6 offset-md-3">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>FIU8GYUS0LA</h3>

                                    <p>CARD UNIQUE NUMBER</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-id-card-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    SHUFFLE COUNT : <b>7</b>
                                </a>
                            </div>

                            <p class="font-weight-bold">Card Left(s): 11</p>
                        </div>

                        <div class="center m-3">
                            <button class="btn btn-warning">SHUFFLE CARD</button>
                            <button type="submit" class="btn btn-success">PICK CARD</button>
                        </div>
                    </div>
                </div>
                </x-forms.post>
            </div>
        </div>

    </section>
@endsection
