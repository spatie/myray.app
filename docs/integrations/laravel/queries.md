---
title: Queries
weight: 3
---
# Debugging Database Queries

## Showing queries

You can display all queries that are executed by calling `showQueries` (or `queries`).

```php
ray()->showQueries();

User::firstWhere('email', 'john@example.com'); // this query will be displayed in Ray.
```

![screenshot](/docs/ray/v1/images/query.jpg)

To stop showing queries, call `stopShowingQueries`.

```php
ray()->showQueries();

User::firstWhere('email', 'john@example.com'); // this query will be displayed.

ray()->stopShowingQueries();

User::firstWhere('email', 'jane@example.com'); // this query won't be displayed.
```

Alternatively, you can pass a callable to `showQueries`. Only the queries performed inside that callable will be displayed in Ray. If you include a return type in the callable, the return value will also be returned.

```php
User::all(); // this query won't be displayed.

ray()->showQueries(function() {
    User::all(); // this query will be displayed.
});

$users = ray()->showQueries(function (): Illuminate\Support\Collection {
    return User::all(); // this query will be displayed and the collection will be returned.
});

User::all(); // this query won't be displayed.
```

## Counting queries

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

![screenshot](/docs/ray/v1/images/query-count.png)

## Manually showing a query

You can manually send a query to Ray by calling `ray()` on a query.

```php
User::query()
    ->where('email', 'john@example.com')
    ->ray()
    ->first();
```

![screenshot](/docs/ray/v1/images/single-query.png)

You can call `ray()` multiple times to see how a query is being built up.

```php
User::query()
    ->where('first_name', 'John')
    ->ray()
    ->where('last_name', 'Doe')
    ->ray()
    ->first();
```

![screenshot](/docs/ray/v1/images/single-query-multiple-calls.png)

## Showing duplicate queries

You can display all duplicate queries by calling `showDuplicateQueries`.

```php
ray()->showDuplicateQueries();

User::firstWhere('email', 'john@example.com'); // this query won't be displayed in Ray
User::firstWhere('email', 'john@example.com'); // this query will be displayed in Ray.
```

To stop showing duplicate queries, call `stopShowingDuplicateQueries`.

Alternatively, you can pass a callable to `showDuplicateQueries`. Only the duplicate queries performed inside that callable will be displayed in Ray.

```php
User::all();
User::all(); // this query won't be displayed.

ray()->showDuplicateQueries(function() {
    User::where('id', 1)->get('id');
    User::where('id', 1)->get('id'); // this query will be displayed.
});

User::all();
User::all(); // this query won't be displayed.
```

## Showing slow queries

You can display all queries that took longer than a specified number of milliseconds to execute by calling `showSlowQueries`.

```php
ray()->showSlowQueries(100);

// this query will only be displayed in Ray if it takes longer than 100ms to execute.
User::firstWhere('email', 'john@example.com');
```

Alternatively, you can also pass a callable to `showSlowQueries`. Only the slow queries performed inside that callable will be displayed in Ray.

```php
User::all();
User::all(); // this query won't be displayed.

ray()->showSlowQueries(100, function() {
    User::where('id', 1)->get('id'); // this query will be displayed if it takes longer than 100ms.
});
```

You can also use the shorthand method, `slowQueries()`:

```php
ray()->slowQueries(); // equivalent to calling 'showSlowQueries'.
```

To stop showing slow queries, call `stopShowingSlowQueries`.
