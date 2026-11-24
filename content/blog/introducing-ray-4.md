---
title: 'Introducing Ray 4'
date: '2026-11-24T00:00:00.000000Z'
updated_at: '2026-11-24T00:00:00.000000Z'
published: true
summary: "Ray 4 is here: a complete rewrite in Rust. It's the same Ray you know, just much faster and lighter. And it's a free upgrade for everyone already using Ray."
authors:
  -
    name: Dries
    avatar: /media/blog/authors/910fb7d3b4ded4d33952ae4e54b48b5b.png
header_image: null
og_image: null
tags: {}
---

Ray 4 is here! We rewrote Ray from scratch in Rust. It's the same Ray you know, with the same windows, logs, themes and shortcuts. Under the hood, everything is new.

And the best part? It's a **free upgrade** for everyone already using Ray. [Download Ray 4](https://myray.app/) for your platform.

## Faster and lighter

- **Faster:** Ray 4 is ready to receive logs in 41 ms and handles 10,000 logs about **194×** faster than Ray 3.
- **Lighter:** it uses about **4×** less memory at idle, and the download is about **5×** smaller.
- **Native everywhere:** Ray 4 runs natively on macOS, Windows and Linux.

![Benchmark comparing Ray 4 and Ray 3](/media/blog/ray/introducing-ray-4/ray-4-vs-ray-3.webp)

## What else is new

- **Heavy logs, no problem:** if a bug sends thousands of logs at once, Ray no longer slows down your computer.
- **No freezes:** Ray parses big dumps on a background thread, so the window stays smooth.
- **Safer SSH:** Ray asks before it trusts a new server, and warns you when a server's key changes.
- **Crash recovery:** after a crash, Ray opens again and shows what went wrong.
- **An easter egg:** find out yourself!

## Why Rust?

Ray 3 still ran on Electron, so a full Chromium browser was running under the hood. That limited how fast and light Ray could get. Ray 4 uses GPUI, the Rust UI engine behind the Zed editor. It draws directly on the GPU, with no browser in between.

Curious how we rebuilt Ray in a few weeks with the help of AI agents? Read the full story [on the Spatie blog](https://spatie.be/blog/ray-is-getting-rusty).

## Found a bug?

Ray 4 is a complete rewrite, so a few small bugs may still be hiding. If you find one, mail us at [support@spatie.be](mailto:support@spatie.be) or open a [GitHub issue](https://github.com/spatie/ray/issues).

[Download Ray 4](https://myray.app/) and let us know what you think!
