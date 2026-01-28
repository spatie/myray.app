---
title: Installing Ray for Laravel
menuTitle: Installation
weight: 1
---

[Laravel](https://laravel.com/) is the most popular PHP framework, known for its elegant syntax and powerful features. Use Ray to help you debug when you're developing a Laravel application or package.

<x-docs.github-repo repo="spatie/laravel-ray" />

## Install in a single project

```bash
composer require spatie/laravel-ray
```

This installs Ray as a project dependency, meaning it will also be installed in your production environment. Your application won't break if you forget to remove a `ray` call. The package doesn't send data when the environment isn't set to `dev`.

If you prefer, install it as a dev dependency by adding `--dev` to the composer command. Note that with a dev dependency, any `ray` calls left in your code will cause errors in production, so you'll need to remove them before deploying. We have some options for [detecting Ray calls](/docs/php/vanilla-php/detecting-removing-ray-calls) in your app.

```bash
composer require spatie/laravel-ray --dev
```

## Global installation

To make `ray()`, `dump()` and `dd()` available in any PHP file on your system, you can install the global Ray package. See the [global installation instructions](/docs/php/vanilla-php/installation#global-installation) for setup details.

## Publishing the config file

Optionally, publish [the config file](/docs/php/laravel/configuration) to your project root.

```bash
php artisan ray:publish-config
```

Add the `--docker` or `--homestead` option to set up a base configuration for those environments.

```bash
php artisan ray:publish-config --docker
```

```bash
php artisan ray:publish-config --homestead
```

## Using Ray in an Orchestra test suite

To use Laravel-specific functionality in an Orchestra-powered test suite, register Ray's service provider in your base test case.

```php
protected function getPackageProviders($app)
{
    return [
        \Spatie\LaravelRay\RayServiceProvider::class,
    ];
}
```

> ## What's next?
> Now that Ray is installed in your Laravel project, explore what else it can do!
> * [Learn how to use Ray with Laravel](/docs/php/laravel/usage)
> * [View all available methods (PHP)](/docs/php/vanilla-php/reference)
> * [Customize your configuration](/docs/php/laravel/configuration)
