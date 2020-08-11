@extends('frontend.user.layouts.app')

@section('title', 'Add Campaign')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <x-forms.post :action="route('frontend.user.library.admin.setting.save')" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="borrow_duration" class="col-sm-4 col-form-label">Tempoh Pinjaman(Hari):</label>
                            <div class="col-sm-8">
                                <input name="borrow_duration" type="number" step="1" class="form-control" id="borrow_duration" value="7" placeholder="EX: 7">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fine" class="col-sm-4 col-form-label">Denda Lewat(hari):</label>
                            <div class="col-sm-8">
                                <input name="fine" type="number" step="0.01" class="form-control" id="fine" value="0.20" placeholder="EX: 0.20">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="max_student_borrow" class="col-sm-4 col-form-label">Pinjaman Buku(Maksima):</label>
                            <div class="col-sm-8">
                                <input name="max_student_borrow" type="number" step="1" class="form-control" id="max_student_borrow" value="2" placeholder="EX: 2">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('frontend.user.library.index') }}" class="btn btn-warning"> Kembali Menu Utama</a>
                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan Tetapan</button>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(function () {
            $('#campaigndatetime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'YYYY/MM/DD HH:mm'
                }
            })

        })
    </script>
@endpush
