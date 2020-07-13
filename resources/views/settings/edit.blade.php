@extends('material-admin::index')
@section('title', 'Settings')
@section('content')
    {{ Breadcrumbs::render('settings') }}
    <x-octo-card-material
        title="Settings"
        description="Configure your environment"
    >
        {!! form($form) !!}
    </x-octo-card-material>
@endsection
