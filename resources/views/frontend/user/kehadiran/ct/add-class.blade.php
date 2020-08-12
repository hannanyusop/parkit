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
                                <label for="form" class="col-sm-2 col-form-label">Tingkatan</label>
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
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                        <a href="{{ route('frontend.user.kehadiran.ct.index') }}" type="submit" class="btn btn-warning"> Kembali</a>
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
                                    <th>Kelas</th>
                                    <th>Guru Kelas</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($classes->count() > 0)
                                    @foreach($classes as $key => $class)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $class->genrate_name }}</td>
                                            <td>HAFIZ HASRIN</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center font-weight-bold text-info">Tiada kelas didaftarkan bagi tingkatan ini.</td>
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
                                    <label for="name" class="col-sm-4 col-form-label">Name Kelas</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="name" name="name" class="form-control text-uppercase" placeholder="Ex:Al-Biruni">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Nama Unik Kelas</label>
                                    <div class="col-sm-6">
                                        <h4 class="text-success font-weight-bold" id="generate"></h4>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success"> Tambah Kelas </button>
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