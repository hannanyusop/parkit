@extends('frontend.user.layouts.app')

@section('title', 'Resit Denda Lewat Hantar')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                            <h5 class="text-center">PERPUSTAKAAN SMK AGAMA LIMBANG</h5>
                        <p class="text-center"><b>YRA5101</b><br>Km 11.7,Jalan Pandaruan, Peti Surat 493, 98700, Limbang, Sarawak</p>

                        <table class="table table-no-bordered">
                            <tr>
                                <td>Denda Lewat</td>
                                <td>{{ $fine->total_day }} hari</td>
                                <td>{{ displayPrice($fine->actual_rm) }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right font-weight-bold">Jumlah</td>
                                <td class="font-weight-bold">:{{ displayPrice($fine->actual_rm) }}</td>
                            </tr>
                        </table>

                        <hr>
                        <p class="text-sm text-success">Sila Tekan 'Seterusnya' untuk mengabaikan bayaran</p>
                        <x-forms.post :action="route('frontend.user.library.borrow.borrow-add-list')">
                            <div class="form-group row">
                                <label for="cash" class="col-sm-4 col-form-label">Bayaran</label>
                                <div class="col-sm-8">
                                    <input type="number" name="cash" step="0.01" class="form-control" id="cash" value="{{ $fine->actual_rm }}">
                                </div>
                            </div>
                        </x-forms.post>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Terima Bayaran</button>
                        <button type="submit" class="btn btn-primary float-right">Seterusnya</button>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
