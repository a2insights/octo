@extends('layouts.app')

@section('content')
   <div class="container">
       {{ Breadcrumbs::render('create post') }}
       <h1>Update a new Post</h1>
       <hr>
       <div class="row">
           <div class="col">
               {!! form($form) !!}
           </div>
       </div>
   </div>
@endsection
