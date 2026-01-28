---
title: Using Ray with Laravel
menuTitle: Usage
weight: 1
---

This page covers the Laravel-specific methods available in Ray. [All generic PHP methods](/docs/php/vanilla-php/usage) are also available in Laravel.

## Debugging queries

Sometimes you may want to log something to Ray and get the resulting return value of your closure instead of an instance of `Ray`. You can achieve this by adding a return value type to your closure. See the examples for `showQueries()` and `countQueries()` below.

### Showing queries

You can display all queries that are executed by calling `showQueries` (or `queries`).

```php
ray()->showQueries();

// This query will be displayed in Ray.
User::firstWhere('email', 'john@example.com');
```

![screenshot](/images/screenshots/docs_laravel_query.png)

To stop showing queries, call `stopShowingQueries`.

```php
ray()->showQueries();

// This query will be displayed.
User::firstWhere('email', 'john@example.com');

ray()->stopShowingQueries();

// This query won't be displayed.
User::firstWhere('email', 'jane@example.com');
```

Alternatively, you can pass a callable to `showQueries`. Only the queries performed inside that callable will be displayed in Ray. If you include a return type in the callable, the return value will also be returned.

```php
// This query won't be displayed.
User::all();

ray()->showQueries(function() {
    // This query will be displayed.
    User::all();
});

$users = ray()->showQueries(function (): Illuminate\Support\Collection {
    // This query will be displayed and the collection will be returned.
    return User::all();
});

User::all(); // this query won't be displayed.
```

### Conditional queries

You may want to only show queries if a certain condition is met. You can pass a closure that will receive `QueryExecuted` to `showConditionalQueries`.

```php
// When a binding contains 'joan', the query will be displayed.
ray()->showConditionalQueries(fn (QueryExecuted $query) =>
    Arr::first(
        $query->bindings,
        fn ($binding) => Str::contains($binding, 'joan')
    )
);
```

This is particularly helpful when dealing with many queries during migrations or data manipulation.

Convenience methods are available for select, insert, update, and delete queries.

```php
ray()->showInsertQueries();
// Insert queries will be displayed.
ray()->stopShowingInsertQueries();

// Update queries will be displayed during execution of handleUpdate().
ray()->showUpdateQueries(fn () => $this->handleUpdate());

// Select queries will be displayed.
ray()->showSelectQueries();

// Delete queries will be displayed.
ray()->showDeleteQueries();
```

Additionally, these can be enabled in the config file.

### Counting queries

If you're interested in how many queries a given piece of code executes, and what the runtime of those queries is, you can use `countQueries`. It expects you to pass a closure in which all the executed queries will be counted.

Similar to `showQueries`, you can also add a return type to your closure to return the result of the closure.

```php
ray()->countQueries(function() {
    User::all();
    User::all();
    User::all();
});

$user = ray()->countQueries(function (): User {
    return User::where('condition', true)->first();
});
```

![screenshot](/images/screenshots/docs_laravel_count_query.png)

### Manually showing a query

You can manually send a query to Ray by calling `ray()` on a query.

```php
User::query()
    ->where('email', 'john@example.com')
    ->ray()
    ->first();
```

![screenshot](/images/screenshots/docs_laravel_query_manual.png)

You can call `ray()` multiple times to see how a query is being built up.

```php
User::query()
        ->where('name', 'John')
        ->ray()
        ->whereDate('email_verified_at', '2024-02-15')
        ->ray()
        ->first();
```

![screenshot](/images/screenshots/docs_laravel_query_manual_multiple.png)

### Showing duplicate queries

You can display all duplicate queries by calling `showDuplicateQueries`.

```php
ray()->showDuplicateQueries();

// This query won't be displayed in Ray.
User::firstWhere('email', 'john@example.com');

// This query will be displayed in Ray.
User::firstWhere('email', 'john@example.com');
```

To stop showing duplicate queries, call `stopShowingDuplicateQueries`.

Alternatively, you can pass a callable to `showDuplicateQueries`. Only the duplicate queries performed inside that callable will be displayed in Ray.

