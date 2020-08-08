@extends('frontend.user.layouts.app')

@section('title', 'Rules')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-3">
                        <div class="">
                            <h1 class="text-center">Rules & Regulation</h1>

                            <p class="text-danger"><i class="fa fa-exclamation-triangle mr-2"></i>Please read Rules and Regulation carefully! </p>

                            {{ $campaign->term }}

                            <div class="m-3">
                                By clicking 'AGREE' button you agree to this <b>Campaign Rules & Regulation</b>.
                            </div>
                        </div>

                        <div class="center m-3">
                            <a href="{{ route('frontend.user.vote.now', $campaign->code) }}" class="btn btn-block btn-success">AGREE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
