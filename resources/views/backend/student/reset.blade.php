@extends('backend.layouts.app')

@section('title', 'Import Data Pelajar')

@section('content')
    <section class="content">
        <div class="col-md-12">
            @include('backend.student.layout.topbar')
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <x-forms.post :action="route('admin.student.reset-now')" class="form-horizontal"  enctype="multipart/form-data" >
                    <div class="card-body">

                        <div class="alert alert-danger">
                            <div class="alert-title">Amaran</div>
                            Semua data pelajar yang aktif akan dinyahaktif dan senarai pelajar kelas juga akan dikosongkan.
                            Anda tidak boleh mengembalikan semula data kepada asal.
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kunci Pengesahan</label>
                            <div class="col-sm-9">
                                <h5 class="text-primary">{{ $key }}</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="key" class="col-sm-3 col-form-label">Kunci Pengesahan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="key" id="key" placeholder="Kunci Pengesahan">
                                <small class="form-text text-muted">Sila masukan semula kunci pengesahan yang disediakan</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Reset</button>
                    </div>
                </x-forms.post>
            </div>

        </div>
    </section>
@endsection

