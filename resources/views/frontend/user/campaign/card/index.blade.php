@extends('frontend.user.layouts.app')

@section('title', 'Manage Card')

@section('content')
    <section class="content">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Card</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-forms.post :action="route('frontend.user.campaign.card.insert', ['campaign_id'])" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="prize" class="col-md-2 col-form-label">Prize/Remark</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="prize" placeholder="prize">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prize" class="col-md-2 col-form-label">Card Prefix</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="clear" name="prefix" value="clear" checked="">
                                        <label for="customRadio2" class="custom-control-label"><i>Clear Field</i></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="no-parking" value="no-parking" name="prefix">
                                        <label for="customRadio1" class="custom-control-label">No Parking</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="parking-lot" value="parking-lot" name="prefix">
                                        <label for="customRadio2" class="custom-control-label">Parking Lot</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duplicate" class="col-md-2 col-form-label">Duplicate</label>
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="duplicate" value="1" placeholder="Duplicate">
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
                        <tr>
                            <th>No.</th>
                            <th>Unique Card Id</th>
                            <th>Prize/Remark</th>
                            <th>Owner</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>FGUWYS72GHJ</td>
                            <td>PARKING LOT 2</td>
                            <td><i>NULL</i></td>
                            <td>
                                <a href="{{ route('frontend.user.campaign.card.edit', ['campaign_id', 'id']) }}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('frontend.user.campaign.card.delete', ['campaign_id', 'id']) }}" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
