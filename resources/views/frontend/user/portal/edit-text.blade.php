@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Bootstrap WYSIHTML5
                            <small>Simple and fast</small>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <x-forms.post :action="route('frontend.user.portal.edit.update-text', [$text->page_id, $text->id])" class="form-horizontal">
                        <div class="card-body pad">
                            <div class="mb-3">
                                <textarea name="text" class="textarea">{{ $text->text }}</textarea>
                            </div>

                            <button class="btn btn-info" type="submit">Kemaskini</button>
                        </div>

                    </x-forms.post>

                </div>
            </div>
            <!-- /.col-->
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endpush
