---
title: Installing Ray for PHP
menuTitle: Installation
weight: 1
---

[PHP](https://www.php.net/) is one of the world's most popular programming languages, powering millions of websites. Use Ray to help you debug any PHP project, from simple scripts to complex applications.

> Using Laravel, WordPress, Yii, or another supported framework or CMS? Install the [dedicated integration](/docs/getting-started/integrations) for extra framework-specific features.

## Global installation

To make the `ray()`, `dump()` and `dd()` functions available in any PHP file and project on your system, you can install the `spatie/global-ray` package.

```bash
composer global require spatie/global-ray
global-ray install
```

Note: If a PHP-specific framework package (e.g. Laravel, WordPress) is detected in your project, it will be used instead of the global Ray package.

<x-docs.github-repo repo="spatie/global-ray" />

## Install in a single project

To use Ray in a single PHP project, install the `ray` package in the project.

```bash
composer require spatie/ray
```

<x-docs.github-repo repo="spatie/ray" />

> ## What's next?
> Now that Ray is running in your PHP, explore what else it can do!
> * [Learn how to use Ray with PHP](/docs/php/vanilla-php/usage)
> * [View all available methods](/docs/php/vanilla-php/reference)
> * [Add a config file to your project](/docs/php/vanilla-php/configuration)

