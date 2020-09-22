@extends('frontend.user.layouts.app')

@section('title', 'Library')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Perpustakaan' => route('frontend.user.library.index'),
    'Tempahan Slot' => route('frontend.user.library.admin.booking.index'),
    'Senarai Permohonan' => route('frontend.user.library.admin.booking.applicant-list'),
];
?>

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Calendar</h4>
                    </div>
                    <div class="card-body">
                        <div class="fc-overflow">
                            <div id="myEvent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Senarai Tempahan Pengguna</h4>
                        <div class="card-header-action">
                            <a href="{{ route('frontend.user.library.admin.booking.index') }}" class="btn btn-primary">kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="datable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tarkh</th>
                                    <th>Masa</th>
                                    <th>Pemohon</th>
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
                                        <td>{{ $booking->applicant->name }}</td>
                                        <td>{{ $booking->purpose }}</td>
                                        <td> {!! libGetBookingStatus($booking->status) !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                <div class="dropdown-menu" style="">
                                                    @if($booking->status == 1)
                                                        <a href="{{ route('frontend.user.library.admin.booking.action', [$booking->id, 2]) }}" class="dropdown-item text-success"><i class="fa fa-check"></i> Terima</a>
                                                        <a href="{{ route('frontend.user.library.admin.booking.action', [$booking->id, 3]) }}" class="dropdown-item text-warning"><i class="fa fa-times"></i> Tolak</a>
                                                    @else
                                                        <a href="{{ route('frontend.user.library.admin.booking.action', [$booking->id, 1]) }}" class="dropdown-item text-primary"><i class="fa fa-history"></i> Reset</a>
                                                    @endif
                                                    @if(auth()->user()->id == $booking->staff_id)
                                                        <a class="dropdown-item text-danger" href="{{ route('frontend.user.library.admin.booking.delete', $booking->id) }}" onclick="return confirm('Adakah anda pasti ingin menghapus tempahan ini?')"><i class="fa fa-trash"></i> Padam</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
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
    <script type="text/javascript">
        "use strict";

        $("#myEvent").fullCalendar({
            height: 'auto',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            editable: true,
            events: @json($events)

        });
    </script>
@endpush
