---
title: Detecting & removing Ray calls
menuTitle: Detecting Ray calls
weight: 8
---

To avoid shipping your code with `ray()` calls in it, you can use various tools to detect and remove them from your codebase.

## Detecting Ray calls

### Using PHPStan

Ray provides a custom PHPStan rule that lets you detect remaining Ray calls in your application.

```
rules:
    - Spatie\Ray\PHPStan\RemainingRayCallRule
```

All remaining Ray calls would then be reported by [PHPStan](https://phpstan.org).

![screenshot](/images/screenshots/phpstan-failing-result.jpg)

### Using X-Ray

Ray provides a first-party package named [x-ray](https://github.com/spatie/x-ray), allowing you to detect remaining Ray calls in your application. This package does **NOT** remove the calls, it simply displays their locations so they can be removed manually.

The exit code of the x-ray command is zero if no Ray calls are found, and non-zero if calls are found. This allows the package to be used in an automated environment such as Github Workflows.

#### Installation

Install the package in your PHP or Laravel project:

```bash
composer require spatie/x-ray --dev
```

#### Usage

Specify one or more valid path names and/or filenames to scan:

```bash
./vendor/bin/x-ray ./app/Actions/MyAction.php ./app/Models/*.php ./tests --snippets
```

Display a summary table of the located calls within `./src` and `./tests` while also ignoring some files:

```bash
./vendor/bin/x-ray \
  --summary \
  --ignore src/MyClass.php \
  --ignore 'test/fixtures/*.php' \
  ./src ./tests
```

Display each filename & pass/fail status, along with compact results:

```bash
./vendor/bin/x-ray ./app --compact --verbose
```

#### Available options

| Flag | Description
|---|---|
|`--compact` or `-c` | Minimal output.  Display each result on a single line. |
|`--github` or `-g` | GitHub Annotation output.  Use `error` command to create annotation. Useful when you are running x-ray within GitHub Actions. |
|`--ignore` or `-i` | Ignore a file or path, can be specified multiple times. Accepts glob patterns. |
|`--no-progress` or `-P` | Don't display the progress bar while scanning files |
|`--snippets` or `-S` | Display code snippets from located calls |
|`--summary` or `-s` | Display a summary of the files/calls discovered |
|`--verbose` or `-v` | Display each filename and pass/fail status while scanning. Implies `--no-progress`. |

Find examples for how to add x-ray to your Github workflows at [spatie/x-ray](https://github.com/spatie/x-ray).

## Removing Ray calls

### Using Rector

If you are already using [Rector](https://getrector.com/) this can be done by adding a rule to your `rector.php` config file:

```php
use Spatie\Ray\Rector\RemoveRayCallRector;

$rectorConfig->rule(RemoveRayCallRector::class);
```

### Using the remove script

If you are not using Rector you can use the script provided by the package:

```bash
./vendor/bin/remove-ray.sh <path>
```
