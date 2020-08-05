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

                <x-forms.get :action="route('frontend.user.vote.apply')">
                <div class="card-body">
                    <div class="text-center mb-3">

                        <input name="code" class="form-control form-control-lg" type="text" value="{{ request('code') }}" placeholder="CAMPAIGN CODE  EX:GYUDYW73BH">

                        <div class="center m-3">
                            <button type="submit" class="btn btn-success btn-lg">Search</button>
                        </div>
                    </div>

                    @if(request()->has('code'))

                        @if(!$campaign)
                            <p class="text-center text-danger font-weight-bold">No Campaign found for " {{ request('code') }}"</p>
                        @endif

                        @if(!is_null($campaign))
                            <div class="ml-5">
                                <p>Campaign Name:<b class="ml-2">{{ $campaign->name }}</b> </p>
                                <p>Campaign Code:<b class="ml-2">{{ $campaign->code }}</b> </p>
                                <p>Campaign Date:<b class="ml-2">{{ $campaign->start }} to {{ $campaign->end }}</b></p>
                                <p>Status: <b class="ml-2">{!! badgeCampaignStatus($campaign->status) !!}</b></p>
                                <p>Organized By: <b class="ml-2">{{ $campaign->organizer->name }}</b></p>

                                <a href="{{ route('frontend.user.vote.apply-insert', $campaign->code) }}" class="mt-4 btn-success btn-sm">
                                    <i class="fa fa-vote-yea mr-2"></i> Apply
                                </a>
                            </div>
                            <hr>
                        @endif
                    @endif
                </div>
                </x-forms.get>
            </div>
        </div>

    </section>
@endsection
