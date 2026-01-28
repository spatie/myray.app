---
title: Using Ray with Yii
weight: 1
---

[Yii](https://www.yiiframework.com/) is a high-performance PHP framework for developing modern web applications. Use Ray to help you debug when you're developing a Yii application, extension or module.

<x-docs.github-repo repo="spatie/yii-ray" />

## Installing the package

```bash
composer require spatie/yii-ray
```

This installs Ray as a project dependency, meaning it will also be installed in your production environment. Your application won't break if you forget to remove a `ray` call. The package doesn't send data when the environment isn't set to `dev`.

If you prefer, install it as a dev dependency by adding `--dev` to the composer command. Note that with a dev dependency, any `ray` calls left in your code will cause errors in production, so you'll need to remove them before deploying. We have some options for [detecting Ray calls](/docs/php/vanilla-php/detecting-removing-ray-calls) in your app.

```bash
composer require spatie/yii-ray --dev
```

## Usage

All [generic PHP methods](/docs/php/vanilla-php/usage) are available when using Yii.

To enable `ray()`, `dd()` and `dump()` globally in any file, see the [global installation instructions](/docs/php/vanilla-php/installation#global-installation).

> ## What's next?
> Now that Ray is installed in your Yii project, see what you can use it for.
> * [Learn how to use Ray with PHP](/docs/php/vanilla-php/usage)
> * [View all available methods](/docs/php/vanilla-php/reference)
