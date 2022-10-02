
> This application brings you in a business of vehicle where you can make the data, check the stock and also for the user can put the item they want to the cart and proceed it to the order in order to purchase it.

### Prerequisites
Please make sure your operation system has configured mongodb database. [Official Documentation](https://www.mongodb.com/docs/manual/administration/install-community/)

Or you can check here
[Other source](https://appdividend.com/2022/06/24/laravel-mongodb-crud/)


## Installing / Getting started

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone https://github.com/SatriaC/laravel-mongodb.git

Switch to the repo folder

    cd laravel-mongodb

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Generate the seeder
    php artisan db:seed

Generate a new Passport secret key

    php artisan passport:install

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000/api

**TL;DR command list**

    git clone https://github.com/SatriaC/laravel-mongodb.git
    cd laravel-mongodb
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan db:seed
    php artisan passport:install
    php artisan serve

### Built With
    PHP 8.1.4
    Laravel 8
    MongoDb 5.0.6

## Api Reference

This docs will help you to test API in Postman
> [Full API Spec](https://github.com/SatriaC/laravel-mongodb.git/tree/main/postman)

You can view the following API routes:

1. Get all user: `GET` /api/user
1. Create a user: `POST` /api/user/add
1. Get a single user: `GET` /api/user/{id}
1. Update a user: `POST` /api/user/{id}/update
1. Delete a user: `POST` /api/user/{id}/delete

1. Get all tipe-transmisi: `GET` /api/tipe-transmisi
1. Create a tipe-transmisi: `POST` /api/tipe-transmisi/add
1. Get a single tipe-transmisi: `GET` /api/tipe-transmisi/{id}
1. Update a tipe-transmisi: `POST` /api/tipe-transmisi/{id}/update
1. Delete a tipe-transmisi: `POST` /api/tipe-transmisi/{id}/delete

1. Get all tipe-suspensi: `GET` /api/tipe-suspensi
1. Create a tipe-suspensi: `POST` /api/tipe-suspensi/add
1. Get a single tipe-suspensi: `GET` /api/tipe-suspensi/{id}
1. Update a tipe-suspensi: `POST` /api/tipe-suspensi/{id}/update
1. Delete a tipe-suspensi: `POST` /api/tipe-suspensi/{id}/delete

1. Get all motor: `GET` /api/motor
1. Create a motor: `POST` /api/motor/add
1. Get a single motor: `GET` /api/motor/{id}
1. Update a motor: `POST` /api/motor/{id}/update
1. Delete a motor: `POST` /api/motor/{id}/delete

1. Get all mobil: `GET` /api/mobil
1. Create a mobil: `POST` /api/mobil/add
1. Get a single mobil: `GET` /api/mobil/{id}
1. Update a mobil: `POST` /api/mobil/{id}/update
1. Delete a mobil: `POST` /api/mobil/{id}/delete

1. Get all kendaraan: `GET` /api/kendaraan
1. Create a kendaraan: `POST` /api/kendaraan/add
1. Get a single kendaraan: `GET` /api/kendaraan/{id}
1. Update a kendaraan: `POST` /api/kendaraan/{id}/update
1. Delete a kendaraan: `POST` /api/kendaraan/{id}/delete

1. Sign in: `POST` /api/auth/login

> Start from here you must have been authenticated. Please make sure that you have made a user

1. Create or update the cart of user: `POST` /api/cart/update
1. Show the cart: `POST` /api/cart

1. Process all items inside the cart: `POST` /api/order/add 
1. Add more price like discount, etc: `POST` /api/order/{id}/update 
1. Get a single penjualan: `GET` /api/order/{id}
1. Get all items by the id of order, and you can check penjualan per vehicle or in terms of time do you want (use the filter): `GET` /api/order/{id}/items
