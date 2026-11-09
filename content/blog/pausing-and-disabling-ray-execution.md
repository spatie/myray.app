---
title: 'Pausing and disabling Ray execution'
date: '2024-04-26T00:00:00.000000Z'
updated_at: '2024-05-07T11:39:31.000000Z'
published: true
summary: 'An easy way to pause or disable Ray execution.'
authors:
  -
    name: Zuzana
    avatar: /media/blog/authors/8a083734e04b5b11002a8716a35be6d8.png
header_image: null
og_image: null
tags:
  - deep-dives
---
Let's say you have multiple Ray calls that you need to temporarily disable. You could go and comment them all out, or you could use `ray()->disable()` at the top of the file (or higher up in the call stack) to temporarily disable Ray execution.

You can also check if Ray has already been disabled somewhere else in your application by running `ray()->disabled()`, and you can run `ray()->enable()` and `ray()->enabled()` too. 

Disabling and enabling Ray execution is especially useful when running tests. You don't want your Ray output to be cluttered by Ray calls when running tests, which might happen if you have Ray calls scattered throughout your application.

An easy way to deal with this situation is to disable Ray at the beginning of the test and only enable it during the arrange step of the test. You can learn more about this technique in [this blog post](https://myray.app/blog/ray-as-a-debugging-companion-in-busy-integration-tests). 

What if you want to halt code execution altogether? There is a method for that! Run `ray()->pause()` to pause ALL code execution, and when you are ready to move forward, you can simply press the Continue button in the output.

![](/media/blog/ray/rays-amazing-functions/ray-pause-2.png)

<video class="aspect-video" controls loop autoplay muted>
  <source src="/media/blog/ray/rays-amazing-functions/ray-pause-2.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
