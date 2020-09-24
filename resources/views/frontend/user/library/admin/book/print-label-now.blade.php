@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <button class="btn btn-success" onclick="printContent('print');" >Print</button>
                    <div class="card-body m-md-5" id="print">

                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-md-6">
                                    <div class="" style="border-style: dotted;width: 410px">
                                        {!! barCodePrint($book->id, 2,50) !!}
                                    </div>
                                    <div class="text-center" style="border-style: dotted;height:35px;width: 110px;margin-top: -17px;margin-bottom: -17px">
                                        <h6 class="m-1">{{ bookShortCode($book->id) }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">

        function printContent(el){

            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
@endpush
