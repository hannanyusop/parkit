@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Carian Log Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-inline">
                            <label class="sr-only" for="no_ic">NO.K/P</label>
                            <input type="text" name="no_ic"  id="no_ic" value="{{ request('no_ic') }}" class="form-control mb-2 mr-sm-2" placeholder="NAMA / NO. K/P">

                            <label class="sr-only" for="status">Username</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <select class="form-control" name="status" id="status">
                                    <option value="">STATUS PEMULANGAN</option>
                                    <option value="1" {{ (request('status') == 1)? "SELECTED" : "" }}>BELUM DIPULANGKAN</option>
                                    <option value="2" {{ (request('status') == 2)? "SELECTED" : "" }}>SUDAH DIPULANGKAN</option>
                                </select>
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <button class="btn btn-primary">Cari</button>
                                <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-white">Reset</a>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
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
