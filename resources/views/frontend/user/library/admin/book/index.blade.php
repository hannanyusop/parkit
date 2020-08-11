@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Book Title">
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" id="group" name="group">
                                @foreach($groups as $group)
                                    <optgroup label="{{ $group->code." - ".$group->name }}">
                                        @foreach($group->subs as $sub)
                                            <option value="{{ $sub->id }}" value="{{ (old('group') == $sub->id)? "checked" : "" }}">{{ $sub->code." - ".$sub->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option>SELECT STATUS</option>
                                <option>Active</option>
                                <option>Borrowed</option>
                                <option>Disposed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-block">Search</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                @include('frontend.user.library.admin.book.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>No. Perolehan</th>
                                <th>Tajuk</th>
                                <th>Penerbit / Pengarang</th>
                                <th>Status</th>
                                <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ getBookId($book->id) }}</td>
                                <td>{{ $book->parent->title }}</td>
                                <td><b>{{ $book->parent->publisher->name }}</b> <small><br>{{ $book->parent->author->name }}</small>  </td>
                                <td><span class="badge badge-dark">Disposed</span> </td>
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
