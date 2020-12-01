# OctoWeb

### A new system concept

[![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

> ### Use the laravel power to implement your websites with a PHP OO

PRs and issues is welcome!

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
    
Flush de aplcation cache

    php artisan optimize

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Atiladanvi/hasblog.git
    cd has-blog
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan optimize
    php artisan migrate
    php artisan serve
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
