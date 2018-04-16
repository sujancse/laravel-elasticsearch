# Laravel-elasticsearch application for testing purposes only

Run the command
```
composer install
php artisan migrate
php artisan db:seed
```

If you are using <b>Docker</b> then run 
```
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec elasticsearch php artisan db:seed
```