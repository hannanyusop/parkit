@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <x-forms.get>
                        <div class="card-body">
                            <h4>Carian Log Peminjaman</h4>
                            <div class="form-group">
                                <input type="text" name="no_ic" value="{{ request('no_ic') }}" class="form-control" placeholder="NAMA / NO. KAD PENGENALAN">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="">STATUS PEMULANGAN</option>
                                    <option value="1" {{ (request('status') == 1)? "SELECTED" : "" }}>BELUM DIPULANGKAN</option>
                                    <option value="2" {{ (request('status') == 2)? "SELECTED" : "" }}>SUDAH DIPULANGKAN</option>

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
                                <th>Tarikh Peminjaman</th>
                                <th>Status Pemulangan</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($borrows as $key => $borrow)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $borrow->borrower->name }}</td>
                                <td>{{ reformatDatetime($borrow->borrow_date, 'd M Y') }}</td>
                                <td>
                                    @if(!is_null($borrow->in_id))
                                        <span class="badge badge-success">Dipulangkan</span>
                                    @else
                                        <span class="badge badge-warning">Belum Dipulangkan</span>
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('frontend.user.library.borrow.history-view', $borrow->id) }}" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
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
