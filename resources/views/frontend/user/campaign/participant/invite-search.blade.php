@extends('frontend.user.layouts.app')

@section('title', 'Invite')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">Invite Campaign</h3>
                    <div class="float-right">
                        <a href="{{ route('frontend.user.campaign.view', 'campaign_id') }}">Back</a>
                    </div>
                </div>

                <x-forms.get :action="route('frontend.user.vote.apply')">
                <div class="card-body">
                    <div class="text-center mb-3">

                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-success btn-flat">Search!</button>
                            </span>
                        </div>
                    </div>

                    <div class="m-2">
                        <p>2 Result(s) found for 'AMAR'</p>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NAME</th>
                                <th>NRIC / Unique ID</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-gray-light">
                                <td style="width: 10px">1</td>
                                <td>AMAR MUNAJAF</td>
                                <td>01248934559</td>
                                <td><span class="badge badge-info">Registered</span> </td>
                            </tr>
                            <tr>
                                <td style="width: 10px">2</td>
                                <td>AMAR BAHRIN</td>
                                <td>891212141233</td>
                                <td><a href="{{ route('frontend.user.campaign.participant.invite', ['campaign_id', 'participant_id']) }}" class="btn btn-success btn-xs">Invite</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </x-forms.get>
            </div>
        </div>

    </section>
@endsection
