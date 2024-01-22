# Getting started
For manually starting:

install docker desktop

`cd laravel`

`docker-compose up -d`

Get inside laravel container

`docker exec -it laravel sh`

`composer install`

`composer dump-autoload`

`php artisan migrate:fresh`

`php artisan db:seed`

Get outside laravel container

`exit`

Get inside vue container

`docker exec -it vue sh`

`npm install`

# Routes

Laravel api uses localhost/api as the base url.
VueJS app uses localhost:8080.
