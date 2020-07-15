@extends('material-admin::index')
@section('title', 'List Posts')
@section('content')
    {{ Breadcrumbs::render('posts') }}
    <div class="float-right mb-4">
        <a href="post/create" role="button" class="btn btn-outline-primary">New Post</a>
    </div>
    <x-octo-card-material
        title="Posts"
        description="List posts"
    >
        <x-octo-table :table="$table"/>
    </x-octo-card-material>
@endsection
