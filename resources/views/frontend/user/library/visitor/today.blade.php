@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-body">
                       <x-forms.post :action="route('frontend.user.library.visitor.check')">
                           <a href="{{ route('frontend.user.library.index') }}" class="btn btn-warning mb-2">KEMBALI</a>
                           <a href="{{ route('frontend.user.library.visitor.checkin') }}" onclick="return confirm('Adakah anda pasti untuk mengaktifkan mod SELF-LOGIN?')" class="btn btn-success mb-2"><i class="fa fa-child"></i> SELF-LOGIN</a>

                           <h5 class="text-success text-center font-weight-bold">KEDATANGAN PENGUNJUNG</h5>
                           <h2 class="text-center mb-5" id="clock"></h2>
                           <input class="form-control form-control-lg text-center" name="no_ic" value="{{ old('no_ic') }}" type="text" placeholder="CTH: 960516131234" autofocus>
                           <div class="form-check text-center m-4">
                               <input type="checkbox" name="is_staff" class="form-check-input" id="is_staff" value="1">
                               <label class="form-check-label" for="is_staff">Staff Sekolah</label>
                           </div>
                           <br>
                           <button type="submit" class="btn btn-success btn-block btn-lg">CARI</button>
                       </x-forms.post>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h5 class="text-center mt-5"><b class="text-success">AKTIF : {{ getLibTodayActive() }}</b> | <b class="text-info">JUMLAH : {{ getLibTodayAll() }}</b></h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA</th>
                                    <th>DAFTAR MASUK</th>
                                    <th>DAFTAR KELUAR</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logStaff as $key => $log)
                                    <tr class="bg-info">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $log->user->name }}</td>
                                        <td>{{ reformatDatetime($log->checkin, "h:i A") }}</td>
                                        <td>{{ (!is_null($log->checkout))? reformatDatetime($log->checkout, "h:i A") : "" }}</td>
                                        <td>
                                            @if(is_null($log->checkout))
                                                <a class="btn btn-warning btn-sm" onclick="return confirm('Adakah anda pasti log keluar {{ $log->user->name }}?')" href="{{ route('frontend.user.library.visitor.manual-checkout', [$log->user->unique_id, true]) }}">Log Keluar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($logStudent as $key => $log)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $log->student->name }}</td>
                                    <td>{{ reformatDatetime($log->checkin, "h:i A") }}</td>
                                    <td>{{ (!is_null($log->checkout))? reformatDatetime($log->checkout, "h:i A") : "" }}</td>
                                    <td>
                                        @if(is_null($log->checkout))
                                            <a class="btn btn-warning btn-sm" onclick="return confirm('Adakah anda pasti log keluar {{ $log->student->name }}?')" href="{{ route('frontend.user.library.visitor.manual-checkout', [$log->student->no_ic, false]) }}">Log Keluar</a>
                                        @endif
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
    <script>

        function currentTime() {
            var date = new Date(); /* creating object of Date class */
            var hour = date.getHours();
            var min = date.getMinutes();
            var sec = date.getSeconds();
            hour = updateTime(hour);
            min = updateTime(min);
            sec = updateTime(sec);
            document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
            var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
        }

        function updateTime(k) {
            if (k < 10) {
                return "0" + k;
            }
            else {
                return k;
            }
        }

        currentTime();

    </script>
@endpush

