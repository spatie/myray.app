---
title: Using Ray in Blade views
menuTitle: Blade
weight: 5
---

## Logging variables

You can use the `@ray` directive to easily send variables to Ray from inside a Blade view. You can pass as many things as you'd like.

```blade
{{-- inside a view --}}

@ray($variable, $anotherVariables)
```

## Using measure

You can use the `@measure` directive as a shortcut for the `ray()->measure()` method to measure the time and memory it takes to render content in your view.

```blade
{{-- inside a view --}}

@measure
@php(sleep(10))
@measure
```

This will result in the following output:

![screenshot](/screenshots/measure-blade.png)
