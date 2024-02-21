---
title: Using Ray With PHP
menuTitle: Installation
weight: 1
---

To communicate with the Ray desktop app, we're going to use a function named `ray()`.

## Global installation

To make the `ray()`, `dump()` and `ray()` functions available in any PHP file and project on your system, you can install the `spatie/global-ray` package.

```bash
composer global require spatie/global-ray
global-ray install
```

You can now use all of `ray()`'s [framework agnostic capabilities](/docs/php/vanilla-php/usage).

To use framework specific functionality, such as [viewing queries in Laravel](/docs/php/laravel/queries#showing-queries), or [displaying mails in WordPress](/docs/php/wordpress), you should still [install the relevant package or library](/docs/getting-started/installation#connect-your-application-to-ray).

If a framework specific package is detected, it will be used instead of the global Ray.

## Installation in a single project

To start using Ray in a single PHP project, install the `ray` package in the project.

```bash
composer require spatie/ray
```

You should be able to use the `ray` function without any other steps.

If you use Laravel, you should use install [the Laravel specific package](/docs/php/laravel/installation) instead of `spatie/ray`.
