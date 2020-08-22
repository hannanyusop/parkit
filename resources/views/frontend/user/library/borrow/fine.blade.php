@extends('frontend.user.layouts.app')

@section('title', 'Library')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.library.borrow.layout.side-div')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No. Kad Pengenalan</th>
                                <th>Jenis Denda</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>No. Kad Pengenalan</th>
                                <th>Jenis Denda</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($fines as $key => $fine)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $fine->student->name }}</td>
                                <td>{{ $fine->student->no_ic }}</td>
                                <td>{!! libFineStatus($fine->type) !!}</td>
                                <td>{{ ($fine->nego_rm != 0)? displayPrice($fine->nego_rm) : displayPrice($fine->actual_rm) }}</td>
                                <td>{!! libFineStatus($fine->paid) !!}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="m-4">
{{--                            {{ $fines->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable( {
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            } );
        } );
    </script>
@endpush
