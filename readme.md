# Profile

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require webflax/profile
```

## Usage

``` bash
php artisan migrate
```
``` bash
Route::post('/update/profile/{id}','WebFlax\Profile\ProfileController@update')->name('update.profile');
```

[ico-version]: https://img.shields.io/packagist/v/webflax/profile.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/webflax/profile.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/webflax/profile/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/webflax/profile
[link-downloads]: https://packagist.org/packages/webflax/profile
[link-travis]: https://travis-ci.org/webflax/profile
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/webflax
[link-contributors]: ../../contributors
