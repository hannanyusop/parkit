@extends('frontend.user.layouts.app')

@section('title', 'Jana Kehadiran')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'E-Hadir' => route('frontend.user.kehadiran.ct.index'),
    'Jana Kehadiran' => '#'
];
?>
@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <x-forms.post :action="route('frontend.user.kehadiran.insert')" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Nama Program</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-sm-2 col-form-label">Senarai Kelas</label>
                            <div class="col-sm-10 text-primaryh">
                                <select name="class" id="class[]" class="form-control select2" multiple="">
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ (old('class[]') == $class->id)? "checked" : "" }}>{{ $class->generate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hostel" class="col-sm-2 col-form-label">Status Pelajar</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach($hostels as $key => $hostel)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="hostel" value="{{ $key }}" class="selectgroup-input" {{ (old('hostel') == $key)? "checked" : "" }}>
                                            <span class="selectgroup-button">{{ $hostel }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">Jantina</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach($genders as $key => $gender)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="{{ $key }}" class="selectgroup-input" {{ (old('gender') == $key)? "checked" : "" }}>
                                            <span class="selectgroup-button">{{ $gender }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-sm-2 col-form-label">Mula</label>
                            <div class="col-sm-3">
                                <input name="start" id="start" value="{{ old('start') }}" type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-2 col-form-label">Tamat</label>
                            <div class="col-sm-3">
                                <input name="end" id="end" value="{{ old('end') }}" type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Kegunaan</label>
                            <div class="col-sm-10">
                                <div class="selectgroup">
                                    @foreach(getUgaType() as $key => $type)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="{{ $key }}" class="selectgroup-input" {{ (old('type') == $key)? "checked" : "" }}>
                                            <span class="selectgroup-button">{{ $type }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Hantar</button>
                        <a class="btn btn-white" href="{{ route('frontend.user.kehadiran.index') }}">Kembali</a>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')

@endpush

