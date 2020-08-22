@extends('frontend.user.layouts.app')

@section('title', 'Pengurusan Buku / Tambah Buku')

@push('after-styles')
    <style>
        @media print{@page {size: landscape}}
        small{
            /*line-height:0.1em;*/
            /*margin-bottom: 0;*/
            font-size : 10px;
            padding : 0;
            margin : 0;
            line-height : 0px;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
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
                                    <button class="btn btn-success" onclick="printContent('print');" >Cetak</button>
                                </div>
                            </div>
                        </x-forms.get>
                    </div>
                    <!-- /.card-body -->
                </div>
                @if(!is_null($books))
                    <div class="card card-info" id="print">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <tr class="text-center">
                                        <td width="8%">1</td>
                                        <td width="15%">2</td>
                                        <td width="15%">3</td>
                                        <td width="15%">4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td width="10%">12</td>
                                    </tr>
                                    <tr class="text-center text-sm">
                                        <td>Nombor<br>Perolehan</td>
                                        <td>Pengarang</td>
                                        <td>Tajuk Buku/Tajuk Siri</td>
                                        <td>Penerbit, Tempat &<br> Tarikh Terbitan</td>
                                        <td>Nombor <br>Panggilan</td>
                                        <td>Harga<br>$</td>
                                        <td>Punca <br>Bayaran</td>
                                        <td>Punca <br>Perolehan</td>
                                        <td>Tarikh<br> Perolehan</td>
                                        <td>III./Tbg</td>
                                        <td>Bil. M.S.</td>
                                        <td>CATATAN</td>
                                    </tr>
                                    @foreach($books as $book)
                                        <tr class="text-center text-sm">
                                            <td>{{ $book->id }}</td>
                                            <td><small>{{ $book->parent->author->name }}</small></td>
                                            <td><small>{{ $book->parent->title }}</small></td>
                                            <td><small>{{ $book->parent->publisher->name }}</small></td>
                                            <td></td>
                                            <td><small>{{ displayPrice($book->parent->price) }}</small></td>
                                            <td><small>{{ $book->payment->name }}</small></td>
                                            <td><small>{{ $book->payment->name }}</small></td>
                                            <td><small>{{ reformatDatetime($book->created_at, 'd-m-Y') }}</small></td>
                                            <td></td>
                                            <td><small>{{ $book->payment->name }}</small></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
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
