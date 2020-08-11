@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-body">
                        <a href="{{ route('frontend.user.library.index') }}" class="btn btn-info mb-2">BACK</a>
                        <h5 class="text-success text-center font-weight-bold">KEDATANGAN PENGUNJUNG</h5>
                        <h2 class="text-center mb-5" id="clock"></h2>
                        <input class="form-control form-control-lg text-center" type="text" placeholder="NO. K/P" autofocus>
                        <br>
                        <button type="submit" class="btn btn-success btn-block btn-lg">CARI</button>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h5 class="text-center mt-5"><b class="text-success">AKTIF : 2</b> | <b class="text-info">JUMLAH : 24</b></h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA</th>
                                    <th>STATUS</th>
                                    <th>DAFTAR MASUK</th>
                                    <th>DAFTAR KELUAR</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ABDUL HANNAN BIN YUSOP</td>
                                    <th>{!! visitorStatus(1)  !!}</th>
                                    <td>02:43 PM</td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="">Log Keluar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>SYAKIRA SYSYA</td>
                                    <td>{!! visitorStatus(1)  !!}</td>
                                    <td>02:01 PM</td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="">Log Keluar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>AMIRA SYAHIRA</td>
                                    <td>{!! visitorStatus(2)  !!}</td>
                                    <td>11:26 AM</td>
                                    <td>12:02 PM</td>
                                    <td></td>
                                </tr>
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

