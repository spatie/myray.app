---
title: Using Ray with Express.js
weight: 1
---

[Express.js](https://expressjs.com/) is a fast, unopinionated, minimalist web framework for Node.js. Use Ray to help you debug when developing Express.js applications and middleware.

<x-docs.github-repo repo="permafrost-dev/express-ray" />

## Installing the package

```bash
npm install express-ray
```

```bash
yarn add express-ray
```

## Installing the plugin

To install the `express-ray` plugin into your Express.js application, call the `install` method provided by the `plugin` import:

```js
import express from 'express';
import { plugin as expressRayPlugin } from 'express-ray';

const app = express();

expressRayPlugin.install(app);
```

Once installed, you can use `ray()` from anywhere in your Express.js application:

```js
app.get('/', (req, res) => {
    ray('Request received!');
    ray(req.query);

    res.send('Hello World!');
});
```

## Usage

All [JavaScript methods](/docs/javascript/vanilla-javascript/usage) are available when using Express.js.

> ## What's next?
> Now that Ray is installed in your Express.js project, see what you can use it for.
> * [Learn how to use Ray with JavaScript](/docs/javascript/vanilla-javascript/usage)
> * [View all available methods](/docs/javascript/vanilla-javascript/reference)
