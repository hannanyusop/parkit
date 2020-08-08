@extends('frontend.user.layouts.app')

@section('title', 'Edit Campaign')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Update Campaign</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-forms.post :action="route('frontend.user.campaign.update', $campaign->id)" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Campaign Name</label>
                            <div class="col-sm-10">
                                <input value="{{ $campaign->name }}" name="name" type="text" class="form-control text-uppercase" id="name" placeholder="EX: EVENT POLL 2020">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Campaign Code</label>
                            <div class="col-sm-6">
                                <input name="code" type="text" class="form-control text-uppercase" id="code" value="{{ $campaign->code }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="target_participation" class="col-sm-2 col-form-label">Target Participation</label>
                            <div class="col-sm-6">
                                <input value="{{ $campaign->target_participation }}" type="number" value="1" class="form-control" name="target_participation" id="target_participation" placeholder="EX:10">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="default_attempt" class="col-sm-2 col-form-label">Default Attempt</label>
                            <div class="col-sm-6">
                                <input value="{{ $campaign->default_attempt }}" type="number" value="1" class="form-control" name="default_attempt" id="default_attempt" placeholder="EX:10">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Start Datetime</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input value="{{ $datetime }}" name="datetime" type="text" class="form-control float-right" id="campaigndatetime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update Campaign</button>
                        <a href="{{ route('frontend.user.campaign.index') }}" class="btn btn-primary float-right">Back </a>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(function () {
            $('#campaigndatetime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'YYYY/MM/DD HH:mm'
                }
            })

        })
    </script>
@endpush
