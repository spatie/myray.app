---
title: Using Ray
weight: 2
---

Ray is a simple desktop app that displays your debug output in a clean, organized way. This page covers the how to navigate interface, some settings to review, and some other useful tips.

## Explore the interface

When you first open Ray, you'll see the welcome screen with some useful tips. This screen will appear each time you open the app and will disappear when you send messages.

![screenshot](/images/screenshots/docs_welcome.png)

Here is an overview of every item in the menu bar:

- **Pause/Resume**: Temporarily stop accepting new messages.
- **Search**: Find messages containing specific text.
- **Clear screen**: Move all current messages to the archive.
- **Color labels**: Filter messages by color (e.g. messages sent with `ray('hello')->color('red')`).
- **Archive**: View all archived messages.
- **Settings**: Configure Ray to your preferences.
- **Servers**: Connect directly to configured remote servers.
- **Pin**: Keep the Ray window on top of other windows.

## Settings

When you first start using Ray, it's worth configuring a few settings.

1. **Set up your preferred IDE**

Each message shows where it got called from. Clicking on the link will take you straight to the relevant line in your code. Ray needs to know what IDE you use, which you can select from the settings menu. We support PhpStorm, Visual Studio Code, Cursor, Zed and Sublime, and others.

2. **Review and customize shortcuts**

Ray has a few global shortcuts and hotkeys that you can customise. Useful shortcuts to review are:

- Showing or hiding the Ray window
- Pinning and unpinning the Ray window
- Clearing all messages
- Customising the layout of your messages at any time

3. **Appearance**

Ray comes with a few built-in themes and some accessibility options. 

By default, Ray uses the dark 'Midnight' theme. You can choose to synchronise the theme with your OS's settings. You can also choose to display names for the labels instead of using only color.

## Tips & Tricks

### Clear the screen

When debugging, you'll often want to start fresh between attempts. Use `ray()->newScreen()` to archive existing messages and start with a clean window. You can also press `Cmd+K` on Mac or `Ctrl+K` on Windows to clear the screen when Ray is active. 

![screenshot](/images/screenshots/docs_screen_cleared.png)

You can optionally pass a screen name: `ray()->newScreen('Second attempt')`.

![screenshot](/images/screenshots/docs_screen_title.png)

### Filter by color

Give messages a color using color functions (e.g. `$ray->red()` in PHP), then use the color filter in the menubar to show only messages of a specific color.

![screenshot](/images/screenshots/docs_color_labels.png)

### Filter by type

Some messages types are automatically assigned a badge. You can filter your window to show only these messages by simply clicking on the badge.

![screenshot](/images/screenshots/docs_filter_type.png)
