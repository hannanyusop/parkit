@extends('frontend.user.layouts.app')

@section('title', 'My Campaign List')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="mt-2 float-right">
                        <a href="{{ route('frontend.user.campaign.edit', $campaign->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit Campaign</a>
                        <a href="{{ route('frontend.user.campaign.card.index', $campaign->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-ticket-alt"></i> Manage Card</a>
                        <a href="{{ route('frontend.user.campaign.participant.invite-search', [$campaign->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i> Invite Participant</a>
                    </div>

                    <h3>Campaign Details</h3><br>


                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $campaign->cardsUsed->count() }}/{{ $campaign->cards->count() }}</h3>
                                    <p>Total Card Used</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-person-booth"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $campaign->cardsWonOwned->count() }}/{{ $campaign->cardsWon->count() }}</h3>

                                    <p>Prize Won</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-award"></i>
                                </div>
                            </div>
                        </div>

                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $campaign->participantsTakePart->count() }}/{{ $campaign->participants->count() }}</h3>

                                    <p>Take Part/Registered</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $campaign->pendingApplicants->count() }}</h3>

                                    <p>Pending Participant</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-5">
                        <p>Campaign Name:<b class="ml-2">{{ $campaign->name }}</b> </p>
                        <p>Campaign Code:<b class="ml-2">{{ $campaign->code }}</b> </p>
                        <p>Campaign Date:<b class="ml-2">{{ $campaign->start }} to {{ $campaign->end }}</b></p>
                        <p>Status: <b class="ml-2">{!! badgeCampaignStatus($campaign->status) !!}</b></p>
                        <p>Target Participation :<small class="text-info"><i class="fa fa-user ml-1"></i> {{ $campaign->target_participation }} </small></p>

                    </div>
                    <hr>
                    <h3 class="mt-5">Participant List</h3><br>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Name</th>
                                <th>NRIC / Unique ID</th>
                                <th>Status</th>
                                <th>Attempt(s)</th>
                                <th>UC Number</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($campaign->participantsActive as $key => $active)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $active->user->name }}</td>
                                    <td>{{ $active->user->unique_id }}</td>
                                    <td>
                                        @if($active->user->cardUsed($campaign->id)->count() == 0)
                                            <span class="badge bg-dark">Not Yet</span>
                                        @elseif($active->attemp < $active->user->cardUsed($campaign->id)->count())
                                            <span class="badge bg-info">On going</span>
                                        @else
                                            <span class="badge bg-success">Completed</span>
                                        @endif

                                    </td>
                                    <td>{{ $active->user->cardUsed($campaign->id)->count() }}/{{ $active->attempt }}</td>
                                    <td>
                                        @foreach($active->user->cardUsed($campaign->id) as $card)
                                            {{ $card->price }} <br><small class="font-weight-bold">{{ $card->code }}</small>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('frontend.user.campaign.participant.change-attempt', [$campaign->id, $active->user->id]) }}" class="btn btn-success btn-xs">Change Attempt Value</a>
                                        <a href="{{ route('frontend.user.campaign.participant.dismiss', [$campaign->id, $active->user->id]) }}" onclick="return confirm('Are you sure want to remove this participant?')"  class="btn btn-warning btn-xs">Dismiss</a>
                                        <a href="{{ route('frontend.user.campaign.participant.vote-reset', [$campaign->id, $active->user->id]) }}" onclick="return confirm('Are you sure want to reset this participant\'s vote?')" class="btn btn-danger btn-xs">Reset Vote</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <h3 class="mt-5">Applicant List</h3><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Name</th>
                            <th>NRIC / Unique ID</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campaign->pendingApplicants as $key => $pending)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $pending->user->name }}</td>
                            <td>{{ $pending->user->unique_id }}</td>
                            <td>{{ $pending->user->email }}</td>
                            <td>
                                <a href="{{ route('frontend.user.campaign.participant.approve', [$campaign->id, $pending->user->id]) }}"
                                   onclick="return confirm('Are you sure want to approve {{ $pending->user->name }} to join this campaign? ')"
                                   class="btn btn-success btn-xs">Approve</a>
                                <a href="{{ route('frontend.user.campaign.participant.approve', [$campaign->id, $pending->user->id]) }}"
                                   onclick="return confirm('Are you sure want to decline  {{ $pending->user->name }}? ')"
                                   class="btn btn-danger btn-xs">Decline</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
