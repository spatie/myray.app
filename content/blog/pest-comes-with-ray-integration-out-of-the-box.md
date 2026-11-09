---
title: 'Pest comes with Ray integration out of the box'
date: '2024-01-17T00:00:00.000000Z'
updated_at: '2024-01-23T14:03:01.000000Z'
published: true
summary: |-
  Pest is an excellent test runner for PHP, that’s been getting more popular. It offers a developer friendly way of writing tests. At Spatie, we use it for all our projects.

  Did you know that Pest comes with Ray support out of the box?

  Let’s take a look at this very simple test from one of our own packages.
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
Pest is an excellent test runner for PHP, that’s been getting more popular. It offers a developer friendly way of writing tests. At Spatie, we use it for all our projects.

Did you know that Pest comes with Ray support out of the box?

Let’s take a look at this very simple test from one of our own packages.

```php
it('can get all holidays of the current year', function () {
    $holidays = Holidays::for(Belgium::make())->get();

    expect($holidays)->toBeArray();
});
```

Imagine now that you want to send the content of `$holidays` to Ray. Well, thanks to Pest’s integration with Ray, you can just chain a `ray()` call after `expect` like this.

```php
it('can get all holidays of the current year', function () {
    $holidays = Holidays::for(Belgium::make())->get();

    expect($holidays)->ray()->toBeArray();
});
```

Pretty sweet! Only a couple of keystrokes are needed to send something to Ray!
