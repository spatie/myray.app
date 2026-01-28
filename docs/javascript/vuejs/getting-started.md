---
title: Using Ray with Vue.js
weight: 1
---

[Vue.js](https://vuejs.org/) is a progressive JavaScript framework for building user interfaces. Use Ray to help you debug when developing Vue.js applications and components.

<x-docs.github-repo repo="permafrost-dev/vue-ray" />

## Installing the package

```bash
npm install vue-ray
```

```bash
yarn add vue-ray
```

## Installing the plugin

### Vue 3

```js
import { createApp } from 'vue';
import App from './App.vue';
import RayPlugin from 'vue-ray';

const app = createApp(App);

app.use(RayPlugin);

app.mount('#app');
```

### Vue 2

```js
import Vue from 'vue';
import RayPlugin from 'vue-ray';

Vue.use(RayPlugin);
```

Once the plugin is installed, you can access the helper function as `this.$ray()` from within your Vue components.

```vue
<script>
export default {
    methods: {
        sendToRay() {
            this.$ray('Hello from Vue!');
        }
    }
}
</script>
```

## Usage

All [JavaScript methods](/docs/javascript/vanilla-javascript/usage) are available when using Vue.js.

> ## What's next?
> Now that Ray is installed in your Vue.js project, see what you can use it for.
> * [Learn how to use Ray with JavaScript](/docs/javascript/vanilla-javascript/usage)
> * [View all available methods](/docs/javascript/vanilla-javascript/reference)
