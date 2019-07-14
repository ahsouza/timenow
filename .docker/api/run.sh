#!/bin/bash

cp .env.example .env
npm install
composer update --no-plugins --no-scripts
php artisan key:generate
php artisan config:cache
php artisan serve --host=0.0.0.0