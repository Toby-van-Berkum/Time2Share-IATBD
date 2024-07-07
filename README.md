## About This App

This project is an assignment I have made for my study, specifically for the module called IATBD (Interactie Backend Development). The purpose was to create a platform where people can post their products for others to lend them.

## How To Run

- Run a MySQL service to be able to connect to the database. (I personally have used [XAMPP](https://www.apachefriends.org/) for this, but any manner should suffice)
- Run command: ```php artisan migrate:fresh``` : This (re)creates the migrations and clears up the database.
- Run command: ```php artisan db:seed``` : This seeds the database using the PHP faker module. This is optional, but for testing purposes it's easier than having to create multiple users, products, lendings, etc. by hand.
- Run command: ```php artisan serve``` : This starts the application.

### Version Notice

Since languages and programs continually update, here are the versions of everything I use (so the program can be run at later dates when newer versions are incompatible):

- PHP: 8.3.7
- XAMPP: v3.3.0