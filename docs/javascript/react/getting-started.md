---
title: Using Ray with React
weight: 1
---

The third-party React package for Ray, `react-ray`, uses the [package for NodeJS](/docs/javascript/nodejs) for most core functionality.

`react-ray` supports React 16+ and provides two hooks:

- `useRay` - send data to the Ray app whenever it updates.
- `useRayWithElement` - send the contents of an element ref to the Ray app, optionally updating the item in place when its dependencies change.