```php
User::all();

// This query won't be displayed.
User::all();

ray()->showDuplicateQueries(function() {
    User::where('id', 1)->get('id');

    // This query will be displayed.
    User::where('id', 1)->get('id');
});

User::all();

// This query won't be displayed.
User::all();
```

### Showing slow queries

You can display all queries that took longer than a specified number of milliseconds to execute by calling `showSlowQueries`.

```php
ray()->showSlowQueries(100);

// This query will only be displayed in Ray if it takes longer than 100ms to execute.
User::firstWhere('email', 'john@example.com');
```

Alternatively, you can also pass a callable to `showSlowQueries`. Only the slow queries performed inside that callable will be displayed in Ray.

```php
User::all();

// This query won't be displayed.
User::all();

ray()->showSlowQueries(100, function() {
    // This query will be displayed if it takes longer than 100ms.
    User::where('id', 1)->get('id');
});
```

You can also use the shorthand method, `slowQueries()` which is the equivalent of calling `showSlowQueries`:

```php
ray()->slowQueries();
```

To stop showing slow queries, call `stopShowingSlowQueries`.

## Debugging events & jobs

### Showing events

You can display all events that are executed by calling `showEvents` (or `events`).

```php
ray()->showEvents();

event(new TestEvent());

event(new TestEventWithParameter('my argument'));
```

![screenshot](/images/screenshots/docs_laravel_events.png)

To stop showing events, call `stopShowingEvents`.

```php
ray()->showEvents();

event(new MyEvent()); // this event will be displayed

ray()->stopShowingEvents();

event(new MyOtherEvent()); // this event won't be displayed.
```

Alternatively, you can pass a callable to `showEvents`. Only the events fired inside that callable will be displayed in Ray.

```php
event(new MyEvent()); // this event won't be displayed.

ray()->showEvents(function() {
    event(new MyEvent()); // this event will be displayed.
});

event(new MyEvent()); // this event won't be displayed.
```

### Showing jobs

You can display all jobs that are executed by calling `showJobs` (or `jobs`).

```php
ray()->showJobs();

dispatch(new TestJob('my-test-job'));

```

![screenshot](/images/screenshots/docs_laravel_jobs.png)

To stop showing jobs, call `stopShowingJobs`.

```php
ray()->showJobs();

dispatch(new TestJob()); // this job will be displayed

ray()->stopShowingJobs();

dispatch(new MyTestOtherJob()); // this job won't be displayed.
```

Alternatively, you can pass a callable to `showJobs`. Only the jobs dispatch inside that callable will be displayed in Ray.

```php
event(new TestJob()); // this job won't be displayed.

ray()->showJobs(function() {
    dispatch(new TestJob()); // this job will be displayed.
});

event(new TestJob()); // this job won't be displayed.
```

### Showing cache events

You can display all cache events using `showCache`.

```php
ray()->showCache();

Cache::put('my-key', ['a' => 1]);

Cache::get('my-key');

Cache::get('another-key');
```

![screenshot](/images/screenshots/docs_laravel_cache.png)

To stop showing cache events, call `stopShowingCache`.

## Working with models

### Handling models

Using the `model` function, you can display the attributes and relations of a model.

```php
ray()->model($user);
```

![screenshot](/images/screenshots/docs_laravel_models.png)

The `model` function can also accept multiple models and even collections.

```php
// all of these models will be displayed in Ray
ray()->model($user, $anotherUser, $yetAnotherUser);

// all models in the collection will be display
ray()->model(User::all());

// all models in all collections will be displayed
ray()->model(User::all(), OtherModel::all());
```

Alternatively, you can use `models()` which is an alias for `model()`.

### Displaying collections
Ray automatically registers a 'ray' collection macro, making it easy to send collections to Ray.


```php
collect(['a', 'b', 'c'])
    ->ray('original collection') // displays the original collection
    ->map(fn(string $letter) => strtoupper($letter))
    ->ray('uppercased collection'); // displays the modified collection
```

![screenshot](/images/screenshots/docs_laravel_collections.png)

