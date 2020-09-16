@extends('frontend.user.layouts.app')

@section('title', 'Add Campaign')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <x-forms.post :action="route('frontend.user.library.admin.setting.save')" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="author" class="col-sm-4 col-form-label">Status Peminjaman</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input id="borrow" class="form-check-input" value="1" type="radio" name="can_borrow" {{ (getLibraryOption('can_borrow', 1) == 1)? "checked=''" : "" }}>
                                    <label for="borrow" class="form-check-label">Boleh</label>
                                </div>

                                <div class="form-check">
                                    <input id="cant_borrow" class="form-check-input" value="0" type="radio" name="can_borrow" {{ (getLibraryOption('can_borrow', 1) == 0)? "checked=''" : "" }}>
                                    <label for="cant_borrow" class="form-check-label">Tidak Boleh</label>
                                </div>
                                <small class="text-success font-weight-bold">*Proses pemulangan buku masih boleh dilakukan walaupun Status Pinjaman bertukar kepada 'Tidak Boleh'</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="borrow_duration" class="col-sm-4 col-form-label">Tempoh Pinjaman(Hari):</label>
                            <div class="col-sm-8">
                                <input name="borrow_duration" type="number" step="1" class="form-control" id="borrow_duration" value="{{ getLibraryOption('borrow_duration', 7) }}" placeholder="EX: 7">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fine" class="col-sm-4 col-form-label">Denda Lewat(hari):</label>
                            <div class="col-sm-8">
                                <input name="fine" type="number" step="0.01" class="form-control" id="fine" value="{{ getLibraryOption('fine', "0.20") }}" placeholder="EX: 0.20">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="max_student_borrow" class="col-sm-4 col-form-label">Pinjaman Buku(Maksima):</label>
                            <div class="col-sm-8">
                                <input name="max_student_borrow" type="number" step="1" class="form-control" id="max_student_borrow" value="{{ getLibraryOption('max_student_borrow', 2) }}" placeholder="EX: 2">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan Tetapan</button>
                    </div>
                    <!-- /.card-footer -->
                </x-forms.post>
            </div>
            <div class="card">
                <x-forms.post :action="route('frontend.user.library.admin.setting.add-prefect')" class="form-horizontal">
                    <div class="card-body">
                        <h5>Pengawas Perpustakan</h5>
                        <div class="form-group row">
                            <label for="max_student_borrow" class="col-sm-4 col-form-label">Tambah Pengawas:</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" id="no_ic" name="no_ic">
                                    <option>-- PILIH PELAJAR --</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->no_ic }}" value="{{ (old('no_ic') == $student->no_ic)? "checked" : "" }}">{{ $student->no_ic." - ".$student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_student_borrow" class="col-sm-4 col-form-label"></label>

                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success float-right">Tambah Senarai</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>NO. K/P</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prefects as $ic => $name)
                                    <tr>
                                        <td>{{ $ic }}</td>
                                        <td>{{ $name }}</td>
                                        <td><a class="btn btn-danger btn-sm" href="{{ route('frontend.user.library.admin.setting.remove-prefect', $ic) }}" onclick="return confirm('adakah anda pasti untuk membuang pelajar ini dari senarai kelas?')">Padam</a> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('frontend.user.library.index') }}" class="btn btn-warning"> Kembali Menu Utama</a>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
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
