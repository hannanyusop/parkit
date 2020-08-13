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
                        <div class="row">
                            <x-forms.get>
                            <div class="input-group input-group-lg">
                                    <input type="text" name="id" class="form-control" placeholder="Scan Barcode / Insert 'No Perolehan'" autofocus>
                                    <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-barcode"></i> Search</button>
                                </span>
                                </div>
                            </x-forms.get>
                        </div>

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
                                    <dd class="col-sm-8">{{ reformatDatetime($book->activeBorrow->return_actual_date, 'j M Y') }}</dd>

                                    <dt class="col-sm-4">Late (Day)</dt>
                                    <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">2</h3></dd>

                                    <dt class="col-sm-4">Amount Of Fine</dt>
                                    <dd class="col-sm-8"><h3 class="text-danger font-weight-bold">RM0.40</h3></dd>
                                </dl>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('frontend.user.library.borrow.return-submit', $book->id) }}" class="btn btn-danger btn-lg">Proceed</a>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
