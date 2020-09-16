@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                @if(is_null($student))
                    <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-4">Peminjaman Buku</h5>
                        <x-forms.get>
                            <div class="row">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="no_ic" value="{{ request('no_ic') }}" placeholder="No Kad. Pengenalan Pelajar" {{ ($student)? "disabled" : "" }} autofocus>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-id-card-alt"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </x-forms.get>
                    </div>
                </div>
                @endif
                @if(!is_null($student))
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 clearfix">
                                <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="btn btn-danger m-2  float-right"><i class="fa fa-times"></i> </a>
                            </div>
                            <div class="col-md-12">
                                <x-forms.post :action="route('frontend.user.library.borrow.borrow-add-list')">
                                    <div class="row text-center">
                                        <div class="input-group input-group-lg">
                                            <input type="hidden" name="no_ic" value="{{ $student->no_ic }}">
                                            <input name="id" type="text" class="form-control" placeholder="Scan Barcode / Insert 'No Perolehan'" autofocus>
                                            <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-barcode"></i> Cari</button>
                                        </span>
                                        </div>
                                    </div>
                                </x-forms.post>
                                <div class="table-responsive">
                                    <table class="table table-striped table-valign-middle mt-5">
                                        <thead>
                                        <tr>
                                            <th>No Perolehan</th>
                                            <th>Tajuk</th>
                                            <th>Penerbit / Penulis</th>
                                            <th>Kelas Dewey</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($bookList))
                                            @foreach($bookList as $key => $book)
                                                <tr>
                                                    <td>{{ getBookId($key) }}</td>
                                                    <td>{{ $book['title'] }}</td>
                                                    <td><b>{{ $book['publisher'] }}</b> <small><br>{{ $book['author'] }}</small>  </td>
                                                    <td><b>{{ $book['type'] }}</td>
                                                    <td>
                                                        <a href="{{ route('frontend.user.library.borrow.borrow-remove-list', [$student->no_ic, $key]) }}" class="btn btn-sm btn-warning" onclick="return confirm('Adakah anda pasti untuk menyingkirkan buku ini dari senarai?')">
                                                            <i class="fas fa-times"></i> Remove
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="m-5">
                                        <h4 class="font-weight-bold mb-3">Maklumat Pelajar</h4>
                                        <dl class="row">
                                            <dt class="col-sm-4">Nama</dt>
                                            <dd class="col-sm-8">{{ $student->name }}</dd>

                                            <dt class="col-sm-4">Nombor Kad Pengenalan</dt>
                                            <dd class="col-sm-8">{{ $student->no_ic }}</dd>

                                            <dt class="col-sm-4">Kelas</dt>
                                            <dd class="col-sm-8">{{ getStudentClass($student->class_id) }}</dd>

                                            <dt class="col-sm-4">Jumlah Buku Yang Belum Dipulangkan</dt>
                                            <dd class="col-sm-8">{{ $student->notReturnBook->count() }}</dd>

                                            <dt class="col-sm-4">Jumlah Buku Yang Boleh Dipinjam</dt>
                                            <dd class="col-sm-8">{{ getLibraryOption('max_student_borrow', 2)-$student->notReturnBook->count() }}</dd>

                                        </dl>

                                    </div>
                                </div>

                                <div class="text-center">
                                    <h4 class="text-success font-weight-bold m-4">Tarikh Pemulangan :  {{ date('j M Y', strtotime(now(). " + ".getLibraryOption('borrow_duration', 2)." days")) }}</h4>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('frontend.user.library.borrow.submit', $student->no_ic) }}" class="btn btn-success btn-lg">Hantar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
