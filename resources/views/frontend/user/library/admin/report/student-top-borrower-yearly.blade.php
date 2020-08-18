@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                @include('frontend.user.library.admin.report.layout.side-div')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">
                            LAPORAN PEMINJAM BUKU BAGI TAHUN {{ request('month') }} {{ date('Y') }}<br>
                            (PELAJAR)
                        </h4>
                        <x-forms.get>
                            <div class="form-group">
                                <select class="form-control" name="year">
                                    @foreach(getYear() as $year)
                                        <option value="{{ $year }}" {{ (request('year') == $year)? "SELECTED" : "" }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Cari</button>
                        </x-forms.get>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topBorrower as $key => $borrower)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $borrower->borrower->name }}</td>
                                        <td>{{ $borrower->total }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
@endpush
