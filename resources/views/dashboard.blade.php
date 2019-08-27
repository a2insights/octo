@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('dashboard') }}
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