### Displaying context

Laravel 11 introduced [the ability to set context](https://laravel.com/docs/11.x/context).

You can display all context using Ray's `context` method.

```php
ray()->context(); // displays all context

ray()->context('key', 'key2'); // displays only the given keys
```

![screenshot](/images/screenshots/docs_laravel_context.png)

Context can also be invisible. You can display those values using the `hiddenContext` method.

```php
ray()->hiddenContext(); // displays all hidden context

ray()->hiddenContext('key', 'key2'); // displays only the given hidden keys
```

![screenshot](/images/screenshots/docs_laravel_context_hidden.png)

## Rendering & views

### Showing which views are rendered

You can display all views that are rendered by calling `showViews`.

```php
ray()->showViews();

// typically you'll do this in a controller
view('welcome', ['name' => 'John Doe'])->render();
```

![screenshot](/images/screenshots/docs_laravel_views.png)

To stop showing views, call `stopShowingViews`.

### Using Ray in Blade views

You can use the `@ray` directive to easily send variables to Ray from inside a Blade view. You can pass as many things as you'd like.

```blade
@ray($variable, $anotherVariables)
```

You can use the `@xray` directive to show all variables available in your Blade file.

You can use the `@measure` directive as a shortcut for the `ray()->measure()` method to measure the time and memory it takes to render content in your view.

```blade
@measure
@php(sleep(4))
@measure
```

This will result in the following output:

![screenshot](/images/screenshots/docs_php_measure.png)

### Displaying mailables

Mails that are sent to the log mailer are automatically shown in Ray, you can also display the rendered version of a specific mailable in Ray by passing a mailable to the `mailable` function.

```php
ray()->mailable(new TestMailable());
```

![screenshot](/images/screenshots/docs_laravel_mailable.png)

### Displaying markdown

View the rendered version of a markdown string in Ray by calling the `markdown` function.

```php
ray()->markdown('# Hello World');
```

![screenshot](/images/screenshots/docs_laravel_markdown.png)

### Usage with a Stringable

Ray will automatically register a `ray` macro to `Stringable` to easily send `Stringable`s to Ray.

```php
Str::of('Lorem')
   ->append(' Ipsum')
   ->ray()
   ->append(' Dolor Sit Amen')
   ->ray();
```

![screenshot](/images/screenshots/docs_laravel_stringable.png)

### Displaying environment variables

You can use the `env()` method to display all environment variables as loaded from your `.env` file. You may optionally pass an array of variable names to exclusively display.

```php
ray()->env();

ray()->env(['APP_NAME', 'DB_DATABASE', 'DB_HOSTNAME', 'DB_PORT']);
```

## HTTP & testing

### Showing HTTP client requests

You can display all HTTP client requests and responses using `showHttpClientRequests`.

```php
ray()->showHttpClientRequests();

Http::get('https://example.com/api/users');
```

![screenshot](/images/screenshots/docs_laravel_requests.png)

To stop showing HTTP client events, call `stopShowingHttpClientRequests`.

Alternatively, you can pass a callable to `showHttpClientRequests`. Only the HTTP requests made inside that callable will be displayed in Ray.

```php
Http::get('https://example.com'); // this request won't be displayed.

ray()->showHttpClientRequests(function() {
    Http::get('https://example.com'); // this request will be displayed.
});

Http::get('https://example.com'); // this request won't be displayed.
```

### Using Ray with test responses

When testing responses, you can send a `TestResponse` to Ray using the `ray()` method. The method is chainable, so you can chain on any of Laravel's assertion methods.

> To enable this behavior, enable the `send_requests_to_ray` option in [the config file](/docs/php/laravel/configuration).

```php
// somewhere in your app
Route::get('api/my-endpoint', function () {
    return response()->json(['a' => 1]);
});

// somewhere in a test
/** test */
public function my_endpoint_works_correctly()
{
    $this
        ->get('api/my-endpoint')
        ->ray()
        ->assertSuccessful();
}
```

<!-- ![screenshot](/screenshots/response.png) -->
