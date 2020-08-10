@extends('frontend.user.layouts.app')

@section('title', 'Classroom Teacher')

@push('after-styles')
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-body">

                    <form method="get">
                        <div class="m-2">
                            <div class="form-group row">
                                <label for="form" class="col-sm-2 col-form-label">Form</label>
                                <div class="col-sm-10">
                                    <select id="form" name="form" class="form-control" {{ (request()->has('form'))? "disabled='true'" : "" }}>
                                        @foreach(getForm() as $form)
                                            <option value="{{ $form }}">{{ $form }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    @if(request()->has('form'))
                                    @else
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                                        <a href="{{ route('frontend.user.kehadiran.ct.index') }}" type="submit" class="btn btn-warning"> Back</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        @if(!is_null($classes))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Class</th>
                                    <th>Monitor By</th>
                                    <th>Today Attendance</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($classes->count() > 0)
                                    @foreach($classes as $key => $class)
                                        <tr>
                                            <td>1.</td>
                                            <td>6 ATAS</td>
                                            <td>HAFIZ HASRIN</td>
                                            <td><b>22/24</b></td>
                                            <td><a href="#" class="btn btn-info btn-xs">View</a> </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center font-weight-bold text-info">No Class Registered For This Form</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

            @if(request()->has('form'))
                <div class="card card-info">
                    <div class="card-body">

                        <form method="get">
                            <div class="m-2">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Class Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="name" name="name" class="form-control text-uppercase" placeholder="Ex:Al-Biruni">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Generated Name</label>
                                    <div class="col-sm-6">
                                        <h4 class="text-success font-weight-bold" id="generate"></h4>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success"> Add Class </button>
                                        <a href="{{ route('frontend.user.kehadiran.ct.add-class') }}" type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        $("#name").keyup(function () {
            f = $("#form").val();
            r = f+" "+$(this).val();
            $("#generate").text(r.toUpperCase());
        });
    </script>
@endpush
