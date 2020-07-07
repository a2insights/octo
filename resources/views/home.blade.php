@extends('layouts.site')
@section('content')
    <div style="align-items: center;display: flex; height: 70vh" class="text-center">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col">
                   <h1 class="display-4">HasBlog</h1>
                   <div class="text-center">
                       @foreach($blogs as $blog)
                           <a class="m-2 btn-outline-primary btn-link btn" href="/{{$blog->path}}">{{$blog->name}}</a>
                       @endforeach
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection
