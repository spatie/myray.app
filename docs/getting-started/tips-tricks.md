---
title: Tips & Tricks
weight: 2
---

[Ray](https://myray.app) is a very simple app to use. You can use any of the `ray` calls that are documented in [the usage section](/docs/php/vanilla-php/usage).

## Clearing the screen

When debugging, you probably will need a couple of attempts to find the source of the bug. For each attempt, you could opt to use a new screen, so you will only see the output of your current attempt. There are three ways for creating a new screen.

1. Clicking the `+` button in the menubar
2. By executing `ray()->newScreen()` somewhere in your code. Optionally, you can pass a screen name as an argument to `newScreen`.
3. By pressing `Cmd+K` on Mac or `Ctrl+K` on Windows when the Ray app is active.  When the Ray app is not the active one, press `Cmd+Shift+K on Mac or `Ctrl+Shift+K` on Windows to clear the screen.

## Using color filters

You can give an item a color using one of the [color functions](/docs/php/vanilla-php/usage#using-colors). On top of the screen you can turn on a color filter to only see items with a specific color.

## Keep Ray on top

If you want Ray always to be on top, just toggle on the `Keep on top` toggle on the menubar. In our experience, this is pretty handy to make sure that Ray is always visible, event when switching applications or workspaces.

## Cleaning up after yourself

At the bottom of every item that displayed in Ray, you'll see a link that, when clicked, will take you to where this item was sent to ray. You can use this to, after debugging, quickly find locations where `ray()` calls are made, so you can remove them.

![screenshot](/screenshots/tips-1.png)

When a Ray screen is displaying many items, it might be bothersome to click each item. In this case, you can click "List files" to get a unique list of locations where a Ray call is in your source code.

![screenshot](/screenshots/tips-2.png)

Should you forget to remove a `ray()` call in a Laravel app, and push your code to production, no worries. Ray will not try to transmit any info in a production environment.

## Hiding the app using the hotkey

You can press `Cmd+Shift+L` to hide or show the app, no matter which application is the active on.

You can customize this key in the preferences.

![screenshot](/screenshots/shortcuts.png)
