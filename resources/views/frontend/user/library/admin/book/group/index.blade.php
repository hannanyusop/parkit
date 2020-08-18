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
                        <h4 class="m-4 text-center">Jumlah Buku Mengikut Pengkelasan Dewey</h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-success">
                                <th></th>
                                <th>Pengkelasan Kedua</th>
                                <th>Pengkelasan Pertama</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subGroups as $key => $sub)
                            <tr class="{{ ($sub->books->count() ==  0)? 'bg-dark' : 'bg-white' }}" >
                                <td>{{ $key+1 }}</td>
                                <td><b>{!! $sub->code."</b> ".$sub->name !!}</td>
                                <td><b>{!! $sub->parent->code."</b> ".$sub->parent->name !!}</td>
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
