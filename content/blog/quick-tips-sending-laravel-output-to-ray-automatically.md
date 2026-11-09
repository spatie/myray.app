---
title: 'Quick tips: Sending Laravel output to Ray automatically'
date: '2026-02-16T00:00:00.000000Z'
updated_at: '2026-02-16T08:21:43.000000Z'
published: true
summary: "If you're using Laravel and the Laravel integration for Ray, you can configure it to send many different events, queries, requests and other calls automatically from your project to Ray."
authors:
  -
    name: Jimi
    avatar: /media/blog/authors/ca397f37e0ccdcd6d9343d0b01f27a23.png
header_image: null
og_image: /media/blog/ray_blog_quick_seo.jpg
tags: {}
---
If you use Laravel and [the Laravel integration for Ray](/docs/php/laravel/installation), you can configure it to automatically send various useful events, queries, requests and other calls from your project to Ray.

Not all calls are enabled by default. You can see what events are available in your `ray.php` file in [the root of your Laravel project](/docs/php/laravel/configuration). You can enable them there (globally) or override them individually using your .env file.

Here are some useful lines in that file we like to use during development:

## Duplicate & slow queries

```
// Disabled by default
'send_duplicate_queries_to_ray' => env('SEND_DUPLICATE_QUERIES_TO_RAY', false),
'send_slow_queries_to_ray' => env('SEND_SLOW_QUERIES_TO_RAY', false),
```

These ones are very useful to enable when debugging ... queries. While you can configure these to be logged by Laravel, it's much easier to have these appear directly in your Ray window.

## Exceptions

```
// Enabled by default
'send_exceptions_to_ray' => env('SEND_DUPLICATE_QUERIES_TO_RAY', false),
```

Send your whole stack trace from Laravel to Ray, which is equally interactive and a bit easier to navigate. It even allows you to share the trace ([through Flare](https://flareapp.io/)) if you need a colleague to have a look at your error.

![](/media/blog/screenshot-2026-01-23-at-13.46.07.png)

## Native dumps

```
// Disabled by default
'send_dumps_to_ray' => env('SEND_DUPLICATE_QUERIES_TO_RAY', false),
```

While we (obviously) recommend using the `ray()` function and its many [different methods](/docs/php/laravel/configuration), you can keep using `dd()` and `dump()` by enabling this setting. They will still print debug output in your application though.

## Want to know more?

You can find a lot of useful information in [our Laravel (and PHP, or Javascript) docs](/docs/getting-started/installation) on how to use Ray, and what different methods we offer. We also recently launched Ray 3.0, rebuilt for speed and efficiency. If you haven't used Ray in a while, now's a good time to download the trial!
