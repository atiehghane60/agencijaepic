<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to run

In order to run the project, you should:

- make sure the docker is installed in your machine
- make a copy of file .env.example with name .env
- run command `composer install`
- run command `./run_app.sh` in root directory of the project

And the project will be accessible via [127.0.0.1](http://127.0.0.1).

## How to handle a large amount of data in tables

To handle huge amount of data in fetching them from tables we may:
- use pagination
- add a caching layer at the front of the API
- use eager loading in presence of relationships

To handle files with huge amount of rows it's better to process them in jobs.
