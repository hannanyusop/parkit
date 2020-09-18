@extends('frontend.user.layouts.app')

@section('title', 'Pengurusan Portal')

@section('content')
    <section class="content">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h3 class="card-title">Senarai Halaman</h3>
                   </div>
               </div>
           </div>
           @foreach($lists as $key => $page)
               <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                   <article class="article">
                       <div class="article-header">
                           <div class="article-image" data-background="{{ $page['route'] }}" style="background-image: url({{ $page['route'] }});"></div>
                           <div class="article-title">
                               <h2><a href="#">{{ strtoupper($key) }}</a></h2>
                           </div>
                       </div>
                       <div class="article-details">
                           <div class="article-cta">
                               <a href="{{ $page['route'] }}" class="btn btn-primary">Kemaskini</a>
                           </div>
                       </div>
                   </article>
               </div>
           @endforeach
       </div>

    </section>
@endsection
