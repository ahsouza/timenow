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
php artisan make:migration add_avatar_table_users --table=users
php artisan migrate
# php artisan make:model User --migration --controller --resource
# php artisan make:model Task --migration --controller --resource
# php artisan make:model Message --migration --controller --resource
# php artisan make:model Record --migration --controller --resource
# php artisan make:model Friend --migration --controller --resource
# php artisan make:model Publication --migration --controller --resource

php artisan serve --host=0.0.0.0