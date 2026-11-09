---
title: 'Using Ray inside your Blade views'
date: '2024-08-23T00:00:00.000000Z'
updated_at: '2024-09-19T12:30:15.000000Z'
published: true
summary: 'Learn how to use Ray for debugging in Blade views.'
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
Ray makes it simple to debug Laravel applications, even when working with Blade views. In this blog post, we'll explore some directives you can use to leverage Ray within Blade views to streamline the debugging process.

## Logging Variables with @ray

Debugging often starts with understanding the values of variables at different points in your code. Ray provides a convenient `@ray` directive that allows you to log variables directly from your Blade views. This directive can handle multiple variables simultaneously, making it a powerful tool for inspecting your data.

Here's how you can use the `@ray` directive inside a Blade view:

```php
{{-- inside a view --}}
@ray($variable, $anotherVariable)
```

This simple line sends the values of `$variable` and `$anotherVariable` to Ray, where you can inspect them in real time. This eliminates the need for temporary print statements or other cumbersome debugging methods.

## Displaying All Variables with @xray

Sometimes, you may want to see all the variables available in your Blade file. The `@xray` directive does precisely that. By placing `@xray` in your view, Ray will show you all the accessible variables at that point.

Consider this controller:

```php
class PostController {
	public function show(Post $post)
	{
		$title = $post->title;
		$foo = 'bar';

		returen view('posts.show', compact('title', 'post', 'foo'));
	}
}
```

And the directive being called in the `show.blade.php` file:

```php
@xray
```

This will result in the following output in Ray:

![](/media/blog/ray/using-ray-inside-your-blade-views/xray.png)

This directive is particularly useful when you're unsure of what variables are being passed to your view or when you need a comprehensive overview of your data.

## Measuring performance with @measure

Performance optimization is a crucial aspect of development, and Ray makes it easy to measure the performance of your Blade views. The `@measure` directive is a shortcut for the `ray()->measure()` method, allowing you to measure the time and memory consumption directly in your views.

Consider the following example:

```php
{{-- inside a view --}}
@measure
@php(sleep(4))
@measure
```

![](/media/blog/ray/using-ray-inside-your-blade-views/measure-blade.png)

In this snippet, the `@measure` directive is used before and after a `sleep(4)` statement. Ray will display the time and memory usage between these two points, providing valuable insights into the performance of your code.

Happy debugging!
