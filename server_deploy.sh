#!/bin/sh
set -e

echo "Deploying application ..."

# Enter maintenance mode
(php artisan down) || true
    # Update codebase
    git checkout .
    git pull

    # Composer update
    composer update

    # NPM update
    npm update

    # Build assets
    npm run production

    # Setup new aplication
    php artisan octo:demo

    # Clear cache
    php artisan cache:clear

    # Clear config cache
    php artisan config:clear

    # Clear route cache
    php artisan route:clear

    # Clear view cache
    php artisan view:clear

    # Clear compiled class cache
    php artisan clear-compiled

    # Reload PHP to update opcache
    echo "" | sudo -S service php8.0-fpm reload
# Exit maintenance mode
php artisan up

echo "Application deployed!"
