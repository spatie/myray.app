---
title: Reference
weight: 2
---

To display something in Ray use the `ray()` function. It accepts everything: strings, arrays, objects… you name it.

## Reference

| Call                                                | Description                                                                                                               |
|-----------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------|
| `ray($variable)`                                    | Display a string, array or object                                                                                         |
| `ray($variable, $another, …)`                       | Ray accepts multiple arguments                                                                                            |
| `ray()->backtrace()`                                | Check entire backtrace                                                                                                    |
| `ray(…)->blue()`                                    | Output in blue                                                                                                            |
| `ray()->caller()`                                   | Discover where code is being called                                                                                       |
| `ray()->carbon($carbon)`                            | Send `Carbon` instances to Ray                                                                                            |
| `ray($callable)->catch([$callable, $classname, …])` | Handle any exceptions encountered by `try`                                                                                |
| `ray()->className($object)`                         | Send the classname of an object to Ray                                                                                    |
| `ray()->clearScreen()`                              | Clear current screen                                                                                                      |
| `ray()->clearAll()`                                 | Clear current and all previous screens                                                                                    |
| `ray()->confetti()`                                 | Shoot confetti in the current screen.                                                                                     |
| `ray()->count()`                                    | Count how many times a piece of code is called                                                                            |
| `ray()->counterValue(name)`                         | Return the value of a named counter                                                                                       |
| `ray(…)->die()` or `rd(…)`                          | Stop the PHP process                                                                                                      |
| `ray()->disable()`                                  | Disable sending stuff to Ray                                                                                              |
| `ray()->disabled()`                                 | Check if Ray is disabled                                                                                                  |
| `ray()->enable()`                                   | Enable sending stuff to Ray                                                                                               |
| `ray()->enabled()`                                  | Check if Ray is enabled                                                                                                   |
| `ray()->exception($e)`                              | Display information about an Exception                                                                                    |
| `ray()->file($path)`                                | Display contents of a file                                                                                                |
| `ray(…)->gray()`                                    | Output in gray                                                                                                            |
| `ray(…)->green()`                                   | Output in green                                                                                                           |
| `ray(…)->hide()`                                    | Display something in Ray and make it collapse immediately                                                                 |
| `ray()->hideApp()`                                  | Hide the app                                                                                                              |
| `ray()->html($html)`                                | Render a piece of HTML                                                                                                    |
| `ray()->image($path)`                               | Display an image from a path or URL                                                                                       |
| `ray()->if(true, callback)`                         | Conditionally show things based on a truthy value or callable                                                             |
| `ray()->invade(object)->privateProperty`            | Display the value of a private property or the result of a private method                                                 |
| `ray()->json($json, $another, …)`                   | Send one or more valid JSON strings to Ray                                                                                |
| `ray(…)->label($name)`                              | Set the label name                                                                                                        |
| `ray(…)->large()`                                   | Output text bigger                                                                                                        |
| `ray()->limit(N)->…`                                | Limit the number of payloads that can be sent to Ray to N; used for debugging within loops                                |
| `ray()->link($url, $label = null)`                  | Display a clickable URL in Ray                                                                                            |
| `ray()->measure()`                                  | Display runtime and memory usage. When measure is called again, the time between this and previous call is also displayed |
| `ray()->newScreen()`                                | Start a new screen                                                                                                        |
| `ray()->newScreen('title')`                         | Start a new named screen                                                                                                  |
| `ray(…)->notify($message)`                          | Display a notification                                                                                                    |
| `ray()->once($arg1, …)`                             | Only send a payload once when in a loop                                                                                   |
| `ray(…)->orange()`                                  | Output in orange                                                                                                          |
| `ray(…)->pass($variable)`                           | Display something in Ray and return the value instead of a Ray instance                                                   |
| `ray()->pause()`                                    | Pause execution                                                                                                           |
| `ray()->phpinfo()`                                  | Display PHP info                                                                                                          |
| `ray()->phpinfo($key, $another, …)`                 | Display specific parts of PHP info                                                                                        |
| `ray(…)->purple()`                                  | Output in purple                                                                                                          |
| `ray()->rateLimiter()->max(int $maxCalls)`          | Limits the amount of calls sent to Ray                                                                                    |
| `ray()->rateLimiter()->perSecond($maxCalls)`        | Limits the amount of calls sent to Ray in a second                                                                        |
| `ray()->rateLimiter()->clear()`                     | Clears the rate limits                                                                                                    |
| `ray()->raw($value)`                                | Send raw output of a value to Ray without fancy formatting                                                                |
| `ray(…)->red()`                                     | Output in red                                                                                                             |
| `ray()->separator()`                                | Add a visual separator                                                                                                    |
| `ray()->showApp()`                                  | Bring the app to the foreground                                                                                           |
| `ray(…)->small()`                                   | Output text smaller                                                                                                       |
| `ray()->table($array, $label)`                      | Format an associative array with optional label                                                                           |
| `ray()->text($string)`                              | Display the raw text for a string while preserving whitespace formatting                                                  |
| `ray()->toJson($variable, $another, … )`            | Display the JSON representation of 1 or more values that can be converted                                                 |
| `ray()->trace()`                                    | Check entire backtrace                                                                                                    |
| `ray()->url($url, $label = null)`                   | Display a clickable URL in Ray                                                                                            |
| `ray()->xml($xmlString)`                            | Display formatted XML in Ray                                                                                              |

## Updating a Ray instance

| Call | Description |
| --- | --- |
| `$ray->large()` | Update the size of a Ray instance. Use `large()` or `small`   |
| `$ray->red()` | Update the color of a Ray instance. Use `green()`, `orange()`, `red()`, `blue()`,`purple()` or `gray()`   |
| `$ray->remove()` | Remove an item from Ray   |
| `$ray->removeIf(true)` | Conditionally remove an item based on a truthy value or callable   |
| `$ray->removeWhen(true)` | Conditionally remove an item based on a truthy value or callable   |
| `$ray->send()` | Update the content of a Ray instance  |
