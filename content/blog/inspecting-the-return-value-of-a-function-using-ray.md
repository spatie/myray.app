---
title: 'Inspecting the return value of a function using Ray'
date: '2023-04-27T00:00:00.000000Z'
updated_at: '2023-10-13T13:01:52.000000Z'
published: true
summary: 'Using the pass function, you can easily debug return value.'
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
When trying to fix a bug, you might want to see the return value of a function. In this post, we'd like to offer a simple solution.

## The problem

Consider this simple code snippet:

```
class User
{
    public function fullName(): string
    {
		    return "{$this->first_name} {$this->last_name}";
    } 
}
```

You might think you can do this to display the result in Ray:

```
class User
{
    public function fullName(): string
    {
		    //This does not work
		    
		    return ray("{$this->first_name} {$this->last_name}");
    } 
}
```

This does not work because the `ray()` function returns an instance of the `Ray` object used to communicate with the Ray app. You can tack on one of [the many Ray functions](https://spatie.be/docs/ray/v1/usage/reference), such as `red()`, to colorize the output.

```
ray('hi there')->red();
```

This will be displayed in Ray as

![](/media/blog/ray/inspecting-the-return-value-of-a-function-using-ray/dsykcfbtqwjxyjkwz6ob4wniw1jyyup6dmvgqlhj.jpg)



Back to our original problem: displaying a return value to Ray. This might be your second attempt:

```
class User
{
    public function fullName(): string
    {
		    $result = "{$this->first_name} {$this->last_name}";
		    
		    ray($result);
		    
		    return result;
    } 
}
```

That will work, but it is rather cumbersome. To see the output in Ray, you have to introduce a new variable. Send that to Ray, and use it as the return value. That's too much work for simply wanting to see the value.

## The solution

To easily debug return value, Ray offers a handy `pass` function. Any value you pass to `pass` will be displayed in Ray and returned by the function.

That means you can do this:

```
class User
{
    public function fullName(): string
    {
		    return ray()->pass("{$this->first_name} {$this->last_name}");
    } 
}
```

Using `pass`, we didn't have to introduce a temporary variable. To see the return value in Ray, we can wrap the return value in a `pass` call.

I hope you enjoyed this little Ray tip.
