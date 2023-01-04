#!/bin/bash

# setup code
git fetch
git checkout main
git pull origin main

# migration
php artisan migrate
