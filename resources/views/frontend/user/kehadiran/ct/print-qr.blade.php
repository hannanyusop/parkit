@extends('frontend.user.layouts.app')

@section('title', 'Senarai Pelajar')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'E-Hadir' => route('frontend.user.kehadiran.ct.index'),
    'Senarai Kelas' => route('frontend.user.kehadiran.ct.index'),
    'Cetak QR' => ''
];
?>

@section('content')
    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="" id="print">
                        <p class="text-center text-uppercase font-weight-bold">SENARAI PELAJAR {{ $class->generate_name }} BAGI TAHUN {{ date('Y') }}
                            <br>
                            {{ $class->currentStudent->count() }} Pelajar
                        </p>
                        <div class="row">
                            @foreach($class->currentStudent as $key=> $has_student)
                                <div class="col-2 text-center">
                                    {{ getKehadiranStudent($has_student->student->no_ic) }}<br>
                                    <small>{{ limitString($has_student->student->name, 10, '') }}</small>

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="" type="submit" class="btn btn-info" onclick="printContent('print');"><i class="fa fa-print"></i> Cetak QR</a>
                    <a href="{{ route('frontend.user.kehadiran.ct.index') }}" type="submit" class="btn btn-warning"> Kembali</a>
                </div>
                    <!-- /.card-footer -->
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