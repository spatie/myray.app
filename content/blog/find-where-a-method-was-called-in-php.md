---
title: 'Find where a method was called in PHP'
date: '2023-11-30T00:00:00.000000Z'
updated_at: '2023-12-15T09:37:25.000000Z'
published: true
summary: 'Methods that get called in a bunch of different places can be tricky to debug. Find out where your methods are called with debug_backtrace().'
authors:
  -
    name: Sebastian
    avatar: /media/blog/authors/27e1bbf570a99f9a73dd0f34af844db1.jpg
header_image: null
og_image: null
tags: {}
---
Methods that get called in a bunch of different places can be tricky to debug. For example, *why is this model being saved?*

In PHP, you can find the caller function or method using `debug_backtrace()`.

```class User extends Model
{
    public function save()
    {
        var_dump(debug_backtrace()[1]['function']);
    
        parent::save();
    }
}
```

Let's break this down:

- `debug_backtrace()` returns the full backtrace

- `[1]` will return the previous location in the backtrace (`[0]` would be the current location)

- `function` will return the function or method at the location

## Logging the caller in Ray

If you're using Ray, there's a `caller` helper to save you some keystrokes and send it straight to Ray.

```class User extends Model
{
    public function save()
    {
        ray()->caller();
    
        parent::save();
    }
}
```

Running `ray()->caller` will log the file, class, and method that was responsible for calling a method.
