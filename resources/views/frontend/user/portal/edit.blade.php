@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <p>{{ $page->name }}</p>
       <div class="row">
           @if(!is_null($texts))
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h3 class="card-title">Isi kandungan</h3>
                   </div>
                   <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                           <tr>
                               <th style="width: 10px">#</th>
                               <th>Kumpulan</th>
                               <th style="width: 40px">Label</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($texts as $key => $text)
                               <tr>
                                   <td>{{ $key+1 }}</td>
                                   <td>{{ $text->name }}</td>
                                   <td><a href="{{ route('frontend.user.portal.edit.text', [$text->page_id, $text->id]) }}" class="btn btn-info btn-sm">Kemaskini</a> </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
           @endif
               @if(!is_null($directories))
                   <div class="col-md-12">
                       <div class="card">
                           <div class="card-header">
                               <h3 class="card-title">Directory</h3>
                           </div>
                           <div class="card-body">
                               <div class="m-2 float-right">
                                   <a href="{{ route('frontend.user.portal.edit.add-directory', $page_id) }}"><i class="fa fa-plus"></i> Tambah</a>
                               </div>
                               <table class="table table-bordered">
                                   <thead>
                                   <tr>
                                       <th style="width: 10px">#</th>
                                       <th>Kumpulan</th>
                                       <th>Gambar</th>
                                       <th>Nama</th>
                                       <th>Jawatan</th>
                                       <th>Urutan</th>
                                       <th style="width: 40px">Label</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($directories as $key => $directory)
                                       <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $directory->group }}</td>
                                           <td><img width="100px" src="{{ asset($directory->image) }}"></td>
                                           <td>{{ $directory->name }}</td>
                                           <td>{{ $directory->position }}</td>
                                           <td>{{ $directory->order }}</td>
                                           <td><a href="{{ route('frontend.user.portal.edit.edit-directory', [$directory->page_id, $directory->id]) }}" class="btn btn-info btn-sm">Kemaskini</a> </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               @endif
       </div>

    </section>
@endsection
