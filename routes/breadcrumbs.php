<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('resgister', route('register'));
});

// Home > Login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('login', route('login'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail , $blog) {
    $trail->parent('home');
    $trail->push($blog->title, route('category', $blog->id));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard', tenant()->id));
});

// Home > Dashboard > [ post ]
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('post.index', tenant()->id));
});

// Home > Dashboard > [ post ] [ create ]
Breadcrumbs::for('create post', function ($trail) {
    $trail->parent('posts');
    $trail->push('create post', route('post.create', tenant()->id));
});

// Home > Blog > [post create] > [post update]
Breadcrumbs::for('edit post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push($post->title, route('post.edit', [tenant()->id, $post->id]));
});
