---
menuTitle: Installation
title: Installing Ray
weight: 1
---

Ray keeps all your debug output neatly organized in a dedicated desktop app, and is available for Mac, Linux, and Windows. Debug using the same syntax across languages and frameworks.

## Install the Ray application

Download Ray for free and give it a try! You can send up to 20 messages each session during the trial. Enjoying Ray? [Purchase a license](https://spatie.be/products/ray) to unlock the app and get full access.

Find download links to the Ray application for our supported platforms below:

-   [macOS (Apple Silicon)](https://spatie.be/products/ray/v3/download/macos-arm)
-   [macOS (Intel)](https://spatie.be/products/ray/v3/download/macos-x64/latest)
-   [Windows](https://spatie.be/products/ray/v3/download/windows/latest)
-   [Linux](https://spatie.be/products/ray/v3/download/linux/latest)

You can also install Ray with Homebrew on macOS: `brew install --cask ray`.

## Install the Ray package

Install a package for your language or framework to connect your project to Ray.

<x-docs.integrations-featured />

## Sending your first dump

To make sure everything is working properly, let's send a dump from your application to Ray.

The syntax varies slightly by language. Here's an example for PHP:

```php
ray('Hello world!');
```

This will display the following in Ray:

![screenshot](/images/screenshots/docs_hello.png)

Every dump you send will appear here. Try sending different types of data and see how they display!

Some methods are specific to the integration you use, so it's worth checking out the instructions for your integration to see what's possible.

> ## What's next?
> Now that Ray is running, explore what else it can do!
> * [Explore all integrations and how they work](/docs/getting-started/integrations)
> * [Learn how to use Ray](/docs/getting-started/using-ray)
> * [Get Ray up and running in different environments](/docs/environments)
