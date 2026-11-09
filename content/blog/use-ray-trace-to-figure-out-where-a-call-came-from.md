---
title: 'Use ray()->trace() to figure out where a call came from'
date: '2023-06-15T00:00:00.000000Z'
updated_at: '2023-10-13T13:01:40.000000Z'
published: true
summary: 'Easeliy find your way in codepaths by printing backtraces with with ray()->trace()'
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
An important problem of a programmer's productivity is finding his way through the code. A good project structure and your IDE can get you a long way, but sometimes it’s not enough. Luckily enough Ray has a bunch of tools to help you out.

## The problem

Imagine an example where you have a NotifyUserAction being called, but you are unsure exactly why or where this call happens. Your IDE tells you the action is being used in 10 different files, and you don’t want to walk through all the code paths.

## The solution

An easy way to figure this out is to add a call to Ray with the “trace” method.

```
class NotifyUserAction
{
    public function execute(): void
    {
        ray()->showApp()->trace();

        // Some logic to notify the user...
    }
}
```

Now the only thing you have to do is use the application and look at Ray. Once your application hits the trace method, a nice backtrace will be shown in Ray.

![](/media/blog/ray/use-ray-trace-to-figure-out-where-a-call-came-from/lir2tj2q43hqula1wcihrah1p9xugpvfmgf3j5ow.png)



The entries in the trace that belong to your application are highlighted in blue, making it easier to visually distinguish them from the code originating from the framework and packages.

If you are unsure what exact user action is triggering this part of your code and you want to click around your app until it shows, you can always chain in the showApp() method, which will bring Ray to the foreground once that part of the code is being hit.

`ray()->showApp()->trace();`

The trace method is only one of many powerfull tools Ray provides. Make sure to take a look at [the documentation](https://spatie.be/docs/ray/v1/usage/reference) if you want to learn more.
