# Octo

## Introduction

The purpose of this project is provide a simple way to create web aplications like Saas, ecommerce, etc. We use [Laravel](https://laravel.com/) as a framework with [Laravel Jetstream](https://github.com/laravel/jetstream), Laravel Jetstream is a great starter kit for a new project. To build admin dashborads, we use [Filament Admin](https://filamentphp.com/) as a customer dashoard.

[![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

PRs and issues is welcome!

----------

## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)

Clone the repository:

    git clone https://github.com/A2insights/octo.git

Switch to the repo folder:

    cd octo

Install all the dependencies using composer:

    composer install

Install all the node dependencies using npm:

    npm install

Compile the css and javascript assets:

    npm run dev #For local
    npm run prod #For production

Install required application things:

    php artisan octo:install

Copy the example env file and make the required configuration changes in the .env file.

    cp .env.example .env

* Social login:
  If you want to activate the social login make sure if you put the follows credentials below.

```.env
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_CLIENT_CALLBACK=
```

See all env vars available in the .env.example file.

Generate a new application key:

    php artisan key:generate

Flush de application cache:

    php artisan view:clear
    php artisan optimize

Run the database migrations (**Set the database connection in .env before migrate**).

    php artisan migrate

Start the local development server:

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/a2insights/octo.git
    cd octo
    composer install
    npm install
    npm run dev
    php artisan migrate
    php artisan serve

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables).

#### Using Laravel Sail to develop
For more information: [Sail Documentation](http://https://laravel.com/docs/9.x/sail)

    sail up

You can now access the server at http://localhost

##### Demo application:

You can set up the new application with faker data using our assistant:

    php artisan octo:demo

This will create a sys admin user with the follow credentials:

**E-mail**: super-admin@octo.dev

**Password**: octoSuperAdmin

**For more information: https://laravel.com/docs/sail**

##### Troubleshooting:

Prune docker

https://docs.docker.com/engine/reference/commandline/system_prune/

Need rebuild?

    sail build --no-cache

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email atila.danvi@outlook.com instead of using the issue tracker.

## Credits

- [Atila Silva](https://github.com/Atiladanvi)
- [All Contributors](../../contributors)

## License

The MIT License. Please see [license file](LICENSE.md) for more information.
