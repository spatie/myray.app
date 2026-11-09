---
title: 'Looking deeper into code with Ray'
date: '2024-04-04T00:00:00.000000Z'
updated_at: '2024-04-04T11:58:45.000000Z'
published: true
summary: 'Use Ray to look where your code is called and how many times.'
authors:
  -
    name: Zuzana
    avatar: /media/blog/authors/8a083734e04b5b11002a8716a35be6d8.png
header_image: null
og_image: null
tags:
  - deep-dives
---
[Ray](https://spatie.be/products/ray) is a lightweight desktop app that will help you to debug your code faster. But Ray is more than just a `dd()` call in disguise. 

An interesting method that Ray comes with is `ray()->count()` which will count how many times a piece of code is called. 

This method can be paired with `ray()->caller()` which will tell you what code called this method.

![](/media/blog/ray/rays-amazing-functions/ray-caller-count.png)

You can also use Ray to display your PHP info right in the output by calling `ray()->phpinfo()`.

![](/media/blog/ray/rays-amazing-functions/ray-phpinfo.png)
