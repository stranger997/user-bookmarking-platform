<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prerequisities
Using a windows machine you will need:
* MySQL Database
* Web Server
* Composer

## Installation
Download (A new folder will be created inside the parent folder)
```
git clone https://github.com/stranger997/user-bookmarking-platform.git
```
Install dependencies
```
cd user-bookmarking-platform
```
```
composer install
```
Rename .env.example to .env and modify as follows
* Application name (optional)
```
APP_NAME="user-bookmarking-platform"
```
* Database settings (example)
```
DB_DATABASE="ubpdb"
DB_USERNAME=root
DB_PASSWORD=
```
Generate keys for the application
```
php artisan key:generate
```
Migrate the database
```
php artisan migrate 
```
Or use this to migrate and use the seeder file
```
php artisan migrate --seed
```
Run the service
```
php artisan serve
```

### Seeder users
un: user1@example.com pw: password <br />
un: user2@example.com pw: password <br />
un: user3@example.com pw: password <br />
