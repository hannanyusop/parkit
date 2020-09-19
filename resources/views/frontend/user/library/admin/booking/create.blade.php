@extends('frontend.user.layouts.app')

@section('title', 'Tempahan Slot')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Perpustakaan' => route('frontend.user.library.index'),
    'Tempahan Slot' => route('frontend.user.library.admin.booking.index'),
    'Tambah' => '#',
];
?>

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('frontend.user.library.admin.booking.index') }}"  class="btn btn-sm btn-link float-right mb-3">Senarai Tempahan
                            <i class="fa fa-list ml-1"></i>
                        </a>
                        @if(is_null($date))
                            <x-forms.get>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tarikh</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="date" value="{{ old('date') }}" class="form-control datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="" class="btn btn-primary">Semak Tarikh</button>
                                    </div>
                                </div>
                            </x-forms.get>
                        @else
                            <x-forms.post :action="route('frontend.user.library.admin.booking.insert')" >
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tarikh</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="date" value="{{ $date }}" class="form-control datepicker" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Senarai Tempahan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm">
                                                <tr class="bg-primary text-white">
                                                    <th>Masa Tempahan</th>
                                                    <th>Nama Staff</th>
                                                </tr>
                                                @if(is_null($bookings) || $bookings->count() == 0)
                                                    <tr>
                                                        <td class="text-center" colspan="2">Tiada Tempahan Pada Tarikh Ini</td>
                                                    </tr>
                                                @else
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td>{{ $booking->start." - ".$booking->end }}</td>
                                                            <td>{{ $booking->applicant->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tujuan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="purpose" value="{{ old('purpose') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="staff_notes" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Mula</label>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="start" value="{{ old('start') }}" class="form-control timepicker">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Tamat</label>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="end" value="{{ old('end') }}" class="form-control timepicker">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Hantar</button>
                                        <a class="btn btn-white" href="{{ route('frontend.user.library.admin.booking.create') }}">Reset</a>
                                    </div>
                                </div>
                            </x-forms.post>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">

    </script>
@endpush
