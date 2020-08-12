@extends('frontend.user.layouts.app')

@section('title', 'Pengurusan Buku / Tambah Buku')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="card card-info">
                    <form method="get" class="form-horizontal">
                        <div class="card-body">

                            <h4 class="text-center mb-4">Cetak Label Buku</h4>
                            <div class="input-group input-group-lg">
                                <input type="text"  id="title" name="title" value="{{ request('title') }}" placeholder="Judul/Tajuk Buku" class="form-control" autofocus>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-left">Cari</button>

                            <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-info float-right"><i class="fa fa-home"></i> Kembali</a>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="text-center" id="total"></h5>
                            @if(!is_null($parents))
                                <x-forms.post :action="route('frontend.user.library.admin.book.add-print-label')">
                                    <h3 class="text-center">Senarai Buku</h3>
                                    <button type="submit" class="btn btn-success m-4 float-right">Tambah Senarai</button>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select_all" name="select_all" value="1"></th>
                                            <th>No Perolehan</th>
                                            <th>Tajuk</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($parents->count() > 0)
                                            @foreach($parents as $parent)
                                                @foreach($parent->books as $book)
                                                    <tr>
                                                        <td><input type="checkbox" id="book_{{ $book->id }}" name="book[]" value="{{ $book->id }}"></td>
                                                        <td>{{ getBookId($book->id) }}</td>
                                                        <td><a href="{{ route('frontend.user.library.admin.book.print-label', "title=$parent->title") }}">{{ $parent->title }}</a></td>
                                                        <td>{!! badgeBookStatus($book->status) !!}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="bg-warning text-center">Tiada buku dijumpai "{{ request('title') }}"</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </x-forms.post>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{ route('frontend.user.library.admin.book.print-label-remove-all') }}" class="btn btn-danger btn-sm m-2" onclick="return confirm('Adakah anda pasti untuk mengosongkan senarai?')"><i class="fa fa-trash"></i> Kosongkan Senarai</a>
                            <a href="{{ route('frontend.user.library.admin.book.print-label-now') }}" class="btn btn-success btn-sm m-2" onclick="return confirm('Adakah anda sudah selesai memilih buku?')"><i class="fa fa-print"></i> Cetak Senarai</a>
                            <table class="table table-responsive table-sm">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">Tajuk Buku</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($added as $key => $item)
                                <tr>
                                    <td><a href="{{ route('frontend.user.library.admin.book.print-label-remove', $key) }}" class="btn btn-danger" onclick="return confirm('Adakah anda pasti untuk menyingkirkan buku ini?')"><i class="fa fa-times"></i> </a></td>
                                    <td>{{ getBookId($key)." - ".$item }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>

        $('#select_all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $('input[name="book[]"]').each(function() {
                    this.checked = true;
                });
            }
            else {
                $('input[name="book[]"]').each(function() {
                    this.checked = false;
                });
            }
        });


        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

        function countTotal() {


            var total=$('input[name="book[]"]:checked').length;
            console.log(total);

            if(total < 1){
                $("#total").text("Sila Pilih buku.").addClass("text-info").removeClass("text-success");
            }else{
                $("#total").text("Jumlah dipilih: "+total).addClass("text-success").removeClass("text-info");
            }
        }


        $('input[name="book[]').change(function() {
            countTotal();
        });
    </script>
@endpush
