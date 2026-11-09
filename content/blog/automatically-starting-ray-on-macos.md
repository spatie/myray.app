---
title: 'Automatically starting Ray on MacOS'
date: '2023-12-14T00:00:00.000000Z'
updated_at: '2023-12-14T14:37:15.000000Z'
published: true
summary: 'Using a bit of AppleScript, you can automatically start the Ray desktop app from your PHP code.'
authors:
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
When using Ray to debug your project, you're not using a function like `dump($variable)` to display the value of a variable, but `ray($variable)`. This will send the value of your variable to the Ray desktop app. Of course, Ray can do [a whole lot more](https://spatie.be/docs/ray/v1/usage/reference) than just displaying the content of a variable.

Behind the scenes, when you execute `ray()` an HTTP call will be made to a port the Ray desktop app listens to. But what happens if the Ray desktop app is not open? Well, nothing ... your call will be lost in the void. Would it be nice if we could automatically start up Ray whenever `ray()` is executed?

Since its inception, MacOS has had support for automating various tasks through AppleScript. Using a bit of AppleScript, we can launch the Ray application whenever it is not running.

```
set appBundleID to "be.spatie.ray"

tell application "System Events"

    if not (exists (processes whose bundle identifier is appBundleID)) then

        tell application "Ray" to activate

        delay 1

    end if

end tell
```

The above script should be executed whenever a `ray()` call is made. You can do that using `Ray::beforeSendRequest()`, which accepts a closure.

```php
// somewhere where your app is booting

Ray::beforeSendRequest(function () {

    $script = '

        set appBundleID to "be.spatie.ray"

        tell application "System Events"

            if not (exists (processes whose bundle identifier is appBundleID)) then

                tell application "Ray" to activate

                delay 1

            end if

        end tell

    ';

    $escapedScript = escapeshellarg($script);

    $command = "osascript -e $escapedScript";

    $output = shell_exec($command);

});
```



You should put this code somewhere where your app is booting. In a Laravel app, you could put this code in a service provider.

With this in place, the Ray desktop app will automatically boot up where you call `ray()` in your PHP code.

<iframe class="w-full" style="aspect-ratio: 16/9" src="https://www.youtube-nocookie.com/embed/a8qo-fBo3Ik?&playlist=a8qo-fBo3Ik&controls=0&showinfo=0&autoplay=1&mute=1&loop=1"></iframe>



A big thank you to [Sebastian Kloos](https://twitter.com/SebastiaanKloos) for [coming up](https://github.com/spatie/ray/pull/859) with this neat technique!

We're currently considering adding this code to the Ray PHP itself, but we wanted to already share this cool bit of knowledge with you.
