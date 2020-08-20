@extends('frontend.user.layouts.app')

@section('title', 'Library')
<?php
    $remark = json_decode($borrow->remark, true);

?>
@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                            <h5 class="text-center mb-4">Log Peminjaman Buku</h5>


                            <div class="m-5">
                                <h4 class="font-weight-bold mb-3">Maklumat Peminjam</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Nama</dt>
                                    <dd class="col-sm-8">{{ $borrow->borrower->name }}</dd>

                                    <dt class="col-sm-4">Nombor Kad Pengenalan</dt>
                                    <dd class="col-sm-8">{{ $borrow->borrower->no_ic }}</dd>

                                    <dt class="col-sm-4">Kelas</dt>
                                    <dd class="col-sm-8">{{ getStudentClass($borrow->borrower->class_id) }}</dd>
                                </dl>

                                <h4 class="font-weight-bold mb-3">Maklumat Buku</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Tajuk</dt>
                                    <dd class="col-sm-8">{{ $borrow->book->parent->title }}</dd>

                                    <dt class="col-sm-4">Group/Genre</dt>
                                    <dd class="col-sm-8"><b>{{ $borrow->book->parent->subGroup->code }}</b> - {{ $borrow->book->parent->subGroup->name }}</dd>

                                </dl>

                                <h4 class="font-weight-bold mb-3">Maklumat Pinjaman</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Tarikh Pinjam</dt>
                                    <dd class="col-sm-8">{{ reformatDatetime($borrow->borrow_date, 'j M Y') }}</dd>

                                    <dt class="col-sm-4">Tarikh Pemulangan Sebelum</dt>
                                    <dd class="col-sm-8">{{ reformatDatetime($borrow->actual_return_date, 'j M Y') }}</dd>

                                    <dt class="col-sm-4">Tarikh Dipulangkn</dt>
                                    @if($borrow->in_id)
                                        <dd class="col-sm-8">{{ reformatDatetime($borrow->return_date, 'j M Y') }}</dd>
                                    @else
                                        <dd class="col-sm-8"><span class="badge badge-warning">Belum Dipulangkan</span> </dd>
                                    @endif

                                @if(!is_null($borrow->fine_id))
                                        <dt class="col-sm-4">Jumlah Hari Lewat</dt>
                                        <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">{{ $borrow->fine->total_day }} X {{ displayPrice($borrow->fine->actual_rm/$borrow->fine->total_day) }}</h3></dd>

                                        <dt class="col-sm-4">Jumlah Denda</dt>
                                        <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">{{ displayPrice($borrow->fine->actual_price) }}</h3></dd>
                                    @endif
                                </dl>

                                <h4 class="font-weight-bold mb-3">Maklumat Staff/ Pengawas Bertugas</h4>
                                <dl class="row">
                                    @if($borrow->staffOut->can('lib_prefects'))
                                        <dt class="col-sm-4">Pengawas Bertugas(Peminjaman)</dt>
                                        @if(isset($remark['peminjaman']))
                                            <dd class="col-sm-8">{{ $remark['peminjaman']['name'] }} ({{ $remark['peminjaman']['no_ic'] }})</dd>
                                        @endif
                                    @else
                                        <dt class="col-sm-4">Staff Bertugas Bertugas(Peminjaman)</dt>
                                        <dd class="col-sm-8"></dd>{{ $borrow->staffIn->name }}

                                    @endif

                                    @if(!is_null($borrow->in_id))
                                            @if($borrow->staffIn->can('lib_prefects'))
                                                <dt class="col-sm-4">Pengawas Bertugas(Pemulangan)</dt>
                                                @if(isset($remark['pemulangan']))
                                                    <dd class="col-sm-8">{{ $remark['pemulangan']['name'] }} ({{ $remark['pemulangan']['no_ic'] }})</dd>
                                                @endif
                                            @else
                                                <dt class="col-sm-4">Staff Bertugas(Pemulangan)</dt>
                                                <dd class="col-sm-8">{{ $borrow->staffIn->name }}</dd>
                                </dl>

                                            @endif
                                    @endif

                                </dl>

                            </div>

                            <div class="text-center">
                                    <a href="{{ route('frontend.user.library.borrow.history', $borrow->id) }}" class="btn btn-warning btn-lg">Kembali</a>
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
