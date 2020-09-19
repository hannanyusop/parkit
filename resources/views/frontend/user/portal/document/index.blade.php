@extends('frontend.user.layouts.app')

@section('title', 'Dokumen')

<?php
$breadcrumbs = [
    'Dashboard' => route('frontend.user.dashboard'),
    'Pengurusan Portal' => route('frontend.user.portal.index'),
    'Dokumen' => route('frontend.user.portal.document.index'),
];
?>

@section('content')
    <section class="content">

        <h2 class="section-title">Senarai Dokumen</h2>
        <p class="section-lead">Pastikan kategori dokumen adalah betul.</p>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                        <a href="{{ route('frontend.user.portal.document.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Dokumen</a>
                    </div>
                </div>
                <div class="card-body">

                    <form class="form-inline mb-3" method="get">
                        <label class="sr-only" for="name">Tajuk</label>
                        <input type="text" name="name" class="form-control mb-2 mr-sm-2 col-md-4" id="name" value="{{ request('name') }}" placeholder="Tajuk Pengunguman">

                        <label class="sr-only" for="group">Tajuk</label>
                        <select class="form-control mb-2 mr-sm-2 col-md-4" name="group" id="group">
                                <option value="">SEMUA</option>
                            @foreach(portalGetDocumentGroup() as $key => $group)
                                <option value="{{ $key }}" {{ (request('group') == $key)? "selected" : "" }}>{{ $group }}</option>
                            @endforeach
                        </select>
                        <div class="input-group mb-2 mr-sm-2">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <a href="{{ route('frontend.user.portal.document.index') }}" class="btn btn-white">Reset</a>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tajuk</th>
                                <th>Kategory</th>
                                <th>Papar</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($documents as $key => $document)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <b>{{ $document->name }}</b><br>
                                        <small>{{ reformatDatetime($document->created_at, 'd-m-Y') }}</small>
                                    </td>
                                    <td class="text-center">{{ strtoupper(portalGetDocumentGroup($document->group)) }}</td>
                                    <td class="text-center">{!! ($document->is_show)? "<span class='badge badge-success'>YA</span>" : "<span class='badge badge-dark'>TIDAK</span>" !!}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item text-primary" href="{{ route('frontend.user.portal.document.view', $document->id) }}"><i class="fa fa-eye"></i> Lihat</a>
                                                <a class="dropdown-item text-info" href="{{ route('frontend.user.portal.document.edit', $document->id) }}"><i class="fa fa-edit"></i> Kemaskini</a>
                                                <button class="dropdown-item text-danger text-sm" data-url="{{ route('frontend.user.portal.document.delete', $document->id) }}" data-title="Pengunguman" data-delete="Adakah anda ingin memadam ini pengunguman ini?"><i class="fa fa-trash"></i> Padam</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="m-2">
                            {{ $documents->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
