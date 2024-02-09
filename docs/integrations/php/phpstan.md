---
title: Configure PHPStan
weight: 9
---

# Configure PHPStan to detect ray calls

Ray allows you to specify a custom PHPStan rule that lets you detect remaining ray calls in your application.

```
rules:
    - Spatie\Ray\PHPStan\RemainingRayCallRule
```

All remaining ray calls would then be reported by [phpstan](https://phpstan.org)

![screenshot](/docs/ray/v1/images/phpstan-failing-result.jpg)
