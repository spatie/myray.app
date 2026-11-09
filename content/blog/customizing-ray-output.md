---
title: 'Customizing Ray output'
date: '2024-03-03T00:00:00.000000Z'
updated_at: '2024-03-25T13:06:21.000000Z'
published: true
summary: "Customizing Ray's output window."
authors:
  -
    name: Zuzana
    avatar: /media/blog/authors/8a083734e04b5b11002a8716a35be6d8.png
header_image: null
og_image: null
tags:
  - deep-dives
---
Did you know you can customize Ray's output?

When you call Ray without any customization, the output will be displayed in this window:

![](/media/blog/ray/rays-amazing-functions/ray-original-output-2.png)

While this looks good as it is,  there are things you can do to improve the style of the output.

You can make the output font size smaller or larger by calling `ray(…)->small()` or `ray(…)->large`, with the default size being `regular`. You can also separate items by calling `ray()->separator()` to improve the readability of the output.

![](/media/blog/ray/rays-amazing-functions/ray-font-sizes-2.png)

To futher improve readability of the Ray output, you can change the colour of the output indicator. You can use `green()`, `orange()`, `red()`, `blue()`,`purple()` or `gray()` colors and turn on the color filter on the output to only display items with specific color.

`ray(…)->red()` 

![](/media/blog/ray/rays-amazing-functions/ray-colors-2.png)

<video class="aspect-video" controls loop autoplay muted>
  <source src="/media/blog/ray/rays-amazing-functions/ray-colors-2.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
