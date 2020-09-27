@extends('backend.layouts.app')

@section('title', 'Import Data Pelajar')

@section('content')
    <section class="content">
        <div class="col-md-12">
            @include('backend.student.layout.topbar')
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <x-forms.post :action="route('admin.student.upload')" class="form-horizontal"  enctype="multipart/form-data"  id="reset">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Dokumen</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="file">Pilih</label>
                                </div>
                                <span class="font-13 text-muted">Sila rujuk panduan sebelum memuatnaik data</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="year" id="year">
                                        @foreach($years as $year)
                                            <option value="{{ $year }}" {{ (old('year') == $year)? "checked" : "" }}>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="font-13 text-muted">Sila rujuk panduan sebelum memuatnaik data</span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Hantar</button>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>

            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#reset").on("submit", function(){
                $("#pageloader").fadeIn();
            });//submit
        });//document ready
    </script>
@endpush

