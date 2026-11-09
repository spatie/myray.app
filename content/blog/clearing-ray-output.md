---
title: 'Clearing Ray output'
date: '2024-04-24T00:00:00.000000Z'
updated_at: '2024-05-03T07:42:20.000000Z'
published: true
summary: 'Frequent Ray calls can lead to a long and cluttered Ray log. However, you can take control of the log and clear it at various tages of the application and testing lifecycle.'
authors:
  -
    name: Zuzana
    avatar: /media/blog/authors/8a083734e04b5b11002a8716a35be6d8.png
header_image: null
og_image: null
tags:
  - deep-dives
---
When using Ray to debug your application, you may introduce various Ray calls in different places. Ray keeps the history of your calls which can be useful to refer to. But what can also happen is that your Ray window will get really busy and you end up with a long list of Ray outputs. 

![](/media/blog/ray/clearing-ray-output/ray-multiple-outputs.png)

The good news is that you can clear Ray window whenever you want so that only the most recent output is displayed. 

## On page refresh

Let's consider different scenarios. What if you wanted to clear the Ray screen every time a page was refreshed in Laravel?

A page refresh usually happens when a new HTTP request is made to the server. This could happen when the user clicks a link, submits a form or redirects to another page. 

If we wanted to trigger something every time a page refreshes in Laravel, one place to do that would be inside a middleware. We would create a custom middleware that would only log something on page reload.

```php
class OnPageReload
{
	public function handle(Request $request, Closure $next): Response
	{
		ray()->clearAll();
		
		return $next($request);
	}
}
```

We can use either `ray()->clearAll()` or `ray()->clearScreen()`. `clearAll()` will clear the current and all previous screens, while `clearScreen()` will clear only the current screen.

When we register the new middleware and add it to the global middleware array, it will be executed on each page request and Ray window will clear every time a page is refreshed.

Another option might be to place the `ray()->clearScreen()` in the `appServiceProvider@boot` method.

Finally, you could call the `clearAll` or `clearScreen` functions  from the `web.php` and `api.php` files. By adding logging directly inside these files, you can make sure that the Ray function will be called on each page refresh that matches one of those routes.

```php
ray()->clearAll();
```

All approaches achieve the same result: the Ray function will be called and the Ray window will be cleared. Which one you chose depends on you.

## During testing

Let's consider a different scenario now - testing.

When testing your application's functionality, you will probably use various Ray functions or log different states of the event. You can use Ray multiple times inside one test, you can also have logs inside classes the test hits. Imagine you run the test over and over again. What can happen is that your Ray window may get a bit too busy.

So what can you do? You could clear screen at the beginning of each test so that you only see the output of the most recently run test. If you use PHPUnit, you could add `ray()->clearScreen()` inside the `setUp()` method on the `TestCase` class. This way, every time a test is run, it will clear the Ray window first.

```php
protected function setUp(): void
{
	parent::setUp();

	ray()->newScreen($this->name());
}
```

Passing the `$this->name` to the `newScreen` method will show the name of the test at the top of the Ray window.

![](/media/blog/ray/clearing-ray-output/ray-name-of-test.png)

If you are using Pest instead of PHPUnit, you can achieve the same by setting it up in the Pest.php file:

```php
uses(Tests\TestCase::class)->beforeEach(function() {
    ray()->newScreen($this->name());
})->in(__DIR__);
```

Another use case may be when working with loops. You could clear Ray screen before each loop is run, or even in the middle of a loop.

Let's say we are testing a notification service and want to see what happens when a notification is delayed. We might have a couple of Ray calls inside the `sendNotification()` method to debug the service. We created a helper function `delayedSendNotification()` that simulations a delayed notification sending, and run it a few times to see how our `NotificationService` handles this delay.

```php
public function testNotificationsSentWithDifferentDelays()
{
    $notificationService = new NotificationService();

    $this->delayedSendNotification($notificationService, 100);
    // assert behaviour

    $this->delayedSendNotification($notificationService, 500);
    // assert behaviour

    $this->delayedSendNotification($notificationService, 1000);
    // assert behaviour
}
```

We could let Ray collect logs every time the `delayedSendNotification()` function is run, or we could only display the output at the last iteration:


```php
public function testNotificationsSentWithDifferentDelays()
{
    $notificationService = new NotificationService();

    $this->delayedSendNotification($notificationService, 100);
    // assert behaviour

    $this->delayedSendNotification($notificationService, 500);
    // assert behaviour

    ray()->clearScreen();
  
    $this->delayedSendNotification($notificationService, 1000);
    // assert behaviour
}
```

This way our Ray output is not cluttered and we see only what we want to see.

As you can see, there are various reasons and ways you might want to clear the Ray window. When using Ray, you are in full control of what output is displayed and when.
