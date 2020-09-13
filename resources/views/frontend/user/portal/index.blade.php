@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h3 class="card-title">Senarai Bahgian</h3>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                           <tr>
                               <th style="width: 10px">#</th>
                               <th>Kumpulan</th>
                               <th>Pautan</th>
                               <th style="width: 40px">Label</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($pages as $key => $page)
                               <tr>
                               <td>{{ $key+1 }}</td>
                               <td>{{ $page->group }}</td>
                               <td><a href="{{ route($page->route) }}" target="_blank">{{ route($page->route) }}</a> </td>
                               <td><a href="{{ route('frontend.user.portal.group', $page->group) }}" class="btn btn-info btn-sm">Pilih</a> </td>
                           </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
                   <!-- /.card-body -->
               </div>
               <!-- /.card -->
               <!-- /.card -->
           </div>
       </div>

    </section>
@endsection
