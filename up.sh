#!/bin/bash
#composer create-project --prefer-dist laravel/laravel app
cp .env.example .env
composer update --no-plugins --no-scripts
php artisan key:generate
php artisan config:cache
composer require laravel/passport
composer require lucascudo/laravel-pt-br-localization
php artisan vendor:publish --tag=laravel-pt-br-localization
php artisan migrate 
php artisan passport:install 
php artisan serve --host=0.0.0.0