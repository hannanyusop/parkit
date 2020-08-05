@extends('frontend.user.layouts.app')

@section('title', 'Invite')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">Invite Participant</h3>
                    <div class="float-right">
                        <a href="{{ route('frontend.user.campaign.view', $campaign_id) }}">Back</a>
                    </div>
                </div>

                <x-forms.get :action="route('frontend.user.campaign.participant.invite-search', $campaign_id)">
                <div class="card-body">
                    <div class="text-center mb-3">

                        <div class="input-group input-group-lg">
                            <input name="unique_id" type="text" value="{{ request('unique_id') }}" class="form-control" required>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-flat">Search!</button>
                            </span>
                        </div>
                        <span><small class="text-success font-weight-bold">You may use Email/Unique ID/Name of user</small></span>
                    </div>

                    @if(!is_null($users))
                        <div class="m-2">
                        <p>{{ $users->count() }} Result(s) found for 'AMAR'</p>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NAME</th>
                                <th>NRIC / Unique ID</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr class="bg-gray-light">
                                    <td style="width: 10px">{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->unique_id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->isJoined($campaign_id))
                                            @if($user->isJoined($campaign_id)->invited == 1)
                                                <span class="badge badge-success">Invited</span>
                                            @elseif(($user->isJoined($campaign_id)->approve == 1))
                                                <span class="badge badge-info">Approved</span>
                                            @else
                                                <span class="badge badge-dark">Waiting For Approval</span>
                                            @endif
                                        @else
                                            <a href="{{ route('frontend.user.campaign.participant.invite', [$campaign_id, $user->id]) }}" onclick="return confirm('Are you sure want to invite this user?')" class="btn btn-success btn-sm"><i class="fa fa-plus ml-1"></i> Add</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                </x-forms.get>
            </div>
        </div>

    </section>
@endsection
