---
title: 'Use Ray to find queries that are slowing you down in your Laravel project'
date: '2023-08-11T00:00:00.000000Z'
updated_at: '2023-10-13T13:01:00.000000Z'
published: true
summary: |-
  Database queries are often one of the main bottlenecks when it comes down to your app’s speed. Not only is it important to give your users a snappy experience of your app, slow queries can cause major problems when your app is experiencing high load.
  Luckily Ray makes it super easy to find out what queries you should optimize.
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
## How to do this

Of course, the first thing that you need is the Ray app and the laravel-ray package. If you haven’t installed the package yet you can do this by running:

```
`composer require spatie/laravel-ray`
```

Next, you need to add the following to your .env file:

```
`SEND_SLOW_QUERIES_TO_RAY=true`
```

You can also do this by publishing the config file and overriding the default there.

```
php artisan ray:publish-config
```

You can also configure what should be considered a slow query. By default, Ray will show all queries that are slower than 500ms. But depending on your situation you might want to be more or less ambitious.

For example, let’s say you want to report every query that’s slower than 100ms, then you would add this to your .env file:

```
RAY_SLOW_QUERY_THRESHOLD_IN_MS=100
```

## An example

Imagine we have a users table and a posts table with tons of records, and we want to shop a set of users that forgot to take out ‘lorum ipsum’ in their post.

By nature, this wouldn’t be the fastest query, especially because we forgot to put an index on the user_id column.

Because the execution time went over the threshold of 100ms we set up Ray will make us aware of this slow query:

![](/media/blog/ray/use-ray-to-find-queries-that-are-slowing-you-down-in-your-laravel-project/cwy0tfoukgzlwimnhbvcvb5kff38c1gdcsenrkva.png)



## Showing slow queries in specific places

If you don’t want to log all slow queries in your application you can also opt to pick your own starting point to start logging. This can be done by calling the showSlowQueries() method in your code:

```
ray()->showSlowQueries(100);
```

## Other methods to improve your queries

Besides logging slow queries Ray has a ton of other useful tools to improve the database interactions within your app like  [Showing queries](https://spatie.be/docs/ray/v1/usage/laravel#content-showing-queries) and [Counting queries](https://spatie.be/docs/ray/v1/usage/laravel#content-showing-queries).
