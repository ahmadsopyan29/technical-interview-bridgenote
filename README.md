# Getting started

## Installation

Clone the repository

    git clone https://github.com/ahmadsopyan29/technical-interview-bridgenote.git
    
 Switch to the repo folder

    cd technical-interview-bridgenote

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new PASSPORT authentication secret key

    php artisan passport:install

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeders

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

authentication for login : email : admin@admin.com , password : admin

You can access API Documentation at http://localhost:8000/api/documentation
