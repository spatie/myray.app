---
title: 'Testing mails in Laravel using Ray'
date: '2023-05-15T00:00:00.000000Z'
updated_at: '2024-05-16T13:06:18.000000Z'
published: true
summary: 'One of the most valuable features of Ray is its ability to preview emails in your local environment. This feature will also help you test entire mail flows.'
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
One of the most valuable features of Ray is its ability to preview emails in your local environment.

In this post, we'll explore how Ray can help you preview emails in your local environment and how it can simplify the process of developing and testing email workflows in Laravel.

## Rendering a mailable in Ray

To use Ray in a Laravel app, you only need to install the `laravel-ray` package. Changes are that, as a Ray user, you've already done this.

```
composer require spatie/laravel-ray
```

After that, there's no configuration needed. Whenever your Laravel app will now send a mailable, it will be displayed in Ray. Here's how that looks.

![](/media/blog/ray/testing-mails-in-laravel-using-ray/lgy4a5cn8rgid3ykxs7jx5jzeouu1gw0ugcwycix.jpg)



How does this work behind the scenes? Laravel is configured to write all emails to the log in a local environment. This prevents mails from being sent accidentally. Ray listens to what is writing in the log, and when it detects mail, it will pick up on it and display it.

## Testing email workflows in Ray

The mail displayed in Ray isn't static: all the links of the displayed mail will just work. This makes it easy to test entire email workflows using Ray.

A typical web app has a password reset flow where you get a mail that contains a link to reset your password. Using Ray, you can quickly test out the entire flow.

![](/media/blog/ray/testing-mails-in-laravel-using-ray/flow.gif)



This technique doesn't only work for a password reset but for any email flow in your app.

## In closing

Ray makes testing emails in a Laravel app very easy. There are lots more niceties for debugging Laravel apps in Ray. It can display all events, executed SQL queries, sent  HTTP requests, and much more. Learn all about it [our extensive documentation for Laravel](https://spatie.be/docs/ray/v1/usage/laravel).
