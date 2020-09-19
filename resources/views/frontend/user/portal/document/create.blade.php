@extends('frontend.user.layouts.app')

@section('title', 'Tambah Dokumen')

<?php
    $breadcrumbs = [
        'Dashboard' => route('frontend.user.dashboard'),
        'Pengurusan Portal' => route('frontend.user.portal.index'),
        'Dokumen' => route('frontend.user.portal.document.index'),
        'Tambah' => '#',
    ];
?>
@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <x-forms.post :action="route('frontend.user.portal.document.insert')" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="select2" name="group" id="group">
                                    @foreach(portalGetDocumentGroup() as $key => $group)
                                        <option value="{{ $key }}">{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tajuk</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_show" class="col-sm-2 col-form-label">Papar</label>
                            <div class="col-sm-10">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="is_show" id="is_show" value="1" class="custom-switch-input" {{ (old('is_show') == 1)? "checked" : "" }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Papar Pengunguman</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-label">Dokumen</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control"  name="file" id="file">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Huraian</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" rows="10">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Hantar</button>
                        <a class="btn btn-white" href="{{ route('frontend.user.portal.document.index') }}">Kembali</a>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')

@endpush

