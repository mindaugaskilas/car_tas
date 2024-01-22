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
VueJS app uses localhost:8080 for live development.
When deploying to production, VueJS routes will be served at localhost through an nginx proxy container, no need for adding the port.

# For Production Deployment
Uncomment the lines in vue.dockerfile comment out what isn't uncommented.

# Note: Windows
 Permissions errors when running docker on windows with laravel happen due to file ownership differences in your project folder vs inside the docker container. I've added a user in docker.compose under laravel to fix this error. No need for chmod or chown commands.
