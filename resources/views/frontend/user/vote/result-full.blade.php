@extends('frontend.user.layouts.app')

@section('title', 'Full Result')

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="row mb-3">
                <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-dark float-right"><i class="fa fa-chevron-left ml-2"></i> BACK</a>
            </div>
            <div class="row">
                @foreach($join->cards($join->campaign_id) as $key => $card)
                    <div class="{{ ($join->cards($join->campaign_id)->count() <= 1 )? "col-md-12" : "col-md-6"}}">
                        <div class="card {{ ($card->is_won == 1)? "bg-success" : "bg-dark" }}">
                            <div class="card-body">
                                <div class=" mb-3">
                                    <h1 class="text-center">Result #{{ $key+1 }}</h1>

                                    <div class="ml-md-5 ml-sm-0">
                                        <p>Participant Name:<b class="ml-2">{{ $card->user->name }}</b> </p>
                                        <p>NRIC / Unique ID : <b class="ml-2">{{ $card->user->unique_id }}</b></p>
                                        <p>Campaign Name:<b class="ml-2">{{ $campaign->name }}</b> </p>
                                        <p>Draw Date:<b class="ml-2">{{ $card->draw_on }}0</b></p>
                                        <p>Card Unique Number:<b class="ml-2">{{ $card->uc_number }}</b></p>
                                        <p>Result :</p>
                                        <div class="text-center">

                                            @if($card->is_won)
                                                <h4 class="text-warning">Tahniah!</h4>
                                                <h3 class="text-warning font-weight-bold">{{ $card->prize }}</h3>
                                            @else
                                                <h3 class="text-white font-weight-bold">{{ $card->prize }}</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
