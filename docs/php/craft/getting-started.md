---
title: Using Ray with Craft CMS
weight: 1
---

[Craft CMS](https://craftcms.com/) is a flexible, user-friendly CMS built with PHP on the [Yii framework](/docs/php/yii/getting-started). Use Ray to help you debug when you're developing a Craft CMS website, module or plugin.

<x-docs.github-repo repo="spatie/craft-ray" />

## Installing the package

You can add the Ray package through the [plugin store](https://plugins.craftcms.com/craft-ray), or through Composer.

```bash
craft plugin/install craft-ray
```

```bash
composer require spatie/craft-ray
```

This installs Ray as a project dependency, meaning it will also be installed in your production environment. Your application won't break if you forget to remove a `ray` call. The package doesn't send data when the environment isn't set to `dev`.

If you prefer, install it as a dev dependency by adding `--dev` to the composer command. Note that with a dev dependency, any `ray` calls left in your code will cause errors in production, so you'll need to remove them before deploying. We have some options for [detecting Ray calls](/docs/php/vanilla-php/detecting-removing-ray-calls) in your app.

```bash
composer require spatie/craft-ray --dev
```

## Usage

All [generic PHP methods](/docs/php/vanilla-php/usage) are available when using Craft CMS.

To enable `ray()`, `dd()` and `dump()` globally in any file, see the [global installation instructions](/docs/php/vanilla-php/installation#global-installation).

> ## What's next?
> Now that Ray is installed in your Craft CMS project, see what you can use it for.
> * [Learn how to use Ray with PHP](/docs/php/vanilla-php/usage)
> * [View all available methods](/docs/php/vanilla-php/reference)
