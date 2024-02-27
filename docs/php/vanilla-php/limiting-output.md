---
menuTitle: Limiting Output
title: Limiting Output
weight: 5
---

## Limiting the number of sent payloads

To limit the number of payloads sent by a particular `ray()` call, use the `limit` function.  It works well for debugging loops.

```php
foreach (range(1, 10) as $i) {
    ray()->limit(3)->text("A #{$i}"); // counts to 3
    ray()->limit(6)->text("B #{$i}"); // counts to 6
    ray()->text("C #{$i}"); // counts to 10
}
```

If the argument passed to `limit()` is a negative number or zero, limiting is disabled.

## Using a rate limiter

A rate limiter can help to reduce the amount of sent messages. This would avoid spamming the desktop app, which can be helpful when using Ray in loops.

```php
Ray::rateLimiter()->max(10); // only 10 messages will be sent
```

```php
Ray::rateLimiter()->perSecond(10); // only 10 messages per second will be sent
```

To remove the rate limits again
```php
Ray::rateLimiter()->clear();
```

A message to the desktop app will be sent once to notify the user the rate limit has been reached.

## Sending a payload once

To only send a payload once, use the `once` function.  This is useful for debugging loops.

`once()` may be called with arguments:


```php
foreach (range(1, 10) as $i) {
    ray()->once($i); // only sends "1"
}
```

You can also use `once` without arguments. Any function you chain on `once` will also only be called once.

```php
foreach (range(1, 10) as $i) {
    ray()->once()->html("<strong>{$i}</strong>"); // only sends "<strong>1</strong>"
}
```
