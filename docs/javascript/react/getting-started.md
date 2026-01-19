---
title: Using Ray with React
weight: 1
---

[React](https://react.dev/) is a JavaScript library for building user interfaces. Use Ray to help you debug when developing React applications and components.

<x-docs.github-repo repo="permafrost-dev/react-ray" />

## Installing the package

```bash
npm install react-ray
```

```bash
yarn add react-ray
```

## Using the hooks

This integration supports React 16+ and provides two hooks:

### useRay

Send data to the Ray app whenever it updates.

```js
import { useRay } from 'react-ray';

function MyComponent() {
    const [count, setCount] = useState(0);

    useRay(count);

    return (
        <button onClick={() => setCount(count + 1)}>
            Count: {count}
        </button>
    );
}
```

### useRayWithElement

Send the contents of an element ref to the Ray app, optionally updating the item in place when its dependencies change.

```js
import { useRef } from 'react';
import { useRayWithElement } from 'react-ray';

function MyComponent() {
    const elementRef = useRef(null);

    useRayWithElement(elementRef, []);

    return (
        <div ref={elementRef}>
            Content to send to Ray
        </div>
    );
}
```

## Usage

All [JavaScript methods](/docs/javascript/vanilla-javascript/usage) are available when using React.

> ## What's next?
> Now that Ray is installed in your React project, see what you can use it for.
> * [Learn how to use Ray with JavaScript](/docs/javascript/vanilla-javascript/usage)
> * [View all available methods](/docs/javascript/vanilla-javascript/reference)
