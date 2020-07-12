@extends('material-admin::index')
@section('title', 'Create Post')
@section('content')
{{ Breadcrumbs::render('create post') }}
    <div class="container p-4">
        <h1>New Post</h1>
        <hr>
        <div class="row">
            <div class="col">
                {!! form($form) !!}
            </div>
        </div>
    </div>
@endsection
