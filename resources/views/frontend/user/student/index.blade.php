@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        @include('frontend.user.student.layout.topbar')
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <form method="get" class="form-horizontal">
                    <div class="card-body">

                        <h4 class="text-center mb-4">Carian Pelajar</h4>
                        <div class="input-group input-group-lg  col-md-6 offset-md-3">
                            <input type="text" class="form-control" placeholder="MASUKAN NAMA / NO KAD PENGENALAN PELAJAR" name="search">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">Carian</button>
                              </span>
                        </div>

                    </div>
                </form>

                <div class="card-body">

                    @if(!is_null($students ))
                        @if($students->count() > 0)
                            <p class="text-center font-weight-bold">{{ $students->count() }} Pelajar dijumpai</p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombor K/P</th>
                                        <th>Nama</th>
                                        <th>Jantina</th>
                                        <th>Asrama/Harian</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key => $student)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $student->no_ic }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ getGender($student->gender) }}</td>
                                            <td>{!! badgeStudentType($student->type) !!}</td>
                                            <td>{!! badgeStudentStatus($student->status) !!}</td>
                                            <td><a href="{{ route('frontend.user.student.edit', $student->id) }}" class="btn btn-info btn-sm">Kemaskini</a> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h6 class="text-center">Tiada Maklumat Pelajar Dijumpai Bagi "{{ request('search') }}"</h6>
                        @endif
                    @endif

                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
