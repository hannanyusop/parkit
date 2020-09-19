@extends('frontend.user.layouts.app')

@section('title', 'Library')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Perpustakaan' => route('frontend.user.library.index'),
    'Tempahan Slot' => route('frontend.user.library.admin.booking.index'),
];
?>

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Senarai Tempahan</h4>
                        <div class="card-header-action">
                            @can('lib_admin')
                                <a href="{{ route('frontend.user.library.admin.booking.applicant-list') }}" class="btn btn-dark">Senarai Permohanan @if(libGetPendingBookingsCount() > 0)<span class="badge badge-info">{{ libGetPendingBookingsCount() }}</span>@endif </a>
                            @endcan
                            <a href="{{ route('frontend.user.library.admin.booking.create') }}" class="btn btn-primary">Tambah Tempahan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tarikh</th>
                                    <th>Masa</th>
                                    <th>Tujuan</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $key => $booking)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ reformatDatetime($booking->date, 'd-m-Y') }}</td>
                                        <td>{{ $booking->start." - ".$booking->end }}</td>
                                        <td>{{ $booking->purpose }}</td>
                                        <td> {!! libGetBookingStatus($booking->status) !!}</td>
                                        <td><a class="btn btn-danger btn-sm" href="{{ route('frontend.user.library.admin.booking.delete', $booking->id) }}" onclick="return confirm('Adakah anda pasti ingin menghapus tempahan ini?')"><i class="fa fa-trash"></i> Padam</a> </td>
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
