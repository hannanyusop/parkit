@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                            <h5 class="text-center mb-4">Pemulangan Buku</h5>
                            <x-forms.get>
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="id" value="{{ request('no_ic') }}" placeholder="Scan Barcode / Insert 'No Perolehan'" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-barcode"></i> Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </x-forms.get>

                        @if(!is_null($book))

                            <div class="m-5">
                                <h4 class="font-weight-bold mb-3">Maklumat Peminjam</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Nama</dt>
                                    <dd class="col-sm-8">{{ $book->activeBorrow->borrower->name }}</dd>

                                    <dt class="col-sm-4">Nombor Kad Pengenalan</dt>
                                    <dd class="col-sm-8">{{ $book->activeBorrow->borrower->no_ic }}</dd>

                                    <dt class="col-sm-4">Kelas</dt>
                                    <dd class="col-sm-8">{{ getStudentClass($book->activeBorrow->borrower->class_id) }}</dd>
                                </dl>

                                <h4 class="font-weight-bold mb-3">Maklumat Buku</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Tajuk</dt>
                                    <dd class="col-sm-8">{{ $book->parent->title }}</dd>

                                    <dt class="col-sm-4">Group/Genre</dt>
                                    <dd class="col-sm-8"><b>{{ $book->parent->subGroup->code }}</b> - {{ $book->parent->subGroup->name }}</dd>

                                </dl>

                                <h4 class="font-weight-bold mb-3">Maklumat Pinjaman</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Tarikh Pinjam</dt>
                                    <dd class="col-sm-8">{{ reformatDatetime($book->activeBorrow->borrow_date, 'j M Y') }}</dd>

                                    <dt class="col-sm-4">Staff/Pengawas Bertugas</dt>
                                    <dd class="col-sm-8">{{ $book->activeBorrow->staffOut->name }}</dd>

                                    <dt class="col-sm-4">Tarikh Pemulangan Sebelum</dt>
                                    <dd class="col-sm-8">{{ reformatDatetime($book->activeBorrow->actual_return_date, 'j M Y') }}</dd>

                                    @if($late)
                                        <dt class="col-sm-4">Jumlah Hari Lewat</dt>
                                        <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">{{ $diff }} X {{ displayPrice(getLibraryOption('fine', 0.20)) }}</h3></dd>

                                        <dt class="col-sm-4">Jumlah Denda</dt>
                                        <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">{{ displayPrice($diff*getLibraryOption('fine', 0.20)) }}</h3></dd>
                                    @endif
                                </dl>
                            </div>

                            <div class="text-center">
                                @if($late)
                                    <a href="{{ route('frontend.user.library.borrow.return-submit', $book->id) }}" class="btn btn-warning btn-lg">Terima Buku & Jana Resit Denda</a>
                                @else
                                    <a href="{{ route('frontend.user.library.borrow.return-submit', $book->id) }}" class="btn btn-success btn-lg">Terima Buku</a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
