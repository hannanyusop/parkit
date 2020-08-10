@extends('frontend.user.layouts.app')

@section('title', 'Classroom Teacher/ View Today Attendance')

@push('after-styles')
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-body">
                    <p class="text-center text-uppercase font-weight-bold">REKOD KEHADIRAN KELAS TINGKATAN 6 ATAS BAGI<br> {{ date('d M Y') }}</p>

                    <div class="row">
                        <div class="col-md-8">
                            <b>Maklumat Guru Kelas</b>
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ asset('img/kehadiran/test.jpg') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        NAMA :<b class="font-weight-bold product-title">HAFIZ HASRIN</b>
                                        <span class="product-description">NO K/P : XXXXXX-XX-XXXX</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="m-4">
                                <ul class="list-unstyled">
                                    <li>Bilangan Pelajar : 24</li>
                                    <li>Bilangan Hadir: 22</li>
                                    <td>Bilangan Tidak Hadir : 2</td>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive">
                        <b>Senarai Pelajar Hadir</b><br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NAMA</th>
                                <th>NO. K/P</th>
                                <th>MASA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td>MOHD AMMAR BIN BAKAR</td>
                                <td>111111-11-1111</td>
                                <td>06:45 PM</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <b class="mb-2">Senarai Pelajar Tidak Hadir</b><br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NAMA</th>
                                <th>NO. K/P</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td>FARA FAZIRAH BINTI GUSTRA</td>
                                <td>2222222-22-2222</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak Laporan</a>
                    <a href="{{ route('frontend.user.kehadiran.ct.index') }}" type="submit" class="btn btn-warning"> Kembali</a>
                </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </section>
@endsection
