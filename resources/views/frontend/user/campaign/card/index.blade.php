@extends('frontend.user.layouts.app')

@section('title', 'Manage Card')

@section('content')
    <section class="content">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Card</h3>
                    <a href="{{ route('frontend.user.campaign.view', $campaign->id) }}" class="btn btn-outline-info btn-sm float-right">Back</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-forms.post :action="route('frontend.user.campaign.card.insert', $campaign->id)" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="prize" class="col-md-2 col-form-label">Prize/Remark</label>
                            <div class="col-md-6">
                                <input name="prize" type="text" class="form-control" id="prize" placeholder="prize">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prize" class="col-md-2 col-form-label">Special Card</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="0" name="won" value="0" checked="">
                                        <label for="0" class="custom-control-label"><i>No</i></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="1" value="1" name="won">
                                        <label for="1" class="custom-control-label">Yes</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duplicate" class="col-md-2 col-form-label">Duplicate</label>
                            <div class="col-md-3">
                                <input type="number" name="duplicate" class="form-control" id="duplicate" value="1" placeholder="Duplicate">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Generate Card</button>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Campaign Card ({{ request('campaign_id') }})</h3>

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
                        <tr >
                            <th>No.</th>
                            <th>Unique Card Id</th>
                            <th>Prize/Remark</th>
                            <th class="text-center">Special Card</th>
                            <th>Drown By</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cards as $key => $card)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $card->uc_number }}</td>
                                <td>{{ $card->prize }}</td>
                                <td class="text-center">
                                    @if($card->is_won == 1)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-dark">No</span>
                                    @endif
                                </td>
                                <td>{{ (!is_null($card->user_id))? $card->user->name : "" }}</td>
                                <td>
                                    <a href="{{ route('frontend.user.campaign.card.edit', [$campaign->id, $card->id]) }}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('frontend.user.campaign.card.delete', [$campaign->id, $card->id]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want delete this card!')"> <i class="fa fa-trash"></i> Delete</a>

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
