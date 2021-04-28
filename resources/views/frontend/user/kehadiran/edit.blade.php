@extends('frontend.user.layouts.app')

@section('title', __('Edit Event'))

<?php
$breadcrumbs = [
    __('Dashboard') => route('frontend.user.dashboard'),
    __('Event List') => route('frontend.user.kehadiran.index'),
    $uga->title => route('frontend.user.kehadiran.checkin', encrypt($uga->id)),
    __('Edit') => '#',
];
?>
@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <x-forms.post :action="route('frontend.user.kehadiran.update', encrypt($uga->id))" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">{{ __('Event Name') }}</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{ (old('title'))? old('title') : ($uga->title) }}" type="text" class="form-control" id="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-sm-2 col-form-label">{{ __('Start Date/Time') }}</label>
                            <div class="col-sm-3">
                                <input name="start" id="start" value="{{ (old('start'))? old('start') : ($uga->start) }}" type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-2 col-form-label">{{ __('End Date/Time') }}</label>
                            <div class="col-sm-3">
                                <input name="end" id="end" value="{{ (old('end'))? old('end') : ($uga->end) }}" type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">{{ __('For') }}</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach(getUgaType() as $key => $type)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="{{ $key }}" class="selectgroup-input" {{ ($uga->type == $key)? "checked" : "" }} required>
                                            <span class="selectgroup-button">{{ $type }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">{{ __('Attendance Type') }}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="is_checkout" class="custom-switch-input" {{ ($uga->is_checkout == 0)? "checked" : "" }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ __('Check-in Only') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">{{ __('Delete event') }}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <button type="button" data-url="{{ route('frontend.user.kehadiran.delete', encrypt($uga->id)) }}" data-delete="{{ __('Are you sure you want to dispose of this attendance data?') }}" class="btn btn-danger btn-sm mb-2">{{ __('Delete this attendance & related data') }}</button>
                                    <br><small>{{ __('Data cannot be accessed again after disposal.') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a class="btn btn-white" href="{{ route('frontend.user.kehadiran.checkin', encrypt($uga->id)) }}">{{ __('Back') }}</a>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        $("input[type='checkbox'].all").each(function(){
            $(this).click(function(){
                var form_id = $(this).data("form");

                if($(this).is(":checked")){
                    $("#group-"+form_id).hide();
                }else{
                    $("#group-"+form_id).show();

                }
            })
        })
    </script>

@endpush

