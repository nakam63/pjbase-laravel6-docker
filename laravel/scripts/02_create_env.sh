## create .env file.
cp ../.env.example ../.env
## artisan key generate.
docker-compose exec php-fpm php artisan key:generate