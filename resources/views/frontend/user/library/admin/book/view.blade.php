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

                    <div class="card-body">
                        {!! barCodePrint($book->id, 2,50) !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
