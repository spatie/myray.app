---
title: 'Ray 3.0 Beta is here!'
date: '2025-11-20T00:00:00.000000Z'
updated_at: '2025-11-24T14:33:26.000000Z'
published: true
summary: 'It’s been a bit quiet from us these last few weeks, but for good reason. We wanted to hand you a beta we’re genuinely proud of. Our full rebuild of Ray has almost hit 100% feature parity with Ray v2 — just… better, everywhere.'
authors:
  -
    name: Dries
    avatar: /media/blog/authors/910fb7d3b4ded4d33952ae4e54b48b5b.png
header_image: null
og_image: null
tags: {}
---
It’s been a bit quiet from us these last few weeks, but for good reason. We wanted to hand you a beta we’re genuinely proud of. Our full rebuild of Ray has almost hit 100% feature parity with Ray v2 — just… better, everywhere. You can download the beta here: [next.myray.app](https://next.myray.app/). Your Ray v2 license works with Ray 3.0! So it should be a seamless upgrade.

## Ray 3 Highlights

In Ray v2, clearing your logs created a new “screen” while keeping all old logs in memory. If that sounds like a memory leak waiting to happen… yeah, it kind of was. We did it so you could jump back to previous screens easily, but it came at a cost.

Ray 3.0 completely changes this with the new message archive. It’s a dedicated screen that stores all your past Ray sessions in one easy-to-reach place. The best part? Past sessions live on disk and are only loaded when you open the archive.

![Archive screen](/media/blog/ray/ray-3-0-beta-is-here/archive.png)

No more memory ballooning during those late-night debugging marathons. Ray 3.0 just keeps humming along.

The biggest visible change in Ray 3.0 is the UI. We went for a more modern look and added animations, small interactions, smooth transitions — the whole thing just feels sharper and more alive.

![Ray main application](/media/blog/ray/ray-3-0-beta-is-here/main.png)

We also added a system that lets us support even more themes in the future. Today, Ray ships with two: **Moonlight** and **Daylight**, with more on the way.

![Ray Daylight theme](/media/blog/ray/ray-3-0-beta-is-here/daylight.png)

Even though we rebuilt Ray from scratch, nothing really changes for you day-to-day. It’s still the Ray you open every morning. Just faster, smoother, and cleaner under the hood.

We rebuilt Ray because we wanted a codebase we can maintain and extend without fighting it. Ray started as a fun little side project, and the codebase showed it. Now that we understand how people actually use Ray and where the rough edges are, starting fresh just made sense.

As a bonus, this new foundation lets us ship new features much more easily. A tiny teaser of what _might_ be coming: let’s just say… every app has it these days. AI, MCP, something something… 🤖


## You can help us!

Ray 3.0 is still in beta, which means there are probably a few bugs hiding in the corners. That’s where you come in! We’ve set up a public [GitHub repository](https://github.com/spatie/ray-app-v3-beta) for Ray 3.0 where you can report issues and help us smooth out the rough edges.

But it’s not just about bug reports, we’d love to chat with you during the open beta. If you have ideas, features you’re missing, or something in your workflow Ray could help with, drop them in the [dedicated GitHub discussion](https://github.com/spatie/ray-app-v3-beta/discussions/1). We’re all ears.

So what are you waiting for, head over to [next.myray.app](https://next.myray.app/) to get your hands on Ray 3.0!
