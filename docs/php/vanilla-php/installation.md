---
title: Installing Ray for PHP
menuTitle: Installation
weight: 1
---

You can install support for Ray with PHP in two ways: globally or per project. 

If you use Laravel or other PHP-based frameworks and CMS'es that Ray supports, we recommend you install [the specific integration](/docs/getting-started/integrations) for it as these offer more functionality for that specific framework or CMS than the generic PHP package does.

If a framework specific package is detected, it will be used instead of the global Ray.

## Global installation

To make the `ray()`, `dump()` and `dd()` functions available in any PHP file and project on your system, you can install the `spatie/global-ray` package.

```bash
composer global require spatie/global-ray
global-ray install
```

## Installation in a single project

To use Ray in a single PHP project, install the `ray` package in the project.

```bash
composer require spatie/ray
```

> ## What's next?
> Now that Ray is running in your PHP, explore what else it can do!
> * [Learn how to use Ray with PHP](/docs/php/vanilla-php/usage)
> * [View all available methods](/docs/php/vanilla-php/reference)
> * [Add a config file to your project](/docs/php/vanilla-php/configuration)

