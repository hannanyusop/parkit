@extends('frontend.user.layouts.app')

@section('title', 'Library / Book / Group')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.admin.book.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body table-responsive">

                        <h6>Tambah Dewey</h6>
                        <x-forms.post :action="route('frontend.user.library.admin.book.group.insert')" class="form-inline" enctype="multipart/form-data">
                            <label class="sr-only" for="first_dewey">Kelas Pertama</label>
                            <select name="first_dewey" class="form-control mb-2 mr-sm-2 col-lg-4" id="first_dewey">
                                @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ (old('first_dewey') == $parent->id)? "selected" : "" }}>{{ $parent->code."-".$parent->name }}</option>
                                @endforeach
                            </select>

                            <label class="sr-only" for="dewey_code">Kod Dewey</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input name="dewey_code" type="number" step=".0001" class="form-control" id="dewey_code" value="{{ old('dewey_code') }}" placeholder="Cth:220" required>
                            </div>
                            <label class="sr-only" for="dewey_name">Nama Pengekelasan</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input name="dewey_name" type="text" class="form-control" id="dewey_name" value="{{ old('dewey_name') }}" placeholder="Nama Pengkelasan" required>
                            </div>
                            <input type="submit" class="btn btn-primary mb-2 mr-sm-2" value="Tambah">
                        </x-forms.post>

                        <h4 class="m-4 text-center">Jumlah Buku Mengikut Pengkelasan Dewey</h4>
                        <table class="table table-bordered" id="datable">
                            <thead>
                            <tr class="">
                                <th></th>
                                <th>Pengkelasan Kedua</th>
                                <th>Pengkelasan Pertama</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subGroups as $key => $sub)
                            <tr class="{{ ($sub->books->count() ==  0)? '' : 'bg-white' }}" >
                                <td>{{ $key+1 }}</td>
                                <td><b>{!! $sub->code."</b> ".$sub->name !!}</b></td>
                                <td><b>{!! $sub->parent->code."</b> ".$sub->parent->name !!}</b></td>
                                <td class="font-weight-bold text-center">{{ $sub->books->count() }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
