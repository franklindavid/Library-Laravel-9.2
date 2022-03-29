# Library Software laravel 9.2
 
#Clone the repository
    https://github.com/franklindavid/Library-Laravel-9.2.git

Switch to the repo folder
    cd Library-Laravel-9.2

Install all the dependencies using composer
    composer install

Copy the example env file and make the required configuration changes in the .env file
    cp .env.example .env

Generate a new application key
    php artisan key:generate

Generate a new JWT authentication secret key
    php artisan jwt:generate

Run the database migrations (Set the database connection in .env before migrating)
    php artisan migrate

Start the local development server
    php artisan serve

Run the database seeder and you're done
    php artisan db:seed
