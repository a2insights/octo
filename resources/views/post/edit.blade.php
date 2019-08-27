@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('edit post' , $post) }}
        <h1>Update post</h1>
        <hr>
        <div class="row">
            <div class="col">
                {!! form($form) !!}
            </div>
        </div>
    </div>
@endsection
