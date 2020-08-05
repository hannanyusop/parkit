@extends('frontend.user.layouts.app')

@section('title', 'Vote')

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Campaign List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">

                    <div class="ml-4 mt-2">
                       <p>
                           <i class="fa fa-vote-yea text-gray-dark"></i> Not Yet
                            <i class="fa fa-vote-yea text-danger ml-3"></i> No Prize
                        <i class="fa fa-vote-yea text-success ml-3"></i> Prize
                       </p>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Campaign Name</th>
                                <th class="text-center">Campaign Status</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Attempt(s)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($joins as $key => $join)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $join->campaign->name }}</td>
                                    <td class="text-center">{!! badgeCampaignStatus($join->campaign->id) !!}</td>
                                    <td class="text-center">

                                        @if($join->approve == 0 && $join->invited == 0)
                                            <span class="badge bg-dark">Waiting For Approval</span>
                                        @else

                                            @if($join->user->cardUsed($join->campaign->id)->count() == 0)
                                                <span class="badge bg-dark">Not Yet</span>
                                            @elseif($join->attemp < $join->user->cardUsed($join->campaign->id)->count())
                                                <span class="badge bg-info">On going</span>
                                            @else
                                                <span class="badge bg-success">Completed</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @foreach($join->cards($join->campaign_id) as $result)
                                            <a href="{{ route('frontend.user.vote.result', [$join->campaign->code, $result->uc_number]) }}">
                                                @if($result->is_won == 1)
                                                    <i class="fa fa-vote-yea text-success"></i>
                                                @else
                                                    <i class="fa fa-vote-yea text-danger"></i>
                                                @endif
                                            </a>
                                        @endforeach
                                        <?php $balance =  $join->attempt - $join->cards($join->campaign_id)->count(); $ny = $balance; ?>
                                        @while($ny != 0)
                                            <i class="fa fa-vote-yea text-gray-dark"></i>
                                            <?php $ny-- ?>
                                        @endwhile

                                    </td>
                                    <td>
                                        @if($balance > 0)
                                            @if($join->approve != 0 || $join->invited != 0)
                                                <a href="{{ route('frontend.user.vote.rules', $join->campaign->code) }}" class="btn btn-success btn-xs">Vote Now</a>
                                            @endif
                                        @endif
                                        @if($balance < $join->attempt)
                                            <a href="{{ route('frontend.user.vote.result-full', $join->campaign->code) }}" class="btn btn-info btn-xs">View Full Result</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
