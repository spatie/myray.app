---
title: Using Ray With Rust
weight: 1
---

You can use Ray with Rust via this third party package:

[bnomei/ray-dbg](https://github.com/bnomei/ray-dbg)

Add the dependency to your `Cargo.toml`:

```toml
[dependencies]
ray-dbg = "0.1"
```

Or install it via cargo:

```bash
cargo add ray-dbg
```

The package implements most of the PHP Ray features and adds a convenient `ray_dbg!` macro for debugging. It also supports integration with the `tracing` crate.

```rust
use ray_dbg::ray_dbg;

fn main() {
    ray_dbg!("Hello from Rust!");
}
```

Repository: [bnomei/ray-dbg](https://github.com/bnomei/ray-dbg)

Crates.io: [ray-dbg](https://crates.io/crates/ray-dbg)
