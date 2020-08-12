@extends('frontend.user.layouts.app')

@section('title', 'Pengurusan Buku / Tambah Buku')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.admin.book.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card card-info">
                    <x-forms.post :action="route('frontend.user.library.admin.book.insert')" class="form-horizontal">
                        <div class="card-body">

                            <h4 class="text-center mb-4">Daftar Buku</h4>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Salin Buku Berdaftar</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="" autofocus>
                                    <span class="text-sm text-info font-weight-bold">*Sila Imbas Kod Bar Atau Masukan Nombor Perolehan Buku</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_per" class="col-sm-2 col-form-label">No. Perolehan</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input type="number" name="no_per" value="{{ old('no_per') }}" id="no_per" placeholder="" class="form-control">
                                    </div>
                                    <small class="text-sm text-info font-weight-bold">*Sila Kosongkan Jika Tiada | Nombor Sahaja | Maksimum 8 Digit</small>
                                    <p class="font-weight-light">NO. Perolehan Seterusnya : {{ getBookId($last_book_id) }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-sm-2 col-form-label">Tajuk/Judul</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" value="{{ old('title') }}" id="country" class="form-control text-uppercase" autocomplete="off">
                                    <div id="country_list"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="group" class="col-sm-2 col-form-label form">Kelas (Perpuluhan Dewey)</label>
                                <div class="col-md-6">
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
                            </div>
                           <div id="other">
                               <div class="form-group row">
                                   <label for="author" class="col-sm-2 col-form-label">Jenis Buku</label>
                                   <div class="col-md-4">
                                       <div class="form-check">
                                           <input id="fiction" class="form-check-input" value="1" type="radio" name="is_fiction" {{ (old('is_fiction') == 1)? "checked=''" : "" }}>
                                           <label for="fiction" class="form-check-label">Fiksyen</label>
                                       </div>

                                       <div class="form-check">
                                           <input id="not_fiction" class="form-check-input" value="0" type="radio" name="is_fiction" {{ (old('is_fiction') == 0)? "checked=''" : "" }}>
                                           <label for="not_fiction" class="form-check-label">Bukan Fiksyen</label>
                                       </div>

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="author" class="col-sm-2 col-form-label">Status Peminjaman</label>
                                   <div class="col-md-4">
                                       <div class="form-check">
                                           <input id="borrow" class="form-check-input" value="1" type="radio" name="is_borrow" {{ (old('is_borrow') == 1)? "checked=''" : "" }}>
                                           <label for="borrow" class="form-check-label">Boleh Dipinjam</label>
                                       </div>

                                       <div class="form-check">
                                           <input id="cant_borrow" class="form-check-input" value="0" type="radio" name="is_borrow" {{ (old('is_borrow') == 0)? "checked=''" : "" }}>
                                           <label for="cant_borrow" class="form-check-label">Tidak Boleh Dipinjam</label>
                                       </div>

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="author" class="col-sm-2 col-form-label">Pengarang</label>
                                   <div class="col-md-4">
                                       <input type="text" name="author" value="{{ old('author') }}" id="author" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="publisher" class="col-sm-2 col-form-label">Penerbit</label>
                                   <div class="col-md-4">
                                       <input type="text" name="publisher" value="{{ old('publisher') }}" id="publisher" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="pages" class="col-sm-2 col-form-label">Bil. Muka Surat</label>
                                   <div class="col-md-2">
                                       <input type="number" step="1" name="pages" value="{{ old('pages') }}"  id="pages" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="price" class="col-sm-2 col-form-label">Harga(RM)</label>
                                   <div class="col-md-2">
                                       <input type="number" step="0.01" name="price" value="{{ old('price') }}" id="price" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="payment" class="col-sm-2 col-form-label">Punca Bayaran</label>
                                   <div class="col-md-4">
                                       <input type="text" name="payment" value="{{ old('payment') }}" id="payment" class="form-control">
                                   </div>
                               </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Hantar</button>
                        </div>
                        <!-- /.card-footer -->
                    </x-forms.post>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#country').on('keyup',function() {
                var query = $(this).val();

                if(query.length > 2){
                    $.ajax({
                        url:"{{ route('frontend.user.library.admin.book.check-title') }}",
                        type:"GET",
                        data:{'title':query},
                        success:function (data) {

                            if(data == ""){
                                clearAutoFill();
                            }
                            $('#country_list').html(data);
                        }
                    })
                }

            });


            $(document).on('click', 'li', function(){

                var value = $(this).text();
                book_id = $(this).data('book_id');
                autoFill(book_id);
                $('#country').val(value);
                $('#country_list').html("");
            });

            function autoFill(book_id) {
                $.ajax({
                    url:"{{ route('frontend.user.library.admin.book.auto-fill') }}",
                    type:"GET",
                    data:{'book_id':book_id},
                    success:function (data) {
                        item = data.data;

                        $("#publisher").val(item.publisher).prop('readonly', true);
                        $("#author").val(item.author).prop('readonly', true);
                        $("#price").val(item.price).prop('readonly', true);
                        $("#pages").val(item.pages).prop('readonly', true);
                        $("#payment").val(item.payment).prop('readonly', true);

                        if(item.is_fiction == 1){
                            $("#fiction").val(item.payment).prop('checked', true);
                            $("#not_fiction").val(item.payment).prop('checked', false);

                        }else{
                            $("#not_fiction").val(item.payment).prop('checked', true);
                            $("#fiction").val(item.payment).prop('checked', false);

                        }

                        if(item.is_borrow == 1){
                            $("#borrow").val(item.payment).prop('checked', true);
                            $("#cant_borrow").val(item.payment).prop('checked', false);
                        }else{
                            $("#cant_borrow").val(item.payment).prop('checked', true);
                            $("#borrow").val(item.payment).prop('checked', false);

                        }

                        // $('#group option').removeAttr('selected').filter('[value=' + item.group_id+ ']').attr('selected', true);
                    }
                })
            }

            function clearAutoFill() {
                $("#publisher").val("").prop('readonly', false);
                $("#author").val("").prop('readonly', false);
                $("#price").val("").prop('readonly', false);
                $("#pages").val("").prop('readonly', false);
                $("#payment").val("").prop('readonly', false);
            }
        });
    </script>
    <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
