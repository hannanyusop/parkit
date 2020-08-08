@extends('frontend.user.layouts.app')

@section('title', 'Campaign List')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Campaign List</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Campaign Name</th>
                            <th>Date (Start - End)</th>
                            <th>Status</th>
                            <th>Target Participant</th>
                            <th>Actual (Take Part / Registered)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campaigns as $campaign)
                            <tr>
                                <td>1</td>
                                <td>
                                    {{ $campaign->name }}<br>
                                    <small>CODE: {{ $campaign->code }} <i class="text-info fa fa-link"></i> </small>
                                </td>
                                <td>{{ $campaign->start }}  <br> {{ $campaign->end }}</td>
                                <td class="text-center">{!! badgeCampaignStatus($campaign->status) !!}</td>
                                <td class="text-center"><small class="text-info"><i class="fa fa-user"></i> {{ $campaign->target_participation }} </small></td>
                                <td class="text-center">{{ $campaign->participantsTakePart->count() }}/{{ $campaign->participants->count() }}</td>
                                <td>
                                    <a href="{{ route('frontend.user.campaign.view', $campaign->id) }}" class="btn btn-success btn-xs">View </a>
                                    <a href="{{ route('frontend.user.campaign.edit', $campaign->id) }}" class="btn btn-primary btn-xs">Edit </a>
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
