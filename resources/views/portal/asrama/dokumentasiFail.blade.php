@extends('portal.layout.app')

@section('content')
    <style>
        .embed-responsive {
            position: relative;
            display: block;
            height: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h5>{{ portalGetDocumentGroup($doc->group) }}</h5>
                    <p>{{ $doc->name }}</p>
                </div>
            </div>
        </div>
        <section class="space-pb mt-1">
            <div class="row text-center">
                <div class="col-md-6 offset-md-3">
                    <div class='embed-responsive' style='padding-bottom:150%'>
                        <object data='{{ getFile($doc->file) }}' type='application/pdf' width='100%' height='100%'></object>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
