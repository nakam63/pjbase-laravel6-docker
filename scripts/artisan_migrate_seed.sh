## artisan migrate and seed.
docker-compose exec php-fpm php artisan migrate
docker-compose exec php-fpm php artisan db:seed
