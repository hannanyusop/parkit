@extends('frontend.user.layouts.app')

@section('title', 'Library / Late List')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4>Senarai Lewat</h4>

                        <div class="table-responsive">
                            <table class="table table-striped table-valign-middle mt-5">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Peminjam</th>
                                    <th>Kelas</th>
                                    <th>Tajuk Buku</th>
                                    <th>Tarikh Hantar</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lates as $key => $late)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $late->borrower->name }}</td>
                                    <td>{{ getStudentClass($late->borrower->class_id) }}</td>
                                    <td>{{ $late->book->parent->title }}</td>
                                    <td>{{ reformatDatetime($late->actual_return_date, "j-m-Y") }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" onclick="return confirm('Are you user want to remove this book?')">
                                            <i class="fas fa-times"></i> Remove
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
