@extends('frontend.user.layouts.app')

@section('title', 'Cetak Label Buku')


<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Perpustakaan' => route('frontend.user.library.index'),
    'Pengurusan Buku' => route('frontend.user.library.admin.book.index'),
    'Cetak Label v2' => '#'
];

$count = 1;
?>

@section('content')
    <div class="row">
            <div class="col-md-12">
                @if(!is_null($books))
                    <button class="btn btn-success" onclick="printContent('print');" >Print</button>
                    <a href="{{ route('frontend.user.library.admin.book.print-label-range') }}" class="btn btn-danger">
                        Reset
                    </a>
                    <div class="card-body m-md-5" id="print">

                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-md-6">
                                    <div class="" style="border-style: dotted;width: 410px">
                                        {!! barCodePrint($book->id, 2,50) !!}
                                    </div>
                                    <div class="text-center" style="border-style: dotted;height:70px;width: 110px;margin-top: -17px;margin-bottom: -17px;">
                                        <h5 class="mt-3">{{ bookShortCode($book->id) }}</h5>
                                    </div>

{{--                                    @if($count <= 12)--}}
{{--                                        @php $count++ @endphp--}}
{{--                                    @else--}}
{{--                                        @php $count = 1; @endphp--}}
{{--                                    @endif--}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center mb-4">Cetak Senarai Buku</h4>
                            <x-forms.get>
                                <div class="row">
                                    <div class="col-5">
                                        <input name="start" type="number" class="form-control" value="{{ request('start') }}" placeholder="DARI  (NOMBOR PEROLEHAN)">
                                    </div>
                                    <div class="col-5">
                                        <input name="end" type="number" class="form-control" value="{{ request('end') }}" placeholder="HINGGA (NOMBOR PEROLEHAN)">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-info">Hantar</button>
                                    </div>
                                </div>
                            </x-forms.get>
                        </div>
                        <!-- /.card-body -->
                    </div>
                @endif
            </div>
        </div>
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
