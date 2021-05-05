# Octo

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
    npm run prod #For Production

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

Generate a new application key:

    php artisan key:generate

Flush de application cache:

    php artisan cache:clear
    php artisan route:clear
    php artisan config:clear
    php artisan view:clear
    php artisan optimize

Run the database migrations (**Set the database connection in .env before migrating**).

    php artisan migrate

Start the local development server:

    php artisan serve

#### Demo Application:

You can set faker data using our assistant:

    php artisan octo:setup

This will create a user with the follow credentials:

**E-mail**: admin@octo.dev

**Password**: octoAdmin

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Atiladanvi/octo.git
    cd octo
    composer install
    npm install
    npm run dev
    cp .env.example .env
    php artisan octo:install
    php artisan cache:clear
    php artisan route:clear
    php artisan config:clear
    php artisan view:clear
    php artisan optimize
    php artisan migrate
    php artisan serve

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables).

#### Using Docker

**Default: mysql**

Make sure if you have docker-compose installed and perform this command:

Set database environment like this:
```.env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=octo
DB_USERNAME=root
DB_PASSWORD=
```

**PS: Check if you can execute docker commands:**  https://docs.docker.com/engine/install/linux-postinstall

Up de docker services:

    ./vendor/bin/sail up -d

For the first time you need install dependencies, compile assets, install octo, flush the cache, migrate & seed database:

    ./vendor/bin/sail composer install
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    ./vendor/bin/sail artisan octo:install
    ./vendor/bin/sail artisan cache:clear
    ./vendor/bin/sail artisan route:clear
    ./vendor/bin/sail artisan view:clear
    ./vendor/bin/sail artisan optimize
    ./vendor/bin/sail artisan migrate
    ./vendor/bin/sail artisan db:seed

You can now access the server at http://localhost

##### Demo application:

You can set up the new application with faker data using our assistant:

    ./vendor/bin/sail artisan octo:setup

This will create a user with the follow credentials:

**E-mail**: admin@octo.dev

**Password**: octoAdmin

Down the service:

    ./vendor/bin/sail down

**For more information: https://laravel.com/docs/sail**

##### Troubleshooting:

Prune docker

https://docs.docker.com/engine/reference/commandline/system_prune/

Need rebuild?

    ./vendor/bin/sail build --no-cache

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
