---
title: Debugging Database Queries
menuTitle: Queries
weight: 4
---

## Showing queries

You can display all queries that are executed by calling `showQueries` (or `queries`).

```php
ray()->showQueries();

// This query will be displayed in Ray.
User::firstWhere('email', 'john@example.com'); 
```

![screenshot](/screenshots/queries.png)

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

![screenshot](/screenshots/counting-queries.png)

## Manually showing a query

You can manually send a query to Ray by calling `ray()` on a query.

```php
User::query()
    ->where('email', 'john@example.com')
    ->ray()
    ->first();
```

![screenshot](/screenshots/showing-query.png)

You can call `ray()` multiple times to see how a query is being built up.

```php
User::query()
        ->where('name', 'John')
        ->ray()
        ->whereDate('email_verified_at', '2024-02-15')
        ->ray()
        ->first();
```

![screenshot](/screenshots/showing-query-2.png)

## Showing duplicate queries

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

## Showing slow queries

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
