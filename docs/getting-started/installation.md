---
title: Installation
weight: 1
---

Ray helps you debug your web application easier and faster. It's a companion app available for Mac, Linux, and Windows, and supports common languages and frameworks as PHP, Laravel, WordPress, JavaScript and Node.js.

## Install the Ray application

You can give Ray a try by downloading [our free trial](https://myray.app/). After installing the application, link your app with Ray by installing the right package give it a try by running your first calls. Enjoying Ray? Get full access to the app by [purchasing a license](https://spatie.be/products/ray).

Find download links to the Ray application for our support platforms below:

* [macOS (Apple Silicon)](https://spatie.be/products/ray/download/macosAppleSilicon/latest)
* [macOS (Intel)](https://spatie.be/products/ray/download/macosIntel/latest)
* [Windows](https://spatie.be/products/ray/download/windows/latest)
* [Linux](https://spatie.be/products/ray/download/linux/latest)

## Connect your application to Ray

You need to install a package/library for your specific language or framework that allows your project to communicate with Ray. Most integrations are installed with a package manager, but the steps may be different depending on the integration.

Ray support the following languages and frameworks:

<x-integrations-overview></x-integrations-overview>

## Sending your first call

To make sure everything is functioning correctly, just send a request to Ray from your application. The `ray()` command differs by language, but for PHP, you can write the following function and execute it in your application:

```php
ray('Hello world!');
```

This will display the following in Ray:

@todo

Every time you use Ray, the details of each call will show up in this window. There are various types of calls, each presenting information in useful ways. Some of them are unique for each integration, so make sure to check out the documentation for your integration to see what's possible.
