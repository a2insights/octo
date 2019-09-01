@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('edit post' , $post) }}
    <div class="container p-4">
        <h1>Update post</h1>
        <hr>
        <div class="row">
            <div class="col">
                {!! form($form) !!}
            </div>
        </div>
    </div>
@endsection
