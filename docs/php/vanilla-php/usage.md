---
menuTitle: Usage
title: Using Ray With PHP
weight: 2
---

To display something in Ray use the `ray()` function. It accepts everything: strings, arrays, objects… you name it.

```php
ray('a string');

ray(['an array']);

ray($anObject);
```

![screenshot](/screenshots/usage.png)

`ray` accepts multiple arguments. Each argument will be displayed in the Ray app.

```php
ray('as', 'many' , 'arguments', 'as', 'you', 'like');
```

## See the caller of a function

Sometimes you want to know where your code is being called. You can quickly determine that by using the `caller`
function.

```php
ray()->caller();
```

![screenshot](/screenshots/caller.png)

If you want to see the entire backtrace, use the `trace` (or `backtrace`).

```php
ray()->trace();
```

![screenshot](/screenshots/trace.png)

## Pausing execution

You can pause execution of a script by using the `pause` method.

```php
ray()->pause();
```

![screenshot](/screenshots/pause.png)

If you press the "Continue" button in Ray, execution will continue. When you press "Stop execution", Ray will throw an
exception in your app to halt execution.

If you are using Windows, you must set the maximum execution time to a high value, as the paused time will count against the maximum execution time.

## Halting the PHP process

You can stop the PHP process by calling `die`.

```php
ray($anything)->die();
```

Alternatively, you can use the `rd` function.

```php
rd($anything);
```

## Counting execution times

You can display a count of how many times a piece of code was called using `count`.

Here's an example:

```php
foreach (range(1, 2) as $i) {
    ray()->count();

    foreach (range(1, 4) as $j) {
        ray()->count();
    }
}
```

This is how that looks like in Ray.

![screenshot](/screenshots/count.png)

Optionally, you can pass a name to `count`. Ray will display a count of how many times a `count` with that name was
executed.

Here's an example:

```php
foreach (range(1, 4) as $i) {
    ray()->count('first');

    foreach (range(1, 2) as $j) {
        ray()->count('first');

        ray()->count('second');
    }
}
```

You may access the value of a named counter using the  `counterValue` function.

```php
foreach (range(1, 4) as $i) {
    ray()->count('first');

    if (ray()->counterValue('first') === 2) {
        echo "counter value is two!";
    }
}
```

This is how that looks like in Ray.

![screenshot](/screenshots/named-count.png)

## Measuring performance and memory usage

You can use the `measure` function to display runtime and memory usage. When `measure` is called again, the time between
this and previous call is also displayed.

```php
ray()->measure();

sleep(1);

ray()->measure();

sleep(2);

ray()->measure();
```

![screenshot](/screenshots/measure.png)

The `measure` call optionally accepts a callable. Ray will output the time needed to run the callable and the maximum
memory used.

```php
ray()->measure(function() {
    sleep(5);
});
```

![screenshot](/screenshots/measure-closure.png)

## Display the class name of an object

To quickly send the class name of an object to ray, use the `className` function.

```php
ray()->className($anObject)
```

## Displaying the private properties & methods

Using Ray, you can easily see the value of a private property or the result of a private method.

Consider this simple class:

```php
class PrivateClass
{
    private string $privateProperty = 'this is the value of the private property';

    private function privateMethod()
    {
        return 'this is the result of the private method';
    }
}
```

Here's how you can send the value of the private property to Ray.

```php
$privateClass = new PrivateClass();

ray()->invade($privateClass)->privateProperty;
```

The `invade()` method can also display the results of private methods in Ray.

```php
$privateClass = new PrivateClass();

ray()->invade($privateClass)->privateMethod();
```

If you want to colorize the result, simply tack on one of the color methods.

```php
$privateClass = new PrivateClass();

ray()->invade($privateClass)->privateProperty->red();
ray()->invade($privateClass)->privateMethod()->green();

```

## Updating displayed items

You can update values that are already displayed in Ray. To do this, you must hold on the instance returned by the `ray`
function and call send on it.

Here's an example where you'll see a countdown from 10 to one.

```php
$ray = ray('counting down!');

foreach(range(10, 1) as $number) {
    sleep(1);
    $ray->send($number);
}
```

