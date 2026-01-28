---
title: Using Ray With Go
weight: 1
---

[Go](https://go.dev/) is a statically typed, compiled language designed for simplicity and efficiency. Use Ray to help you debug your Go applications. This is a third-party package with community support only.

<x-docs.github-repo repo="octoper/go-ray" />

## Installing the package

When using Go Modules, you do not need to install anything to start using Ray with your Go program. Import the module and Go will automatically download the latest version when you next build your program.

```go
import (
    "github.com/octoper/go-ray"
)
```

With or without Go Modules, to use the latest version of the SDK, run:

```bash
go get github.com/octoper/go-ray
```

Consult the [Go documentation on Modules](https://github.com/golang/go/wiki/Modules#how-to-upgrade-and-downgrade-dependencies) for more information on how to manage dependencies.
