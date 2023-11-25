<div style="text-align: center;">
    <img src="public\logo.png" alt="Logo" width="150">
</div>

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
