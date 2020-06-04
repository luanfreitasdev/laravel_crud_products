#!/bin/bash
echo 'composer'
composer install
echo 'npm'
npm install
echo 'migrate'
php artisan migrate
echo 'db seed'
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=ResourceSeeder
echo 'webpack'
npm run dev
echo 'artisan'
php artisan key:generate
php artisan config:clear
