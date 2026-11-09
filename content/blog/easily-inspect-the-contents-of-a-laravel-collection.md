---
title: 'Easily inspect the contents of a Laravel collection'
date: '2023-04-20T00:00:00.000000Z'
updated_at: '2023-10-13T13:02:05.000000Z'
published: true
summary: 'We automatically register a `ray()` collection macro that allows you to look inside the collection at any point in a chain.'
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
One of my favorite things when working on a Laravel project is [Laravel's powerful Collection class](https://laravel.com/docs/10.x/collections#main-content). I use it all of the time to transform data.

Let's take a look at a straightforward example. You'll see longer collection chains with more complicated methods in real-world applications.

```
collect(['a', 'b', 'c'])
    ->map(fn(string $letter) => strtoupper($letter))
    ->reverse();
```

Imagine you want to see what the collection's contents look like in the middle of the chain in Ray. You might do something like this.

```
$collection = collect(['a', 'b', 'c'])
    ->map(fn(string $letter) => strtoupper($letter));

ray($collection);

$collection->reverse();
```

That will work: the collection's contents will be displayed in Ray.

![](/media/blog/ray/easily-inspect-the-contents-of-a-laravel-collection/u5shahlqpzzym9tfihbe482yqrdhzvpjwt26xwcd.jpg)



But going about it this way is a lot of work: you have to introduce a new temporary variable and break up your chain.

Luckily there's a much simpler way of going about this. When the spatie/laravel-ray package is [installed](https://spatie.be/docs/ray/v1/configuration/laravel) in your Laravel project, we automatically register a `ray` collection macro to easily send collections to the desktop application. So to see what the collection looks like, you can simply add a `ray()` call after that `map` operation.

```
collect(['a', 'b', 'c'])
   ->map(fn(string $letter) => strtoupper($letter))
   ->ray()
   ->reverse();
```

Of course, you can use `ray()` multiple times in your chain, and you can even pass it a label which will be displayed in Ray.

```
collect(['a', 'b', 'c'])
   ->ray('original')
   ->map(fn(string $letter) => strtoupper($letter))
   ->ray('uppercased')
   ->reverse()
   ->ray('reversed');
```

![](/media/blog/ray/easily-inspect-the-contents-of-a-laravel-collection/fie7leohmldkbgairdbb5a4herta7bvoy9yof6do.jpg)



And that's how easy it is to inspect collections in Ray.
