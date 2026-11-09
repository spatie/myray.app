---
title: 'Sniffing out stray ray() calls with Pest architecture testing'
date: '2024-01-09T00:00:00.000000Z'
updated_at: '2024-03-07T09:35:25.000000Z'
published: true
summary: "Whether you're building a shiny new feature or refactoring a bug deep in a legacy codebase, before you merge your work to production you want to get rid of all those ray() calls you littered the codebase with. You'll probably get rid of most of them on time, but every now and then a stray call gets forgotten during code review."
authors:
  -
    name: Sebastian
    avatar: /media/blog/authors/27e1bbf570a99f9a73dd0f34af844db1.jpg
header_image: null
og_image: null
tags: {}
---
Whether you're building a shiny new feature or refactoring bug deep in a legacy codebase, before you merge your work to production you want to get rid of all those `ray()` calls you littered the codebase with. You'll probably get rid of most of them on time, but every now and then a stray call gets forgotten during code review.

If you're using [Pest](https://pestphp.com/)—a PHP testing framework—you can ensure not a single `ray()` call gets merged by sniffing them out with an architecture test.

Pest's architecture tests allow you to specify a set of rules for your application's architecture.

For example, here's a test that ensures the `App\Models` namespace only contain models. If the namespace includes a class that doesn't extend `Illuminate\Database\Eloquent\Model`, it will fail.

```php
arch('app')
    ->expect('App\Models')
    ->toExtend('Illuminate\Database\Eloquent\Model');
```

## Architecture testing and Ray

Architecture tests can also assert that a function is *never* used. In our case, avoiding any `ray()` call in the codebase.

First, add Pest to your project. (Follow the [installation guide](https://pestphp.com/docs/installation) for more in-depth instructions.)

```sh
composer require pestphp/pest --dev --with-all-dependencies
./vendor/bin/pest --init
```

Then, define your architecture test in `tests/ArchTest.php`.

```php
arch('it will not use ray')
    ->expect('ray')
    ->not->toBeUsed();
```

This test will fail when `ray` appears in your codebase. While we're here, we can extend this to fail when we use any debugging function.

```php
arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray'])
    ->each->not->toBeUsed();
```

During development, you'll want to use debugging functions without Pest nagging about them. To opt out of the architecture test, use the `--exclude-arch` tag when running tests.

Now, you can exclude the `arch` group when running Pest during development.

```sh
./vendor/bin/pest --exclude-arch
```



Happy testing!
