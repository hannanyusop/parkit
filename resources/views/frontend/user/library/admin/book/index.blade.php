@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <x-forms.get>
                        <div class="card-body">
                            <h4>Carian Buku</h4>
                            <div class="form-group">
                                <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Tajuk Buku / No. Perolehan">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="">SEMUA STATUS</option>
                                    @foreach(bookStatus() as $key => $status)
                                        <option value="{{ $key }}" {{ (request('status') == $key)? "selected" : "" }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success">Search</button>
                                <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-warning">Reset</a>
                            </div>
                        </div>
                    </x-forms.get>
                    <!-- /.card-body -->
                </div>
                @include('frontend.user.library.admin.book.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>No. Perolehan</th>
                                <th>Tajuk</th>
                                <th>Penerbit / Pengarang</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ getBookId($book->id) }}</td>
                                <td>{{ $book->parent->title }}</td>
                                <td><b>{{ $book->parent->publisher->name }}</b> <small><br>{{ $book->parent->author->name }}</small>  </td>
                                <td>{!! badgeBookStatus($book->status) !!}</td>
                                <td>
                                    <a href="{{ route('frontend.user.library.admin.book.view', $book->id) }}" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="m-4">
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
