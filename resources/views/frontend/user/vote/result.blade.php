@extends('frontend.user.layouts.app')

@section('title', 'Result')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-3">
                        <div class="">
                            <h1 class="text-center">Result</h1>

                            <div class="ml-md-5 ml-sm-0">
                                <p>Participant Name:<b class="ml-2">{{ $card->user->name }}</b> </p>
                                <p>NRIC / Unique ID : <b class="ml-2 text-info">{{ $card->user->unique_id }}</b></p>
                                <p>Campaign Name:<b class="ml-2">{{ $campaign->name }}</b> </p>
                                <p>Draw Date:<b class="ml-2">{{ $card->draw_on }}0</b></p>
                                <p>Card Unique Number:<b class="ml-2">{{ $card->uc_number }}</b></p>
                                <p>Result :</p>
                                <div class="text-center">

                                    @if($card->is_won)
                                    <h4 class="text-success">Tahniah!</h4>
                                    <h3 class="text-success font-weight-bold">{{ $card->prize }}</h3>
                                    @else
                                        <h3 class="text-dark font-weight-bold">{{ $card->prize }}</h3>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="center m-3">
                            @if($left > 0)
                                <a href="{{ route('frontend.user.vote.now', $campaign->code) }}" class="btn btn-success">Pick Card ({{ $left }} left)</a>
                            @endif
                            <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-dark float-right">BACK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
