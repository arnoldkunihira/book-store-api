# Book Store API Application

A simple application that implements one-to-Many and Many-to-Many relationships within a database management system.
The logical flow is *Every book belongs to one publisher, so you will be able to assign a book to a specific publisher or if you can not find it you can store a new publisher in the database. Besides that, you can store authors in the authors’ table and include one of them or multiple of them in a book as the author’s name.*

REQUIREMENTS
------------

The minimum requirement for this project is your Web server supports PHP 7.3.0 and you have 
Node.js a javascript runtime environment installed locally on your computer. 

INSTALLATION
------------

### Install via Git

Clone the repo locally:

```sh
git clone https://github.com/arnoldkunihira/book-store-api.git

cd book-store-api

```

### Install PHP dependencies

```sh
composer install
```

### Install NPM dependencies

```sh
npm install
```

CONFIGURATION
------------

### Setup configuration

```sh
cp .env.example .env
```

### Generate application key

```sh
php artisan key:generate
```

### Create a database

```sql
CREATE DATABASE DB_DATABASE;
```

### Update .env with database details

```sh
DB_CONNECTION=<DB_CONNECTION>
DB_HOST=<DB_HOST>
DB_PORT=<DB_PORT>
DB_DATABASE=<DB_DATABASE>
DB_USERNAME=<DB_USERNAME>
DB_PASSWORD=<DB_PASSWORD>
```

### Run database migrations

```sh
php artisan migrate
```

### Run database seeders

```sh
php artisan db:seed
```

### Run development server

```sh
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
