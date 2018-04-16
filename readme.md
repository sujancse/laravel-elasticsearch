# Laravel-elasticsearch application for testing purposes only

Run the command
```
composer install
```
```
php artisan migrate
```
```
php artisan db:seed
```

If you are using <b>Docker</b> then run
```
docker-compose exec app composer install
```
```
docker-compose exec app php artisan migrate
```
```
docker-compose exec app php artisan db:seed
```

Hit the url:
`http://127.0.0.1:2000/posts`
