# [Laravel](https://laravel.com) + [Element Plus](https://element-plus.org) test project

### A test project that parses data from a .csv file into a database and provides an interface for searching and displaying it

## 
## To start this project

#### First, run the command to install [Composer](https://getcomposer.org) dependencies:
```
composer install
```

#### And the command to install [Node.js](https://nodejs.org) modules:
```
npm install
```

#### Then run the command to build client resources:
```
npm run build
```

#### Create and, if necessary, customize the environment file:
```
cp .env.example .env
```

#### To create a SQLite database run:
```
touch database/database.sqlite
```

#### And to create the necessary database tables:
```
php artisan migrate
```

#### After that, seed the database with the test data:
```
php artisan db:seed
```

#### And finally run the command to start the test server:
```
php artisan serve
```