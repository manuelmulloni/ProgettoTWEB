#!/bin/sh

php artisan migrate:fresh
php artisan db:seed