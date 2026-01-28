---
title: Using Ray With Rust
weight: 1
---

[Rust](https://www.rust-lang.org/) is a systems programming language focused on safety, speed, and concurrency. Use Ray to help you debug your Rust applications. This is a third-party package with community support only.

<x-docs.github-repo repo="bnomei/ray-dbg" />

Crates.io: [ray-dbg](https://crates.io/crates/ray-dbg)

## Installing the package

Add the dependency to your `Cargo.toml`:

```toml
[dependencies]
ray-dbg = "0.1"
```

Or install it via cargo:

```bash
cargo add ray-dbg
```

## Usage

The package implements most of the PHP Ray features and adds a convenient `ray_dbg!` macro for debugging. It also supports integration with the `tracing` crate.

```rust
use ray_dbg::ray_dbg;

fn main() {
    ray_dbg!("Hello from Rust!");
}
```
