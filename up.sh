#!/bin/bash
#composer create-project --prefer-dist laravel/laravel app
cp .env.example .env
composer update --no-plugins --no-scripts
php artisan key:generate
php artisan config:cache
composer require barryvdh/laravel-cors
composer require laravel/passport
composer require lucascudo/laravel-pt-br-localization
php artisan vendor:publish --tag=laravel-pt-br-localization
# php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"
php artisan migrate 
php artisan passport:install 
# php artisan make:migration add_avatar_table_users --table=users
php artisan migrate
# php artisan make:model User --migration --controller --resource
# php artisan make:model Task --migration --controller --resource
# php artisan make:model Message --migration --controller --resource
# php artisan make:model Record --migration --controller --resource
# php artisan make:model Friend --migration --controller --resource
# php artisan make:model Publication --migration --controller --resource

# CONSULANDO registros no BD com Tinker

# php artisan tinker
# App\User::all();

# ATRIBUINDO EM VARIAVEL registros no BD com Tinker

# $listContents = App\contents::all();
# $listUsers = App\User::all();

# DELETANDO registros no BD com Tinker
# App\content::find(2)->delete();


php artisan serve --host=0.0.0.0