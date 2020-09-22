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
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="masuk" data-toggle="tab" href="#masuk" role="tab" aria-controls="masuk" aria-selected="true">Daftar Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="keluar" data-toggle="tab" href="#keluar" role="tab" aria-controls="keluar" aria-selected="false">Daftar Keluar</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="tab-masuk" role="tabpanel" aria-labelledby="masuk">
                                <form class="form-inline mb-3" action="{{ route('frontend.user.kehadiran.checkin-insert', $uga->id) }}" method="get">
                                    <label class="sr-only" for="ic">NO K/P Pelajar</label>
                                    <input type="text" name="ic" class="form-control mb-2 mr-sm-2 col-md-12" id="title" value="{{ request('ic') }}" placeholder="NO. K/P Pelajar">

                                    <div class="input-group mb-2 mr-sm-2">
                                        <button type="submit" class="btn btn-primary">Daftar Masuk Manual</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="keluar" role="tabpanel" aria-labelledby="keluar">
                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor,
                                ac efficitur est lobortis quis.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-body">
                        @if($uga->status == 1)
                            <a href="{{ route('frontend.user.kehadiran.checkin-qr', encrypt($uga->id)) }}" class="btn btn-success btn-sm mb-2">Scan Masuk</a>
                        @if($uga->is_checkout == 1)
                                <a href="{{ route('frontend.user.kehadiran.checkout-qr', encrypt($uga->id)) }}" class="btn btn-success btn-sm mb-2">Scan Keluar</a>
                            @endif
                        @endif
                        <a href="{{ route('frontend.user.kehadiran.checkin-list', encrypt($uga->id)) }}" class="btn btn-primary btn-sm mb-2">Senarai Penuh</a>
                        @if(auth()->user()->id == $uga->user_id)
                            <a href="{{ route('frontend.user.kehadiran.edit', encrypt($uga->id)) }}" class="btn btn-light btn-sm mb-2">Kemaskini</a>
                        @endif



                        @php
                            $attend = $uga->attends->count();
                            $total = $uga->attendances->count();
                            $absent = $uga->absents->count();
                            $checkouts = $uga->checkouts->count();

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

                        @if($uga->type == 1)
                            <div class="jumbotron text-center">
                                <p class="text-primary font-weight-bold">Kongsi kod jemputan ini kepada staff bertugas</p>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="url" value="{{ route('frontend.user.kehadiran.join', $uga->code) }}" class="form-control form-control-sm" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="button" onclick="copyToClipboard('#url')">Salin <i class="fa fa-copy"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div> <!-- end card-body -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="statistic-details m-sm-4">
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ number_format((float)($attend/$total*100), 2, '.', '') }}%</span>
                                <div class="detail-value">{{ $attend }}</div>
                                <div class="detail-name">Daftar Masuk</div>
                            </div>
                            @if($uga->is_checkout == 1)
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ number_format((float)($checkouts/$total*100), 2, '.', '') }}%</span>
                                    <div class="detail-value">{{ $attend }}</div>
                                    <div class="detail-name">Daftar Keluar</div>
                                </div>
                            @endif
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>{{ number_format((float)($absent/$total*100), 2, '.', '') }}%</span>
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
                                    @if($uga->is_checkout == 1)
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
                                        @if($uga->is_checkout == 1)
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

@push('after-scripts')
    <script type="text/javascript">
        function copyToClipboard(element) {
            $(element).select();
            document.execCommand("copy");
        }
    </script>
@endpush