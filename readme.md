# HasBlog 1.0

### The clean blog system

[![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

> ### Example Laravel blog containing (posts, blogs, auth, registration advanced patterns and more)
PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)


Clone the repository

    git clone https://github.com/Atiladanvi/hasblog.git

Switch to the repo folder

    cd has-blog

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Publish vendor files

    php artisan vendor:publish --provider="CleanHasBlog\CleanHasBlogServiceProvider"    

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

### [All Rigth Now]( https://www.youtube.com/watch?v=rl51s5Osutg) :notes: :notes:



**TL;DR command list**

    git clone https://github.com/Atiladanvi/hasblog.git
    cd has-blog
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

# Code overview

## Dependencies

- [atiladanvi/clean-hasblog](https://github.com/Atiladanvi/clean-hasblog) - Default theme created by me.
- [yoeunes/toastr](https://github.com/yoeunes/toastr) -Toastr.js notifications for Laravel.
- [kris/laravel-form-builder](https://github.com/kristijanhusak/laravel-form-builder) - Form builder for Laravel 5 inspired by Symfony's form builder.
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission) - Associate users with roles and permissions.
- [adavejamesmiller/laravel-breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbst) - A simple Laravel-style way to create breadcrumbs

#### Is something missing? submit a PR please ;)
