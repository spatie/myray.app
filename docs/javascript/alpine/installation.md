---
title: Installing Ray for Alpine.js
menuTitle: Installation
weight: 1
---

[Alpine.js](https://alpinejs.dev/) is a lightweight JavaScript framework for composing behavior directly in your markup. Use Ray to help you debug when developing Alpine.js applications and components.

<x-docs.github-repo repo="permafrost-dev/alpinejs-ray" />

## Installation via CDN

The preferred way to use this package is to load it via a CDN. You'll need to load the `axios` library as well.

For Alpine version 2:

```html
<script src="https://cdn.jsdelivr.net/npm/axios@latest/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs-ray@2/dist/standalone.min.js"></script>

<!-- load alpine.js here -->
```

For Alpine version 3:

```html
<script src="https://cdn.jsdelivr.net/npm/axios@latest/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs-ray@2/dist/standalone.min.js"></script>
```

You can also configure aspects of Alpine by creating a config object before loading the Alpine Ray library:

```html
<script>
    window.alpineRayConfig = {
        logComponentsInit: true,
        logErrors: true,
        logEvents: ['abc'],
    };
</script>

<!-- load axios and alpinejs-ray -->
```

## Installation with package manager

```bash
npm install alpinejs-ray
```

```bash
yarn add alpinejs-ray
```

## Importing the plugin

If installed with a package manager, import the package along with `alpinejs` and `axios`:

```js
import Alpine from 'alpinejs';
import AlpineRayPlugin from 'alpinejs-ray';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine;

Alpine.plugin(AlpineRayPlugin);
Alpine.start();
```

Once installed, you can use `$ray()` within your Alpine components:

```html
<div x-data="{ count: 0 }">
    <button @click="count++; $ray(count)">
        Increment
    </button>
</div>
```

## Usage

All [JavaScript methods](/docs/javascript/vanilla-javascript/usage) are available when using Alpine.js.

> ## What's next?
> Now that Ray is installed in your Alpine.js project, see what you can use it for.
> * [Learn how to use Ray with JavaScript](/docs/javascript/vanilla-javascript/usage)
> * [View all available methods](/docs/javascript/vanilla-javascript/reference)
