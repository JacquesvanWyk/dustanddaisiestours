#!/bin/bash
set -e

cd /home/ploi/dustanddaisiestours.co.za

git pull origin main

composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

npm ci
npm run build

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
php artisan queue:restart

echo "Deploy complete."
