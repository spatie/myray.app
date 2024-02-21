---
title: Configure PHPStan To Detect Ray Calls
menuTitle: Configure PHPStan
weight: 9
---

Ray allows you to specify a custom PHPStan rule that lets you detect remaining Ray calls in your application.

```
rules:
    - Spatie\Ray\PHPStan\RemainingRayCallRule
```

All remaining Ray calls would then be reported by [phpstan](https://phpstan.org)

![screenshot](/screenshots/phpstan-failing-result.jpg)
