# [Laravel](https://laravel.com) + [Vue.js](https://vuejs.org) + [Vite](https://vitejs.dev) = tipatest

#### A test project that parses data from a .csv file into a database and provides an interface for searching and displaying it.

## 
## To start this project

#### First, run the command to install [Composer](https://getcomposer.org) dependencies:
`composer install`


#### And the command to install [Node.js](https://nodejs.org) modules:
`npm install`


#### Then a command to build client resources:
`npm run build`


#### To create a SQLite database run:
`touch database/database.sqlite`


#### And to create the necessary database tables:
`php artisan migrate`


#### After that, seed the database with the test data:
`php artisan db:seed`


#### And finally run the command to start the test server:
`php artisan serve`