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
                        <x-forms.get>
                            <div class="row">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" value="{{ request('no_ic') }}" name="no_ic" {{ ($student)? "disabled" : "" }} placeholder="No Kad. Pengenalan Pelajar" autofocus>
                                    <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-id-card-alt"></i> Cari</button>
                                </span>
                                </div>
                            </div>
                        </x-forms.get>
                        @if(!is_null($student))

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
                        <hr>
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
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center">
                                <h4 class="text-success font-weight-bold m-4">Tarikh Pemulangan :  {{ date('j M Y', strtotime(now(). " + ".getLibraryOption('max_student_borrow', 2)." days")) }}</h4>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('frontend.user.library.borrow.submit', $student->no_ic) }}" class="btn btn-success btn-lg">Hantar</a>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
