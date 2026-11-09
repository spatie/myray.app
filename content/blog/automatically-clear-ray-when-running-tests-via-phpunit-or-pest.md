---
title: 'Automatically clear Ray when running tests via PHPUnit or Pest'
date: '2023-04-13T00:00:00.000000Z'
updated_at: '2023-10-13T13:02:17.000000Z'
published: true
summary: "Learn how to automatically clear Ray's screen when running a test."
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
Having your application covered with a good suite of tests has many benefits. The most significant benefit is the confidence that everything is working as expected. Tests also allow you to refactor without fear. You can read more about all the benefits at [Testing Laravel](https://testing-laravel.com/importance-of-testing).

You'll also write and run your tests when introducing new app functionality and fixing bugs. Your changes might not initially behave like you want to, so you start debugging using Ray. In your application code, you introduce some Ray calls here and there to help you understand what is happening.

```
it('will send an invoice when the order is created', function () {
    Mail::fake();

    (new CreateOrderAction())->execute($this->user, $this->product);

    Mail::assertSent(OrderCreatedMailable::class, function (OrderCreatedMailable $mail) {
        return $mail->hasTo($this->usser->email);
    });
});
```

Here's what the output in Ray could be like.

![](/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/yafa0nhxy3sk3ybg1zf9sv3cnypau07vizfa8ze1.jpg)



Imagine you need a few attempts to fix the bug. You will execute the test multiple times after each little change you try. After a while, Ray will be flooding with output like this.

![](/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/s0qyxd4y7tlnu8wn3fznylimlds0wbpjxofhvgv5.jpg)



The problem here is that it is hard to see where your previous test run's output ends and where the latest run's output starts.

## Manually clearing the screen

Of course, Ray has a lovely `newScreen` method that will clear the Ray screen, so only the output of your latest run in shown. You can even pass it a string, which will be used as a title in Ray.

Let's add it to our test.

```
it('will send an invoice when the order is created', function () {
    ray()->newScreen('Starting test');

    Mail::fake();

    (new CreateOrderAction())->execute('a', 'b');

    Mail::assertSent(OrderCreatedMailable::class, function (OrderCreatedMailable $mail) {
        return $mail->hasTo($this->usser->email);
    });
});
```

When running the code above, we only see the output of the latest run of the test. Nice!

![](/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/juecybvsreqxyvexdlllt9xpejvhq2osy79omefr.jpg)



## Automatically clearing the screen

We can still do better. Instead of manually adding a `newScreen` call, we can do it automatically when running any test.

Let's remove the `newScreen` call from our test and add it to  the `setUp()` method of the base `TestCase.` The `$this->name()` call will return the name of the tests in PHPUnit 10 / Pest 2. If you're using an older version, use `getName()` instead of `name()`.

```
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        ray()->newScreen($this-name());
        
        // ..
    }
}
```

When we now run our test, we see the name of the test as the title.

![](/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/cy1ygorr449xp6d9swn8nue7l4gnchgiuis0emua.jpg)



With this code, you don't need to manually add a `newScreen` call to any of your tests. And when you run an individual test, you'll always see the output of the latest run.

If you're using Pest, you could also set this up in the `Pest.php` file.

```
// in Pest.php

uses(Tests\TestCase::class)->beforeEach(function() {
    ray()->newScreen($this->name());
})->in(__DIR__);
```

I hope this tip will help you when you are running your tests.
