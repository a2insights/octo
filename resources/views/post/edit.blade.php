@extends('material-admin::index')
@section('title', 'Edit Post')
@section('content')
    {{ Breadcrumbs::render('edit post', $post) }}
    <x-octo-card-material
        title="Post"
        description="Edit post"
    >
        {!! form($form) !!}
    </x-octo-card-material>
@endsection
