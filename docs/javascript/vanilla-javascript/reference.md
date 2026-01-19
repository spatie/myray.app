---
title: Methods
weight: 2
---

This page lists all the methods available on the `ray()` function in JavaScript and TypeScript. 

These methods apply to all JavaScript integrations, including React, Vue, and Alpine.

## Available methods

| Call | Description |
| --- | --- |
| `ray(variable)` | Display a string, array or object |
| `ray(var1, var2, ...)` | Ray accepts multiple arguments |
| `ray().blue()` | Output in blue. Use `green`, `orange`, `red`, `blue`, `purple` or `gray` |
| `ray().caller()` | **Asynchronous.** Show the calling class and method |
| `ray().chain(callback)` | Chain multiple Ray payloads and send them all at once. `callback: (ray: Ray) => void` |
| `ray().clearScreen()` | Clear current screen |
| `ray().clearAll()` | Clear current and all previous screens |
| `ray().className(obj)` | Display the classname for an object |
| `ray().confetti()` | Display confetti in Ray |
| `ray().count(name)` | Count how many times a piece of code is called, with optional name |
| `ray().date(date, format)` | Display a formatted date, the timezone, and its timestamp |
| `ray().die()` | Halt code execution - **NodeJS only** |
| `ray().disable()` | Disable sending stuff to Ray |
| `ray().disabled()` | Check if Ray is disabled |
| `ray().enable()` | Enable sending stuff to Ray |
| `ray().enabled()` | Check if Ray is enabled |
| `ray().error(err)` | Display information about an Error/Exception |
| `ray().event(name, data)` | Display information about an event with optional data |
| `ray().exception(err)` | **Asynchronous.** Display extended information and stack trace for an Error/Exception |
| `ray().file(filename)` | **NodeJS only.** Display contents of a file |
| `ray().hide()` | Display something in Ray and make it collapse immediately |
| `ray().hideApp()` | Programmatically hide the Ray app window |
| `ray().html(string)` | Send HTML to Ray |
| `ray().htmlMarkup(string)` | Display syntax-highlighted HTML code in Ray |
| `ray().if(true, callback)` | Conditionally show things based on a truthy value or callable |
| `ray().image(url)` | Display an image in Ray |
| `ray().interceptor()` | Access ConsoleInterceptor; call `.enable()` to show `console.log()` calls in Ray |
| `ray().json([...])` | Send JSON to Ray |
| `ray().label(string)` | Add a text label to the payload |
| `ray().limit(N)` | **Asynchronous.** Limit the number of payloads that can be sent to Ray to N |
| `ray().macro(name, callable)` | Add a custom method to the Ray class |
| `ray().measure(callable)` | Measure the performance of a callback function |
| `ray().measure()` | Begin measuring the overall time and elapsed time since previous `measure()` call |
| `ray().newScreen()` | Start a new screen |
| `ray().newScreen('title')` | Start a new named screen |
| `ray().nodeinfo()` | **NodeJS only.** Display statistics about node, such as the v8 version and memory usage |
| `ray().notify(message)` | Display a notification |
| `ray().once(arg1, ...)` | **Asynchronous.** Only send a payload once when in a loop |
| `ray().pass(variable)` | Display something in Ray and return the value instead of a Ray instance |
| `ray().pause()` | Pause code execution within your code; must be called using `await` |
| `ray().projectName(name)` | Change the active project name |
| `ray().remove()` | Remove an item from Ray |
| `ray().screenColor(color)` | Changes the screen color to the specified color |
| `ray().separator()` | Display a separator |
| `ray().showApp()` | Programmatically show the Ray app window |
| `ray().small()` | Output text smaller. Use `large` or `small` |
| `ray().stopTime(name)` | Removes a named stopwatch if specified, otherwise removes all stopwatches |
| `ray().table(...)` | Display an array or an object formatted as a table |
| `ray().text(string)` | Display raw text in Ray while preserving whitespace formatting |
| `ray().toJson(variable)` | Convert a variable using `JSON.stringify()` and display the result |
| `ray().trace()` | Display a stack trace |
| `ray().xml(string)` | Send XML to Ray |