The instance `$ray` may also be used to add a color or size to items already on display. Here's an example where an
items will change color and size after a second

```php
$ray = ray('a string');

sleep(1);

$ray->red()->large()
```

## Conditionally showing items

You can conditionally show things using the `showIf` method. If you pass a truthy value, the item will be displayed.

```php
ray('will be shown')->showIf(true);
ray('will not be shown')->showIf(false);
```

You can also pass a callable to `showIf`. If the callable returns a truthy value, it will be shown. Otherwise, it will
not.

## Conditionally sending items to Ray

If for any reason you do not want to send payloads to Ray _unless_ a condition is met, use the `if()` method.

You can call `if()` in two ways: only with a conditional, or with a conditional and a callback.  A conditional can be either a truthy
value or a callable that returns a truthy value.


Note that when `if()` is called with only a conditional, **all** following chained methods will only execute if the conditional
is true.  When using a callback with `if()`, all additional chained methods will be called.

```php
foreach(range(1, 100) as $number) {
    ray()->if($number < 10)->text("value is less than ten: $number")->blue();

    ray()->if(function() use ($number) {
        return $number == 25;
    })->text("value is twenty-five!")->green();

    // display "value: #" for every item, and display
    // even numbered values as red
    ray()->text("value: $number")
        ->if($number % 2 === 0)
        ->red();
}
```

You can even chain multiple `if()` calls without callbacks:

```php
foreach(range(1, 10) as $number) {
    // display "value: #" for every item, and display even values as red
    // and odd values as blue, except for 10 -- which is shown with large
    // text and in green.
    ray()
        ->text("value: $number")
        ->if($number % 2 === 0)
            ->red()
        ->if($number % 2 !== 0)
            ->blue()
        ->if($number === 10)
            ->large()
            ->green();
}
```

Or chain multiple calls to `if()` with callbacks that don't affect the chained methods following them:

```php
foreach(range(1, 100) as $number) {
    // display "value: #" for all items and make each item green.
    // items less than 20 will have their text changed.
    // when the value is an even number, the item will be displayed with large text.
    ray()->text("value: $number")
        ->if($number < 10, function($ray) use ($number) {
            $ray->text("value is less than ten: $number");
        })
        ->if($number >= 10 && $number < 20, function($ray) use ($number) {
            $ray->text("value is less than 20: $number");
        })
        ->if($number % 2 === 0, function($ray) {
            $ray->large();
        })
        ->green();
}
```


## Removing items

You can remove an item that is already displayed in Ray. To do this, call the `remove` function on an instance return by
the `ray` function.

```php
$ray = ray('will be removed after 1 sec');

sleep(1);

$ray->remove();
```

You can also conditionally remove items with the `removeWhen` function (or the `removeIf` alias).

```php
ray('this one will be remove if the number is 2')->removeWhen($number === 2);
```

`removeWhen` also accepts a callable.

```php
ray('this one will be remove if the number is 2')->removeWhen(fn() => … // return true to remove the item);
```

## Returning items

To make all methods chainable, the `ray()` function returns an instance of `Spatie\Ray\Ray`. To quickly send something
to Ray and have that something return as a value, use the `pass` function.

```php
ray()->pass($anything) // $anything will be returned
```

This is handy when, for instance, debugging return values.

You can change

```php
function foo() {
    return 'return value',
}
```

to

```php
function foo() {
    return ray()->pass('return value'),
}
```

## Showing PHP info

Using `phpinfo()` you can quickly see some information about your PHP environment.
You can also pass ini options to see the value of those options.

```php
ray()->phpinfo();
ray()->phpinfo('xdebug.enabled', 'default_mimetype');
```

![screenshot](/screenshots/phpinfo.png)


## Displaying exceptions

You can display information about an Exception in Ray, including a snippet of source code showing where it was thrown.

```php
try {
  throw new \Exception('test');
} catch(\Exception $e) {
  ray()->exception($e);
}
```

## Callables and handling exceptions

