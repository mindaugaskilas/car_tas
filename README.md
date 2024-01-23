# Getting started
For starting:

install docker desktop(if not installed early)

In root folder run 

`sh init.sh`

Get inside laravel container

`docker exec -it laravel sh`

`php artisan migrate:fresh`

`php artisan db:seed`

`exit`

# Routes

Laravel api uses localhost/api as the base url.
VueJS app uses localhost:8080.
