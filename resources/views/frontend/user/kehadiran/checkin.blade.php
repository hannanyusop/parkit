@extends('frontend.user.layouts.app')

@section('title', 'E-daftar')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Pengurusan Portal' => route('frontend.user.kehadiran.index'),
    'Pendaftaran' => '#',
];
?>

@section('content')
    <section class="content">

        <h2 class="section-title">Daftar Masuk </h2>
        <p class="section-lead">Program : {{ $uga->title }}</p>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline mb-3" action="{{ route('frontend.user.kehadiran.checkin-insert', $uga->id) }}" method="get">
                        <label class="sr-only" for="ic">NO K/P Pelajar</label>
                        <input type="text" name="ic" class="form-control mb-2 mr-sm-2 col-md-6" id="title" value="{{ request('ic') }}" placeholder="NO. K/P Pelajar">

                        <div class="input-group mb-2 mr-sm-2">
                            <button type="submit" class="btn btn-primary">Daftar Masuk</button>
                        </div>
                    </form> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    @php
                    $attend = $uga->attends->count();
                    $total = $uga->attendances->count();
                    $absent = $uga->absents->count();


                    @endphp

                    <div class="statistic-details m-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ (int)($attend/$total*100) }}%</span>
                            <div class="detail-value">{{ $attend }}</div>
                            <div class="detail-name">Daftar Masuk</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>{{ (int)($absent/$total*100) }}%</span>
                            <div class="detail-value">{{ $absent }}</div>
                            <div class="detail-name">Tidak Hadir</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 0%</span>
                            <div class="detail-value">{{ $total }}</div>
                            <div class="detail-name">Jumlah Pelajar</div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="datable">
                            <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Daftar Masuk</th>
                                <th>Daftar Keluar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($uga->attends as $key => $attend)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $attend->student->name }}</td>
                                    <td class="text-center">{{ (is_null($attend->checkin))? "" :  reformatDatetime($attend->checkin, 'h:i A')  }}</td>
                                    <td class="text-center">{{ (is_null($attend->checkout))? "" :  reformatDatetime($attend->checkout, 'h:i A')  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