You can use Ray to handle exceptions using when passing a callable to `ray` using the `catch` function.  If no exceptions are thrown, the result of the callable is sent to the Ray app.

`catch` accepts several parameters to customize how and which exceptions are handled.  If no parameters are passed, all Exceptions are swallowed and execution continues.

```php
ray($callable)->catch();
// execution will continue.
```

You can also pass a callable to `catch` to customize the handling of an Exception.  If you typehint the `$exception` variable, only Exceptions of that type will be handled.  PHP 8 union types are supported.

```php
ray($callable)->catch(function(MyException $exception) {
   // do something with $exception if it is of the MyException type
});

ray($callable)->catch(function($exception) {
   // handle any exception type
});
```

The `catch` callable also accepts a second, optional parameter - `$ray` - that provides access to the current instance of the `Ray` class if you'd like more control over

If you prefer to swallow all exceptions of a given type without specifying a callback, simply pass the Exception class name or names:
```php
ray($callable)->catch(CustomExceptionOne::class);

ray($callable)->catch([
    CustomExceptionOne::class,
    CustomExceptionTwo::class,
]);
```

You can even pass multiple callables and/or classnames as an array to `catch` and they will be treated as possible handlers for any Exceptions:

```php
ray($callable)->catch([
    function(CustomExceptionOne $exception) {
       // handle CustomExceptionOne exceptions
    },
    function(CustomExceptionTwo $exception) {
       // handle CustomExceptionTwo exceptions
    },
    \Exception::class,
]);
```

If you would like to immediately throw any unhandled exceptions from the callable after calling `ray`, chain the `throwExceptions` function onto the `ray` call.  If `throwExceptions` is not chained, it will be called when PHP finishes executing the script or application.

```php
// immediately throw unhandled exceptions
ray($callable)
    ->catch(CustomExceptionOne::class)
    ->throwExceptions();
```

After calling `catch`, you may continue to chain methods that will be called regardless of whether there was an exception handled or not.

## Showing raw values

When you sent certain values to Ray, such as Carbon instances or Eloquent models, these values will be displayed in nice way. To see all private, protected, and public properties of such values, you can use the `raw()` method.

```php
$eloquentModel = User::create(['email' => 'john@example.com']);

ray(new Carbon, $eloquentModel)); // will be formatted nicely

ray()->raw(new Carbon, $eloquentModel) // no custom formatting, all properties will be shown in Ray.
```

## Creating a new screen

You can use `newScreen` (or `clearScreen`) to programmatically create a new screen.

```php
ray()->newScreen();
```

You can see values that were previously displayed, by clicking the little back button in the header of Ray.

Optionally, you can give a screen a name:

```php
ray()->newScreen('My debug screen');
```

![screenshot](/screenshots/newScreen.png)

You could opt to use `newScreen` very early on in a request so you'll only see items that were sent to Ray in the
current request. In a Laravel app, a good place for this might be the service provider.

When using PHPUnit to run tests, you might use `newScreen` to get a new screen each time your run a test to debug some
code.

### Clearing everything including history

To clear the current screen and all previous screens, call `clearAll`.

```php
ray()->clearAll();
```

## Showing and hiding the app

You can show and hide the Ray app via code.

```php
ray()->showApp(); // Ray will be brought to the foreground
ray()->hideApp(); // Ray will be hidden
```

## Enabling & disabling Ray

You can enable and disable sending stuff to Ray with the `enable` and `disable` functions.

```php
ray('one'); // will be displayed in ray

ray()->disable();

ray('two'); // won't be displayed in ray

ray()->enable();

ray('three'); // will be displayed in ray
```

You can check if Ray is enabled or disabled with the `enabled` and `disabled` functions.

```php
ray()->disable();

ray()->enabled(); // false
ray()->disabled(); // true

ray()->enable();

ray()->enabled(); // true
ray()->disabled(); // false
```

## Displaying a notification

You can use Ray to display a notification.

```php
ray()->notify('This is my notification');
```

![screenshot](/screenshots/notification.jpg)

## Shooting confetti

For those times that success is to be celebrated.

```php
ray()->confetti();
```

![screenshot](/screenshots/confetti.png)
