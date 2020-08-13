@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.admin.book.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body m-md-5">
                        <div class="float-right clearfix">
                            <a href="{{ route('frontend.user.library.admin.book.edit', $book->id) }}" class="btn btn-warning">Kemaskini Maklumat Buku</a>
                        </div>
                        <h4>Maklumat Buku</h4>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-4">Nombor Perolehan </dt>
                            <dd class="col-sm-8">{{ getBookId($book->id) }}</dd>

                            <dt class="col-sm-4">Tajuk /Judul</dt>
                            <dd class="col-sm-8">{{ $book->parent->title }}</dd>

                            <dt class="col-sm-4">Pengarang</dt>
                            <dd class="col-sm-8">{{ $book->parent->author->name }}</dd>

                            <dt class="col-sm-4">Ringkasan Pertama</dt>
                            <dd class="col-sm-8"><b>{{ $book->parent->subGroup->parent->code }}</b> - {{ $book->parent->subGroup->parent->name }}</dd>

                            <dt class="col-sm-4">Ringkasan Kedua</dt>
                            <dd class="col-sm-8"><b>{{ $book->parent->subGroup->code }}</b> - {{ $book->parent->subGroup->name }}</dd>

                            <dt class="col-sm-4">Bil. Muka Surat</dt>
                            <dd class="col-sm-8">{{ $book->parent->pages }} m/s </dd>

                            <dt class="col-sm-4">Jenis Buku</dt>
                            <dd class="col-sm-8">{!! isFiction($book->parent->is_fiction) !!}</dd>

                            <dt class="col-sm-4">Status Peminjaman</dt>
                            <dd class="col-sm-8">{!! isBorrow($book->parent->is_borrow) !!}</dd>

                            <dt class="col-sm-4">Tarikh Didaftarkan</dt>
                            <dd class="col-sm-8">{{ reformatDatetime($book->created_at, "d M Y") }}</dd>

                            <dt class="col-sm-4">Jumlah Set Buku</dt>
                            <dd class="col-sm-8">{{ $book->parent->books->count() }}</dd>

                            <dt class="col-sm-4">Jumlah Tersedia(Available)</dt>
                            <dd class="col-sm-8">{{ $book->parent->booksAvailable->count() }}</dd>
                        </dl>
                        <hr>

                        <h5>Maklumat Penerbit</h5>

                        <dl class="row">
                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8">{{ $book->parent->publisher->name }}</dd>
                            <dt class="col-sm-4">No Tel.</dt>
                            <dd class="col-sm-8">{{ $book->parent->publisher->phone_number }}</dd>
                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8">{{ $book->parent->publisher->address }}</dd>
                        </dl>

                        <hr>
                        <h5>Pelekat Buku</h5>

                        <p>Pelekat Belakang</p>
                        <div class="" style="border-style: dotted;width: 450px">
                            {!! barCodePrint($book->id, 2,50) !!}
                        </div>

                        <p>Pelekat Tepi</p>
                        <div class="text-center" style="border-style: dotted;width: 120px">
                            <h6 class="m-2">{{ bookShortCode($book->id) }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
