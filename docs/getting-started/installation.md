---
title: Installation
weight: 1
---

Ray helps you debug your application easier and faster. It's a desktop app available for Mac, Linux, and Windows, and supports many different languages and frameworks, including PHP, Laravel, WordPress, JavaScript and Node.js.

## Install the Ray application

You can give Ray a try by downloading [our free trial](https://myray.app/). After installing the application, link your app with Ray by installing the right package give it a try by running your first calls. Enjoying Ray? Get full access to the app by [purchasing a license](https://spatie.be/products/ray).

Find download links to the Ray application for our supported platforms below:

* [macOS (Apple Silicon)](https://spatie.be/products/ray/download/macosAppleSilicon/latest)
* [macOS (Intel)](https://spatie.be/products/ray/download/macosIntel/latest)
* [Windows](https://spatie.be/products/ray/download/windows/latest)
* [Linux](https://spatie.be/products/ray/download/linux/latest)

You can also install Ray with Homebrew on macOS: `brew install --cask ray`.

## Install the Ray package

You need to install a package for your specific language or framework to allow your project to talk with Ray. The steps to install the package will be different depending on the integration. 

Ray supports many languages and frameworks, including:

<x-docs.integrations-featured />

## Sending your first dump

To make sure everything is working properly, let's send a dump from your application to Ray.

The `ray()` command differs slightly depending on the language, but for PHP, write the following function and run it in your application:

```php
ray('Hello world!');
```

This will display the following in Ray:

![screenshot](/screenshots/helloworld.png)

Every dump you send to Ray will show up in this window. There's many different types of data you can send to Ray, each of 
Any dump you send to Ray will show up in this window. Try sending different types of data to Ray, and see how they display!

Some methods are specific to the integration you use, so it's worth checking out the instructions for your integration to see what's possible.

> ## What's next?
> Once Ray is set up and connected to your project, explore what it can do with your language or framework in the docs, or just start using Ray and try things out!
> * [Instructions for every integration](/docs/getting-started/integrations)
> * [Useful tips and tricks](/docs/getting-started/tips-tricks)
> * [Set up specific environments](/docs/environments)
