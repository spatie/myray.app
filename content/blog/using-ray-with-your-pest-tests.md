---
title: 'Using Ray with your Pest tests'
date: '2024-11-07T00:00:00.000000Z'
updated_at: '2024-11-18T10:34:56.000000Z'
published: true
summary: 'Learn how to use Ray and Pest together to streamline debugging in Laravel, including opening separate Ray windows for tests and automatically checking for stray Ray calls before production. Plus, explore Pest’s architecture tests and a handy Ray inspection method for quick value checks.'
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
Writing and debugging tests are essential for many [Laravel](https://laravel.com/) developers. **Ray** and **[Pest](https://pestphp.com/)** work brilliantly together to provide a streamlined debugging and testing experience. Ray is great for real-time feedback on code execution, while Pest, known for its clean and expressive syntax, simplifies writing and running tests. Together, they bring clarity and efficiency to writing tests in Laravel.

## Open a new window when running tests
When running Pest tests, opening a new Ray window lets you keep test output separate from other Ray debugging data. This approach is especially helpful if you're actively developing while testing, as it keeps test debugging clear and distinct.

You can use Ray's newScreen() method to open a new Ray window. Here's how to apply it in your Pest test setup (Pest.php):

```php
uses()->beforeEach(function () {
	ray()->newScreen('Tests');
});
```

This command opens a fresh Ray window each time a test run begins, letting you focus on output from your Pest tests without mixing in any debugging data from your main app logic.

## Using Pest's Ray method
Pest has a Ray method that you can call on any expectation so you can inspect them.

```php
expect($value)->ray(); // Sends $value to Ray for inspection
```

## Checking for Ray statements
Most of the time, you don't want to ship code that still has Ray calls in it. One easy way to avoid this is to leverage Pest's [architecture tests](https://pestphp.com/docs/arch-testing).

Using the [PHP preset](https://pestphp.com/docs/arch-testing#content-php) Pest will show a failing test each time it detects a Ray statement still in your code.

To enable this preset, you simply have to add the following code to your Pest.php file:

```php
arch()->preset()->php();
```

This is only one possible way to prevent Ray calls from slipping into your production code. You can also check [our blogpost on how to automatically remove calls with Rector](https://myray.app/blog/automatically-remove-ray-calls-in-your-code).
