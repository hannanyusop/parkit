@extends('frontend.user.layouts.app')

@section('title', 'Manage Card')

@section('content')
    <section class="content">
        <div class="col-md-6 offset-md-3">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Card</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-forms.post :action="route('frontend.user.campaign.card.update', [$campaign->id, $card->id])" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="prize" class="col-md-2 col-form-label">Prize/Remark</label>
                            <div class="col-md-6">
                                <input name="prize" type="text" class="form-control" id="prize" placeholder="prize" value="{{ $card->prize }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prize" class="col-md-2 col-form-label">Special Card</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="0" name="won" value="0" {{ ($card->is_won == 0)? "checked='true'" : "" }}>
                                        <label for="0" class="custom-control-label"><i>No</i></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="1" value="1" name="won" {{ ($card->is_won == 1)? "checked='true'" : "" }}>
                                        <label for="1" class="custom-control-label">Yes</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update Card</button>
                        <a href="{{ route('frontend.user.campaign.card.index', $campaign->id) }}" class="btn btn-info float-right">Back</a>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
