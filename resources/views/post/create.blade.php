@extends('material-admin::index')
@section('title', 'New Post')
@section('content')
    {{ Breadcrumbs::render('create post') }}
    <x-octo-card-material
        title="Post"
        description="Create a new post"
    >
        {!! form($form) !!}
    </x-octo-card-material>
@endsection
