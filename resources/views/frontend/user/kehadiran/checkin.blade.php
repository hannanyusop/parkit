@extends('frontend.user.layouts.app')

@section('title', 'Program:'. $uga->title)

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'E-Hadir' => route('frontend.user.kehadiran.index'),
    'Senarai Kehadiran' => '#',
    $uga->title => '#'
];
?>

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline mb-3" action="{{ route('frontend.user.kehadiran.checkin-insert', $uga->id) }}" method="get">
                            <label class="sr-only" for="ic">NO K/P Pelajar</label>
                            <input type="text" name="ic" class="form-control mb-2 mr-sm-2 col-md-12" id="title" value="{{ request('ic') }}" placeholder="NO. K/P Pelajar">

                            <div class="input-group mb-2 mr-sm-2">
                                <button type="submit" class="btn btn-primary">Daftar Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-body">
                        <a href="{{ route('frontend.user.kehadiran.checkin-qr', encrypt($uga->id)) }}" class="btn btn-success btn-sm mb-2">QR SCAN</a>

                        @php
                            $attend = $uga->attends->count();
                            $total = $uga->attendances->count();
                            $absent = $uga->absents->count();

                            $tag = json_decode($uga->tag, true);
                        @endphp

                        <div class="text-left mt-3">
                            <p class="text-muted mb-2 font-13 font-weight-bold">Kelas Terlibat  :</p>
                            <p class="text-muted font-13 mb-3 text-uppercase">
                                @foreach($tag['kelas'] as $class_id)
                                    {{ getClass($class_id)->generate_name }},
                                @endforeach
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Jantina :</strong>
                                <span class="ml-2">{{ $tag['jantina'] }}</span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Status Pelajar : </strong>
                                <span class="ml-2"> {{ $tag['status pelajar'] }}</span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Kegunaan : </strong>
                                <span class="ml-2">{{ ($uga->type == 1)? "Ramai" : "Sendiri" }}</span>
                            </p>
                        </div>

                    </div> <!-- end card-body -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

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
                                    @if($uga->checkout == 1)
                                        <th>Daftar Keluar</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($uga->attends as $key => $attend)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $attend->student->name }}</td>
                                        <td class="text-center">{{ (is_null($attend->checkin))? "" :  reformatDatetime($attend->checkin, 'h:i A')  }}</td>
                                        @if($uga->checkout == 1)
                                            <td class="text-center">{{ (is_null($attend->checkout))? "" :  reformatDatetime($attend->checkout, 'h:i A')  }}</td>
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
