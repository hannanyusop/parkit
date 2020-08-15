@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <x-forms.get>
                        <div class="card-body">
                            <h4>Carian Denda</h4>
                            <div class="form-group">
                                <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="NAMA / NO. KAD PENGENALAN">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="">SEMUA JENIS DENDA</option>
                                    @foreach(libFineType() as $key => $status)
                                        <option value="{{ $key }}" {{ (request('status') == $key)? "selected" : "" }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="">STATUS BAYARAN</option>
                                    @foreach(libFineStatus() as $key => $status)
                                        <option value="{{ $key }}" {{ (request('status') == $key)? "selected" : "" }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success">Search</button>
                                <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-warning">Reset</a>
                            </div>
                        </div>
                    </x-forms.get>
                    <!-- /.card-body -->
                </div>
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No. Kad Pengenalan</th>
                                <th>Jenis Denda</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fines as $key => $fine)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $fine->student->name }}</td>
                                <td>{{ $fine->student->no_ic }}</td>
                                <td>{!! badgeLibFineType($fine->type) !!}</td>
                                <td>{{ ($fine->nego_rm != 0)? displayPrice($fine->nego_rm) : displayPrice($fine->actual_rm) }}</td>
                                <td>{!! badgeLibFineStatus($fine->paid) !!}</td>
                                {{--                                <td><b>{{ $book->parent->publisher->name }}</b> <small><br>{{ $book->parent->author->name }}</small>  </td>--}}
{{--                                <td>{!! badgeBookStatus($book->status) !!}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('frontend.user.library.admin.book.view', $book->id) }}" class="text-muted">--}}
{{--                                        <i class="fas fa-search"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="m-4">
{{--                            {{ $fines->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
