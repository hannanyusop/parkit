@extends('frontend.user.layouts.app')

@section('title', 'Pengunguman')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Pengurusan Portal' => route('frontend.user.portal.index'),
    'Pengunguman' => route('frontend.user.portal.announcement.index'),
];
?>

@section('content')
    <section class="content">

        <h2 class="section-title">Senarai Pengunguman</h2>
        <p class="section-lead">Pengunguman akan disusun mengikut tarikh pengunguman.</p>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                        <a href="{{ route('frontend.user.portal.announcement.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengunguman</a>
                    </div>
                </div>
                <div class="card-body">

                    <form class="form-inline mb-3" method="get">
                        <label class="sr-only" for="title">Tajuk</label>
                        <input type="text" name="title" class="form-control mb-2 mr-sm-2 col-md-6" id="title" value="{{ request('title') }}" placeholder="Tajuk Pengunguman">

                        <div class="input-group mb-2 mr-sm-2">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <a href="{{ route('frontend.user.portal.announcement.index') }}" class="btn btn-white">Reset</a>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tajuk</th>
                                <th>kepada</th>
                                <th>Papar</th>
                                <th>Papar Sehingga</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($announcements as $key => $announcement)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <b>{{ $announcement->title }}</b><br>
                                        <small>{{ reformatDatetime($announcement->date, 'd-m-Y') }}</small>
                                    </td>
                                    <td class="text-center">{{ strtoupper($announcement->group) }}</td>
                                    <td class="text-center">{!! ($announcement->is_show)? "<span class='badge badge-success'>YA</span>" : "<span class='badge badge-dark'>TIDAK</span>" !!}</td>
                                    <td class="text-center">{{ $announcement->show_until }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item text-primary" href="{{ route('frontend.user.portal.announcement.view', $announcement->id) }}"><i class="fa fa-eye"></i> Lihat</a>
                                                <a class="dropdown-item text-info" href="{{ route('frontend.user.portal.announcement.edit', $announcement->id) }}"><i class="fa fa-edit"></i> Kemaskini</a>
                                                <button class="dropdown-item text-danger text-sm" data-url="{{ route('frontend.user.portal.announcement.delete', $announcement->id) }}" data-title="Pengunguman" data-delete="Adakah anda ingin memadam ini pengunguman ini?"><i class="fa fa-trash"></i> Padam</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="m-2">
                            {{ $announcements->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
