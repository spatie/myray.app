---
title: Installing Ray for JavaScript
menuTitle: Installation
weight: 1
---

JavaScript is one of the world's most popular programming languages, running in browsers and on servers via Node.js. Use Ray to debug any JavaScript or TypeScript project.

> Using React, Vue, or Alpine? Install the [dedicated integration](/docs/getting-started/integrations) for framework-specific features. The methods documented here apply to all JavaScript integrations.

<x-docs.github-repo repo="permafrost-dev/node-ray" />

## Installing the package

Install with npm:

```bash
npm install node-ray
```

Or with bun:

```bash
bun add node-ray
```

## Available environments

This integration works in Node.js, web-based JavaScript/TypeScript projects, and browser environments.

### Node.js

When using in a Node.js environment (the default), import the package as you would normally:

```js
// ES module import:
import { ray } from 'node-ray';

// CommonJS import:
const { ray } = require('node-ray');
```

When using NodeJS, you must call `await Ray.initSettings()` to initialize the settings before using `ray()`. This is not necessary when using the browser bundle.

```js
import { Ray, ray } from 'node-ray';

await Ray.initSettings();

ray('Hello from Node!');
```

### Browser bundle

When bundling scripts for use in a browser environment (using webpack or vite), import the `/web` export:

```js
import { ray } from 'node-ray/web';

// or CommonJS:
const { ray } = require('node-ray/web');
```

### Browser standalone

For direct use in a web page via a script tag, use one of the standalone versions. The full version includes all required libraries, including axios:

```html
<script src="https://cdn.jsdelivr.net/npm/node-ray@latest/dist/standalone.min.js"></script>
```

Or use the slim version if you already have axios included in your project:

```html
<script src="https://cdn.jsdelivr.net/npm/node-ray@latest/dist/standalone-slim.min.js"></script>
```

After including the script, `window.ray()` is automatically available:

```html
<script src="https://cdn.jsdelivr.net/npm/node-ray@latest/dist/standalone.min.js"></script>
<script>
    ray('Hello from the browser!');
</script>
```

### Laravel Mix

To use `node-ray` with Laravel Mix, include the following in `resources/js/bootstrap.js`:

```js
const { ray } = require('node-ray/web');

window.ray = ray;
```

Compile the bundle (`npm run dev`) as usual. After including `js/app.js` in your view, you can access `ray()` within your scripts.

### Laravel + Vite

To use `node-ray` with Laravel + Vite, include the following in `resources/js/bootstrap.js`:

```js
import { ray } from 'node-ray/web';

window.ray = ray;
```

`ray()` is immediately available to other scripts such as `app.js`. Note that `window.ray()` is NOT immediately available in `<script>` tags embedded in the view.

> ## What's next?
> Now that Ray is running in your JavaScript project, explore what else it can do!
> * [Learn how to use Ray with JavaScript](/docs/javascript/vanilla-javascript/usage)
> * [View all available methods](/docs/javascript/vanilla-javascript/reference)
> * [Add a config file to your project](/docs/javascript/vanilla-javascript/configuration)
