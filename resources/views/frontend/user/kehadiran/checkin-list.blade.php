@extends('frontend.user.layouts.app')

@section('title', 'Program:'. $uga->title)

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Event List' => route('frontend.user.kehadiran.index'),
    $uga->title => route('frontend.user.kehadiran.checkin', encrypt($uga->id)),
    'Participant List' => '#',
];
?>

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline mb-3" action="{{ route('frontend.user.kehadiran.checkin-list', encrypt($uga->id)) }}" method="get">
                            <label class="sr-only" for="status">NO K/P Pelajar</label>
                            <select name="status" class="form-control mb-2 mr-sm-2 col-md-6" id="status">
                                @foreach(attendanceStatusList(null,$uga->is_checkout) as $key => $status)
                                    <option value="{{ $key }}" {{ (request('status') == $key)? "selected" : "" }}>{{ $status }}</option>
                                @endforeach
                            </select>

                            <div class="input-group mb-2 mr-sm-2">
                                <button type="submit" class="btn btn-primary">Daftar Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datable">
                                <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Daftar Masuk</th>
                                    @if($uga->is_checkout == 1)
                                        <th>Daftar Keluar</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $key => $attend)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $attend->student->name }}</td>
                                        <td class="text-center">{{ (is_null($attend->checkin))? "BELUM" :  reformatDatetime($attend->checkin, 'h:i A')  }}</td>
                                        @if($uga->is_checkout == 1)
                                            <td class="text-center">{{ (is_null($attend->checkout))? "BELUM" :  reformatDatetime($attend->checkout, 'h:i A')  }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
