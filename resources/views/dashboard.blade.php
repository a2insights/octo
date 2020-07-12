@extends('material-admin::index')
@section('title', 'Dashboard')
@section('content')
    {{ Breadcrumbs::render('dashboard') }}
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Posts</h3>
                        <p>{{ $posts_count }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
