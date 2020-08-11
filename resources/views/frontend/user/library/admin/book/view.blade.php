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
