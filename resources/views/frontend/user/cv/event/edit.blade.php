@extends('frontend.user.layouts.app')

@section('title', 'Update Event')

@push('after-styles')
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Update Event</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-forms.post :action="route('frontend.user.cv.event.edit', $event->id)" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input  value="{{ $event->name }}" name="name" type="text" class="form-control text-uppercase" id="name" placeholder="KEDATANGAN PAGI">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                        <a href="{{ route('frontend.user.cv.event.index') }}" class="btn btn-dark">Back</a>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
@endpush
