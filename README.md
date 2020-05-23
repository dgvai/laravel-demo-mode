# Demo Mode - A Protector For Your Project in Online Market

[![Latest Stable Version](https://poser.pugx.org/dgvai/laravel-demo-mode/v/stable)](https://packagist.org/packages/dgvai/laravel-demo-mode)
[![Total Downloads](https://poser.pugx.org/dgvai/laravel-demo-mode/downloads)](https://packagist.org/packages/dgvai/laravel-demo-mode)
[![Latest Unstable Version](https://poser.pugx.org/dgvai/laravel-demo-mode/v/unstable)](https://packagist.org/packages/dgvai/laravel-demo-mode)
[![License](https://poser.pugx.org/dgvai/laravel-demo-mode/license)](https://packagist.org/packages/dgvai/laravel-demo-mode)
[![Monthly Downloads](https://poser.pugx.org/dgvai/laravel-demo-mode/d/monthly)](https://packagist.org/packages/dgvai/laravel-demo-mode)
[![Daily Downloads](https://poser.pugx.org/dgvai/laravel-demo-mode/d/daily)](https://packagist.org/packages/dgvai/laravel-demo-mode)
[![composer.lock](https://poser.pugx.org/dgvai/laravel-demo-mode/composerlock)](https://packagist.org/packages/dgvai/laravel-demo-mode)

This package protects your projects in online market. Sometimes, in markets, the trial users uploads/saves/changes arbitrary informations that destroys the beauty of your project for the next visitors. This package comes to play in those cases.

## Contents

<!-- TOC -->

- [Demo Mode - A Protector For Your Project in Online Market](#demo-mode---a-protector-for-your-project-in-online-market)
    - [Contents](#contents)
    - [Installation](#installation)
        - [Publish Configuration](#publish-configuration)
        - [Setup and configure](#setup-and-configure)
            - [After Done Configuration](#after-done-configuration)
    - [Usage](#usage)
    - [Changelog](#changelog)
    - [License](#license)

<!-- /TOC -->

## Installation

You can install the package via composer:

``` bash
    composer require dgvai/laravel-demo-mode
```

### Publish Configuration

Publish configuration file

```bash
    php artisan vendor:publish --tag=demomode
```

**For users bellow laravel < 5.5**
Add service provider to config/app.php
```php
    "DGvai\DemoMode\DemoModeServiceProvider"
```

### Setup and configure

```php
    /**
         * ENABLE DEMO MODE?
         * ------------------------
         * Use from true to enable demo 
         * mode for your production env
         * 
         */

        'enabled' => env('DEMO_ENABLED',true),

        /**
         * CUSTOM FLASH VARIABLE
         * ------------------------
         * If you want to use custom flash
         * alerts like, realrashid/sweetalert2 
         * has toast_error, success, etc flash 
         * variables to show alert, then use it
         * here.
         * 
         */

        'flash' => 'demo_info',

        /**
         * CUSTOM MESSAGE
         * ------------------------
         * If you want to show a custom flash 
         * message to the users, set it here.
         * 
         */
        
        'msg' => 'Further action is disabled in demo mode!'
```


#### After Done Configuration
```bash
    php artisan config:cache
```

## Usage
Simply use a **middleware** ``demo`` to the **routes** you want to protect. Such has *save* routes.
```php
    Route::post('/save',function(){
        ....
        return 'Furthur Actions';
        ...
    })->middleware('demo')->name('save');
```

To show the flash message, like an alert, into your view:

```php
    @if(session()->has('demo_info'))
    <div class="alert alert-warning">
        {{session()->get('demo_info')}}
    </div>
    @endif
```

Or if you have used any custom flash, like ``realrashid/sweetalert2`` has ``toast_success`` flash, it will automatically show the toast.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
