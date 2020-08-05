@extends('frontend.user.layouts.app')

@section('title', 'Change Participant Attempt')

@push('after-styles')
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Change Participant Attempt Value</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-forms.post :action="route('frontend.user.campaign.participant.change-attempt-save', [$join->campaign_id, $join->user_id])" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="particpant_name" class="col-sm-2 col-form-label">Participant Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="participant_name" class="form-control" id="participant_name" value="{{ $join->user->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="participant_unique_id" class="col-sm-2 col-form-label">Participant NRIC/Unique ID</label>
                            <div class="col-sm-6">
                                <input type="text" name="participant_unique_id" class="form-control" id="participant_unique_id" value="{{ $join->user->unique_id }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attempt" class="col-sm-2 col-form-label">Attempt(s)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="attempt" id="attempt" value="{{ $join->attempt }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update Participant Attempt</button>
                        <a href="{{ route('frontend.user.campaign.view', $join->campaign_id) }}" class="btn btn-outline-info">Back</a>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')

@endpush
