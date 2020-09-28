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
                    <x-forms.post :action="route('frontend.user.library.admin.book.update-parent', $book->id)" class="form-horizontal">
                        <div class="card-body">
                            <p class="m-5 text-sm text-danger">
                                <b>*Perhatian</b> : Borang mengemaskini maklumat buku ini mempunyai dua(2) bahagian iaitu:<br>
                                <i class="ml-5">1. Borang A - Menjejaskan maklumat salinan yang lain. <br></i>
                                <i class="ml-5">2. Borang B - Hanya menjejaskan salian ini sahaja.</i>
                            </p>

                            <h4 class="text-center mb-4">A. Kemaskini Malumat Buku</h4>
                            <div class="form-group row">
                                <label for="country" class="col-sm-2 col-form-label">Tajuk/Judul</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" value="{{ $book->parent->title }}" id="country" class="form-control text-uppercase" autocomplete="off">
                                    <div id="country_list"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="group" class="col-sm-2 col-form-label form">Kelas (Perpuluhan Dewey)</label>
                                <div class="col-md-6">
                                    <select class="form-control select2" id="group" name="group">
                                    @foreach(getDewey() as $group)
                                        <optgroup label="{{ $group->code." - ".$group->name }}">
                                            @foreach($group->subs as $sub)
                                                <option value="{{ $sub->id }}" {{ ($book->parent->g_sub_id == $sub->id)? "checked" : "" }}>{{ $sub->code." - ".$sub->name }}</option>
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
                                           <input id="fiction" class="form-check-input" value="1" type="radio" name="is_fiction" {{ ( $book->parent->is_fiction == 1)? "checked=''" : "" }}>
                                           <label for="fiction" class="form-check-label">Fiksyen</label>
                                       </div>

                                       <div class="form-check">
                                           <input id="not_fiction" class="form-check-input" value="0" type="radio" name="is_fiction" {{ ($book->parent->is_fiction == 0)? "checked=''" : "" }}>
                                           <label for="not_fiction" class="form-check-label">Bukan Fiksyen</label>
                                       </div>

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="author" class="col-sm-2 col-form-label">Status Peminjaman</label>
                                   <div class="col-md-4">
                                       <div class="form-check">
                                           <input id="borrow" class="form-check-input" value="1" type="radio" name="is_borrow" {{ ($book->parent->is_borrow == 1)? "checked=''" : "" }}>
                                           <label for="borrow" class="form-check-label">Boleh Dipinjam</label>
                                       </div>

                                       <div class="form-check">
                                           <input id="cant_borrow" class="form-check-input" value="0" type="radio" name="is_borrow" {{ ($book->parent->is_borrow == 0)? "checked=''" : "" }}>
                                           <label for="cant_borrow" class="form-check-label">Tidak Boleh Dipinjam</label>
                                       </div>

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="author" class="col-sm-2 col-form-label">Pengarang</label>
                                   <div class="col-md-4">
                                       <input type="text" name="author" value="{{ $book->parent->author->name }}" id="author" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="publisher" class="col-sm-2 col-form-label">Penerbit</label>
                                   <div class="col-md-4">
                                       <input type="text" name="publisher" value="{{ $book->parent->publisher->name }}" id="publisher" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="pages" class="col-sm-2 col-form-label">Bil. Muka Surat</label>
                                   <div class="col-md-2">
                                       <input type="number" step="1" name="pages" value="{{ $book->parent->pages }}"  id="pages" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="price" class="col-sm-2 col-form-label">Harga(RM)</label>
                                   <div class="col-md-2">
                                       <input type="number" step="0.01" name="price" value="{{ $book->parent->price }}" id="price" class="form-control">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="group" class="col-sm-2 col-form-label form">Padam</label>
                                   <div class="col-md-6">
                                       <button class="btn btn-danger" data-url="{{ route('frontend.user.library.admin.book.delete-parent', $book->parent->id) }}" data-title="Amaran" data-delete="Adakah anda ingin memadam ini semua buku dibawah induk ini?"><i class="fa fa-trash"></i> Padam Induk</button>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Kemaskini Buku</button>
                        </div>
                        <!-- /.card-footer -->
                    </x-forms.post>
                </div>
                <div class="card card-info">
                    <x-forms.post :action="route('frontend.user.library.admin.book.update', $book->id)" class="form-horizontal">
                        <div class="card-body">

                            <h4 class="text-center mb-4">B. Kemaskini Malumat Salinan</h4>

                            <div class="form-group row">
                                <label for="book_id" class="col-sm-2 col-form-label">No Perolehan Buku</label>
                                <div class="col-md-4">
                                    <input type="text" name="book_id" value="{{ getBookId($book->id) }}" id="book_id" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="payment" class="col-sm-2 col-form-label">Punca Bayaran</label>
                                <div class="col-md-4">
                                    <input type="text" name="payment" value="{{ $book->payment->name }}" id="payment" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="remark" class="col-sm-2 col-form-label">Tanda Buku</label>
                                <div class="col-md-10">
                                    <textarea name="remark" id="remark" class="form-control">{{ $book->remark }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group" class="col-sm-2 col-form-label form">Padam</label>
                                <div class="col-md-6">
                                    <button class="btn btn-danger" data-url="{{ route('frontend.user.library.admin.book.delete-child', $book->id) }}" data-title="Amaran" data-delete="Adakah anda ingin memadam buku ini?"><i class="fa fa-trash"></i> Padam Salinan Sahaja</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Kemaskini Salinan</button>
                        </div>
                        <!-- /.card-footer -->
                    </x-forms.post>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('after-scripts')
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
