@extends('frontend.user.layouts.app')

@section('title', 'Join Campaign')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">Join Campaign</h3>
                </div>

                <x-forms.post :action="route('frontend.user.vote.apply-insert')">
                <div class="card-body">
                    <div class="text-center mb-3">

                        <input class="form-control form-control-lg" type="text" placeholder="CAMPAIGN CODE  EX:GYUDYW73BH">

                        <div class="center m-3">
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </div>
                </div>
                </x-forms.post>
            </div>
        </div>

    </section>
@endsection
