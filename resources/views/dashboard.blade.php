@extends('material-admin::index')
@section('title', 'Dashboard')
@section('content')
    {{ Breadcrumbs::render('dashboard') }}
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <x-octo-counter-material
                    title="Blogs"
                    icon="web"
                    variant="primary"
                    :stats="['route' => '#', 'description' => 'Upgrade to more blogs']"
                    count="1"
                />
            </div>
            <div class="col-sm-6 col-lg-3">
                <x-octo-counter-material
                    title="Posts"
                    icon="library_books"
                    variant="warning"
                    :stats="['description' => 'Posts in the current blog']"
                    count="{{ $posts_count }}"
                />
            </div>
            <div class="col-sm-6 col-lg-3">
                <x-octo-counter-material
                    title="Collaborators"
                    icon="peoples"
                    variant="danger"
                    :stats="['route' => '#', 'description' => 'Upgrade to add']"
                    count="0"
                />
            </div>
            <div class="col-sm-6 col-lg-3">
                <x-octo-counter-material
                    title="Domains"
                    icon="language"
                    variant="success"
                    :stats="['route' => '#', 'description' => 'Upgrade to get domains']"
                    description="Upgrade to get domains"
                    count="0"
                />
            </div>
        </div>
    </div>
@endsection
