@extends('frontend.user.layouts.app')

@section('title', __("Event :"). $uga->title)

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Event List' => route('frontend.user.kehadiran.index'),
    $uga->title => '#',
    'View' => '#',
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
                                <a class="nav-link {{ (session('att_manual_tab') == "checkin")? "active" : "" }}" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="{{ (session('att_manual_tab') == "checkin")? "true" : "false" }}">{{ __('Check-in') }}</a>
                            </li>
                            @if($uga->is_checkout == 1)
                                <li class="nav-item">
                                    <a class="nav-link {{ (session('att_manual_tab') == "checkout")? "active" : "" }}" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="{{ (session('att_manual_tab') == "checkout")? "true" : "false" }}">{{ __('Check-out') }}</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade {{ (session('att_manual_tab') == "checkin")? "show active" : "" }}" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                <form class="form-inline mb-3" action="{{ route('frontend.user.kehadiran.checkin-insert', $uga->id) }}" method="get">
                                    <label class="sr-only" for="ic-checkin">{{ __('MyKad No.') }}</label>
                                    <input type="text" name="ic" class="form-control mb-2 mr-sm-2 col-md-12" id="ic-checkin" value="{{ old('ic') }}" placeholder="{{ __('Student\'s MyKad No.') }}">

                                    <div class="input-group mr-sm-2">
                                        <button type="submit" class="btn btn-success btn-block">{{ __('Manual Check-in') }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade {{ (session('att_manual_tab') == "checkout")? "show active" : "" }}" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                <form class="form-inline mb-3" action="{{ route('frontend.user.kehadiran.checkout-insert', $uga->id) }}" method="get">
                                    <label class="sr-only" for="ic-checkout">{{ __('MyKad No.') }}</label>
                                    <input type="text" name="ic" class="form-control mb-2 mr-sm-2 col-md-12" id="ic-checkout" value="{{ old('ic') }}" placeholder="{{ __('Student\'s MyKad No.') }}">

                                    <div class="input-group mr-sm-2">
                                        <button type="submit" class="btn btn-danger btn-block">{{ __('Manual Check-out') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-body">
                        @if($uga->status == 1)
                            <a href="{{ route('frontend.user.kehadiran.checkin-qr', encrypt($uga->id)) }}" class="btn btn-success btn-sm mb-2">{{ __("Check-in Scanner") }}</a>
                        @if($uga->is_checkout == 1)
                                <a href="{{ route('frontend.user.kehadiran.checkout-qr', encrypt($uga->id)) }}" class="btn btn-success btn-sm mb-2">{{ __('Check-out Scanner') }}</a>
                            @endif
                        @endif
                        <a href="{{ route('frontend.user.kehadiran.checkin-list', encrypt($uga->id)) }}" class="btn btn-primary btn-sm mb-2">{{ __("Particpant List") }}</a>
                        @if(auth()->user()->id == $uga->user_id)
                            <a href="{{ route('frontend.user.kehadiran.edit', encrypt($uga->id)) }}" class="btn btn-light btn-sm mb-2">{{ __('Edit Event') }}</a>
                        @endif



                        @php
                            $attend = $uga->attends->count();
                            $total = $uga->attendances->count();
                            $absent = $uga->absents->count();
                            $checkouts = $uga->checkouts->count();

                            $tag = json_decode($uga->tag, true);
                        @endphp

                        <div class="text-left mt-3">
                            <p class="text-muted mb-2 font-13 font-weight-bold">{{ __('Classes Involved') }}  :</p>
                            <p class="text-muted font-13 mb-3 text-uppercase">
                                @foreach($tag['kelas'] as $class_id)
                                    {{ getClass($class_id)->generate_name }},
                                @endforeach
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>{{ __('Gender') }} :</strong>
                                <span class="ml-2">{{ $tag['jantina'] }}</span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>{{ __('Status') }} : </strong>
                                <span class="ml-2"> {{ $tag['status pelajar'] }}</span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>{{ __('Manage by') }} : </strong>
                                <span class="ml-2">{{ getUgaType($uga->type) }}</span>
                            </p>
                        </div>

                        @if($uga->type == 1)
                            <div class="jumbotron text-center">
                                <p class="text-primary font-weight-bold">{{ __('Share this invitation code to the staff on duty') }}</p>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="url" value="{{ route('frontend.user.kehadiran.join', $uga->code) }}" class="form-control form-control-sm" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="button" onclick="copyToClipboard('#url')">{{ __('Copy') }} <i class="fa fa-copy"></i> </button>
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
                                <div class="detail-name">{{ __('Cheked-in') }}</div>
                            </div>
                            @if($uga->is_checkout == 1)
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{ number_format((float)($checkouts/$total*100), 2, '.', '') }}%</span>
                                    <div class="detail-value">{{ $checkouts }}</div>
                                    <div class="detail-name">{{ __('Checked-out') }}</div>
                                </div>
                            @endif
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>{{ number_format((float)($absent/$total*100), 2, '.', '') }}%</span>
                                <div class="detail-value">{{ $absent }}</div>
                                <div class="detail-name">{{ __('Absent') }}</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 0%</span>
                                <div class="detail-value">{{ $total }}</div>
                                <div class="detail-name">{{ __('Expected Participant') }}</div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="datable">
                                <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Checked-in Time') }}</th>
                                    @if($uga->is_checkout == 1)
                                        <th>{{ __('Checked-out Time') }}</th>
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
