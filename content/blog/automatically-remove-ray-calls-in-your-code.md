---
title: 'Automatically remove Ray calls from your code'
date: '2024-01-24T00:00:00.000000Z'
updated_at: '2024-04-04T11:33:36.000000Z'
published: true
summary: 'This solves the problem of you forgetting to manually remove ray calls in your code base.'
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
When debugging, we can scatter a bunch of Ray calls throughout our code, and sometimes we forget to remove one or two before committing our code. To keep a clean codebase, this is something we want to avoid.

To help you clean up your debug code, we have now added a mechanism to remove all Ray calls from your code easily. There are two ways of using it:

## Using a simple command

If you are using laravel-ray we added an artisan command you can run:

```bash
php artisan ray:clean
```

And poof... all the `ray` calls in your project are now gone!

We also added a framework-agnostic command for framework agnostic PHP projects:

```bash
./vendor/bin/remove-ray.sh <path>
```

These commands will remove all Ray calls and Ray macro's from your code.

For example:

```php
function users(string $teamUid) 
{
  ray($teamUid);
  
  $users = User::where('team_uid', $uid)->get();
  
  $users->ray();
    
  return $users;
}
```

This will be cleaned up and give the following result:


```php
function users(string $teamUid) 
{
  $users = User::where('team_uid', $uid)->get();
    
  return $users;
}
```

## How this works

Under the hood, we are using [Rector](https://github.com/rectorphp/rector) for this. Rector is a CLI tool that helps you automate the refactoring of your code. Rector has many handy "rules" available and allows you to add your own, which is what we did.

If you are already using Rector, you can add our new Rector rule to your existing Rector config (rector.php):

```php
use Spatie\Ray\Rector\RemoveRayCallRector;

$rectorConfig->rule(RemoveRayCallRector::class);
```

After adding this, all Ray calls will be removed every time you run Rector. To fully automate this, you can run Rector with a pre-commit hook or [add it to your CLI](https://getrector.com/blog/new-setup-ci-command-to-let-rector-work-for-you).
