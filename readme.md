# Kanban board back-end

This is back-end for kanban board application. For creating this, next technologies are used:
* PHP
* Laravel
* MySQL

## Installation

### Requirements
* Laravel
* MySQL Client

### Install composer
To install composer, go to project directory in command line and type:

$ composer install

## Running

To run this project, follow the steps below.

### Connect database

To connect on database, make new .env file. Copy the content of .env.example file
in that .env file, and then set username, password and database name on appropriate
places.

### Seeding database

To seed database with initial set of data, go to project directory in command
line and type:

$ php artisan db:seed

### Running server

To run server, type in command line:

$ php artisan serve



