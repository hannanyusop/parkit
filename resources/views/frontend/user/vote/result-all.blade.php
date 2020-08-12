@extends('frontend.user.layouts.app')

@section('title', 'Full Result')

@section('content')
    <section class="content">
        <div class="col-md-12">
            <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-dark float-left"><i class="fa fa-chevron-left ml-2"></i> BACK</a>

            <h1 class="text-center text-success">Congratulations!</h1>
                <h5 class="text-center text-success">{{ $campaign->name }}</h5>
            <hr>
            <div class="row text-center">
                @foreach($card_win as $key => $card)
                    <div class="{{ ($card_win->count() <= 1 )? "col-md-12" : "col-md-4 col-sm-6"}}">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class=" mb-3">
                                    <h1 class="text-center"><i class="fa fa-trophy"></i> #{{ $key+1 }}</h1>

                                    <div class="ml-md-5 ml-sm-0">
                                        <h4><b class="ml-2">{{ $card->user->name }}</b> </h4>
                                        <h5>{{ hideString($card->user->unique_id,4, 'X') }}</h5>
                                        <div class="text-center">
                                            <p>Prize :</p>
                                            <h3 class="text-warning font-weight-bold">{{ $card->prize }}</h3>
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
