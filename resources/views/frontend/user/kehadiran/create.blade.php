@extends('frontend.user.layouts.app')

@section('title', __('Organize New Event'))

<?php
$breadcrumbs = [
    __('Dashboard') => route('frontend.user.dashboard'),
    __('Event List') => route('frontend.user.kehadiran.index'),
    __('Organize New Event') => '#'
];
?>
@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <x-forms.post :action="route('frontend.user.kehadiran.insert')" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">{{ __('Event Name') }}</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-sm-2 col-form-label">{{ __('List Of Class') }}</label>
                            <div class="col-sm-10">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>{{ __('Form') }}</th>
                                            <th>{{ __('Class List') }}</th>
                                        </tr>
                                        @foreach(formList() as $form => $formName)
                                            <tr>
                                                <td class="font-weight-bold">{{ $formName }}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <input class="all form-check-input" name="form[{{ $form }}]" type="checkbox" data-form="{{ $form }}" id="all-{{ $form }}" value="{{ $form }}">
                                                            <label class="form-check-label" for="all-{{ $form }}">{{ __('All') }}</label>
                                                        </div>
                                                        <div id="group-{{ $form }}">
                                                            @foreach(getFormClass($form) as $class)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form form-check-input form-{{ $form }}" data-form="{{ $form }}" name="class[{{ $form }}][]" type="checkbox" id="form-{{ $class->id }}" value="{{ $class->id }}">
                                                                    <label class="form-check-label" for="class-{{ $class->id }}">{{ strtoupper($class->generate_name) }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                            <div class="col-sm-4">
                                <select id="category" name="category" class="form-control" required>
                                    @foreach(getEventCategory() as $key => $category)
                                        <option value="{{ $key }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hostel" class="col-sm-2 col-form-label">{{ __('Student Status') }}</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach(getHostels() as $key => $hostel)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="hostel" value="{{ $key }}" class="selectgroup-input" {{ (old('hostel') == $key)? "checked" : "" }} required>
                                            <span class="selectgroup-button">{{ $hostel }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach(getGender() as $key => $gender)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="{{ $key }}" class="selectgroup-input" {{ (old('gender') == $key)? "checked" : "" }} required>
                                            <span class="selectgroup-button">{{ $gender }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-sm-2 col-form-label">{{ __('Start Date/Time') }}</label>
                            <div class="col-sm-3">
                                <input name="start" id="start" value="{{ old('start') }}" type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-2 col-form-label">{{ __('End Date/Time') }}</label>
                            <div class="col-sm-3">
                                <input name="end" id="end" value="{{ old('end') }}" type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">{{ __('For') }}</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach(getUgaType() as $key => $type)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="{{ $key }}" class="selectgroup-input" {{ (old('type') == $key)? "checked" : "" }} required>
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
                                        <input type="checkbox" name="is_checkout" class="custom-switch-input" {{ (old('is_checkout'))? "checked" : "" }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ __('Check-in Only') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Create Event') }}</button>
                        <a class="btn btn-white" href="{{ route('frontend.user.kehadiran.index') }}">{{ __('Back') }}</a>
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

