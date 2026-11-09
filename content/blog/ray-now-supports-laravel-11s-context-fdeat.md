---
title: "Ray now supports Laravel 11's Context"
date: '2024-04-01T00:00:00.000000Z'
updated_at: '2024-04-03T09:55:47.000000Z'
published: true
summary: 'Laravel 11 recently introduced a nice new feature called Context. We’ve updated Ray with a convenient method to display all set context.'
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
Laravel 11 recently introduced [a nice new feature called Context](https://laravel.com/docs/11.x/context). We’ve updated Ray with a convenient method to display all set context.

## What is Context?

This feature allows you to set some values anywhere in your app as context.

```php 
use Illuminate\Support\Facades\Context;

Context::add('url', $request->url());
Context::add('trace_id', Str::uuid()->toString());
```

You can easily retrieve the set values anywhere in your app.

```php
use Illuminate\Support\Facades\Context;

Context::all(); // returns all context
```

Now, this isn’t all that special. With the examples given above, you’d be right to think that Context is just some array-backed cache.

But Context's special feature is that it makes all of this information available to any job dispatched in the request where context was set.

```php
dispatch(new MyJob()); // this job will receive the context
```

```php
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Context;

class MyJob implements ShouldQueue
{
    public function handle()
    {
        // returns the context that was
        // set in the request that dispatched
        // this job
        $allContent = Context::all();

        // do some work
        // ...
    }
}
```

## Context in Ray

Ray now has a new method, aptly named `context`, showing all set context.

```php
ray()->context(); // displays all context

ray()->context('key', 'key2'); // displays only the given keys
```

![](/media/blog/context.png)

Context can also be invisible. You can display those values using the `hiddenContext` method.

```php
ray()->hiddenContext(); // displays all hidden context

ray()->hiddenContext('key', 'key2'); // displays only the given hidden keys
```

![](/media/blog/context-hidden.png)
