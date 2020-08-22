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
                            LAPORAN KUNJUNGAN PELAJAR TAHUN {{ date('Y') }}<br>
                        </h4>
                        <x-forms.get>
                            <div class="form-group">
                                <select class="form-control" name="year">
                                    @foreach(getYear() as $key => $year)
                                        <option value="{{ $key }}" {{ (request('year') == $key)? "SELECTED" : "" }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Cari</button>
                            <a href="{{ route('frontend.user.library.admin.report.student-monthly-visit') }}" class="btn btn-info">Lihat Laporan Bulanan</a>
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
                                @foreach($data as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->student->name }}</td>
                                        <td>{{ $user->total }}</td>
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
