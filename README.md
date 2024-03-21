# Ajax Register Login

Building login and registration without using Laravel features like Breeze or Jetstream, but instead using manual methods with Ajax and Bootstrap for styling. The purpose of creating this system is for learning purposes about Laravel version 10 and how Ajax works in Laravel when it hits the server. This application was created using Laravel v10 and requires a minimum of PHP v8.1, so if during the installation or usage process there are errors or bugs, it is possible that it is due to an unsupported PHP version.

## Tech Stack

-   **Client :** Bootstrap 5, Blade Template, Ajax, Jquery
-   **Server :** PHP with Laravel

## Run Locally

Clone the project

```bash
  git clone https://github.com/khalilannbiya/ajax-register-login.git
```

Or Download ZIP

[Link](https://github.com/khalilannbiya/ajax-register-login/archive/refs/heads/main.zip)

Go to the project directory

```bash
  cd ajax-register-login
```

Run the command

```bash
  composer update
```

Or

```bash
  composer install
```

Copy the .env file from .env.example.

```bash
  cp .env.example .env
```

Please don't forget to create the 'db_ajax_laravel' database in phpMyAdmin.

Configure the .env file

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=db_ajax_laravel
  DB_USERNAME=root
  DB_PASSWORD=
```

Generate key

```bash
  php artisan key:generate
```

Migrate database

```bash
  php artisan migrate
```

Run serve

```bash
  php artisan serve
```

## Documentation

-   [Bootstrap 5](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
-   [Blade Template](https://laravel.com/docs/10.x/blade)
-   [Laravel](https://laravel.com/docs/10.x)
-   [JQuery](https://api.jquery.com/)
-   [Ajax](https://www.w3schools.com/js/js_ajax_intro.asp)

## Features

-   Login
-   Register

## Feedback

If you have any feedback, please reach out to us at syeichkhalil@gmail.com
