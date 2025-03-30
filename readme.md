# Laravel Book Management System

This is a Laravel-based Book Management System that allows users to create, update, delete, and view books. The application also supports exporting book data in CSV and XML formats.

## Features
- View a list of books
- Add, edit, and delete books
- Export books to CSV and XML
- Filter exported data by columns (title, author)
- Fully tested with Laravel feature tests

## Local Installation

### Prerequisites
- PHP 7.3+ (Laravel 6 requirement)
- Composer
- MySQL or SQLite (for database)
- Laravel 6 installed

### Steps to Set Up Locally
1. Clone the repository:
  ```sh
  git clone https://github.com/adammast/yaraku-assignment
  cd yaraku-assignment
  ```

2. Install dependencies:
  ```sh
  composer install
  ```

3. Create a .env file with the following content:
    ```ini
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. Generate application key:
  ```sh
  php artisan key:generate
  ```

5. Run database migrations and seed:
  ```sh
  php artisan migrate --seed
  ```

6. Start the Laravel development server:
  ```sh
  php artisan serve
  ```

## Docker Installation

### Prerequisites
- Docker installed

### Steps to Set Up with Docker
1. Clone the repository:
  ```sh
  git clone https://github.com/adammast/yaraku-assignment
  cd yaraku-assignment
  ```

2. Build and run the Docker container
  ```sh
  docker-compose up --build -d
  ```

3. Run database migrations inside the Laravel container:
  ```sh
  docker-compose exec laravel php artisan migrate
  ```

4. Open http://localhost:8080/ in your browser.

5. To stop the containers:
  ```sh
  docker-compose down
  ```

## Running Tests
  This project includes feature tests to ensure the correct functionality of book management and export features.
  - To run tests locally:
    ```sh
    php artisan test
    ```
  - To run tests inside the Docker container:
    ```sh
    docker exec -it assignment01-laravel vendor/bin/phpunit
    ```