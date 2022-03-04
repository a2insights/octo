# Octo

## Introduction

The purpose of this project is provide a simple way to create web aplications of kind SaaS. We use [Laravel](https://laravel.com/) framework with [Laravel Jetstream](https://github.com/laravel/jetstream) and [Filament Admin](https://filamentphp.com/). Laravel Jetstream and Filament are greats starters kits to create awesome projects..

[![CD](https://github.com/a2insights/octo/actions/workflows/main.yml/badge.svg?branch=master)](https://github.com/a2insights/octo/actions/workflows/main.yml)
[![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)

Clone the repository:

    git clone https://github.com/a2insights/octo.git

Switch to the repo folder:

    cd octo

Install all php dependencies using composer:

    composer install

Install all node dependencies using npm:

    npm install

Compile the css and javascript assets:

    npm run dev

Copy the example env file and config the database credentials.

    cp .env.example .env

### Social login

If you want to activate the social login make sure if you put the follows credentials below.

    GITHUB_CLIENT_ID=
    GITHUB_CLIENT_SECRET=
    GITHUB_CLIENT_CALLBACK=

See all env vars available in the .env.example file.

Generate a new application key:

    php artisan key:generate

Flush de application cache:

    php artisan config:clear
    php artisan view:clear

Run the database migrations.

    php artisan migrate

PS: Make sure you set the correct database connection information before running the migrations.

Start the local development server:

    php artisan serve

You can now access the server at <http://localhost:8000>

**** [Environment variables](#environment-variables).

### Demo application

You can set up the new application with faker data using our assistant:

    php artisan octo:demo

This will create two users:

#### Sys Admin

E-mail: super-admin@octo.dev

Password: octoSuperAdmin

#### User

E-mail: user@octo.dev

Password: octoUser

### Using Laravel Sail to develop

    sail up

You can now access the server at <http://localhost>

**For more information: <https://laravel.com/docs/sail>**

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email atila.danvi@outlook.com instead of using the issue tracker.

## Credits

* [Atila Silva](https://github.com/Atiladanvi)
* [All Contributors](../../contributors)

## License

The MIT License. Please see [license file](LICENSE.md) for more information.
