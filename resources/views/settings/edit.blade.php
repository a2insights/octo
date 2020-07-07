@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('settings') }}
    <div class="container p-4">
        <h1>Settings</h1>
        <hr>
        <div class="row">
            <div class="col">
                {!! form($form) !!}
            </div>
        </div>
    </div>
@endsection
