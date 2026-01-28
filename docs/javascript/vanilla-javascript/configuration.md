---
title: Configuration
weight: 2
---

## NodeJS configuration

When using `node-ray` in a NodeJS environment, it will search for a `ray.config.js` file in your project's root directory.

Using a configuration file is optional. The package will use default settings if no configuration file is specified.

```js
// ray.config.js

module.exports = {
    enable: true,
    host: 'localhost',
    port: 23517,
    scheme: 'http', // only change this if you know what you're doing!

    // calls to console.log() are redirected to Ray
    intercept_console_log: true,

    // determine the enabled state using the specified callback
    // the 'enable' setting is also considered when using this setting
    enabled_callback: () => {
        return functionThatReturnsABoolean();
    },

    sending_payload_callback: (rayInstance, payloads) => {
        if (payloads[0].getType() === 'custom') {
            payloads[0].html += ' <strong>- modified!</strong>';
        }
    },

    sent_payload_callback: (rayInstance) => {
        // automatically make all payloads sent to Ray green
        rayInstance.green();
    },
};
```

### Environment variables

When running `node-ray` within a NodeJS environment, you can set the environment variable `NODE_ENV` to `production` or `staging` to disable sending data to Ray.

## Browser configuration

In a browser environment (when using webpack, vite, or similar bundlers), configure `node-ray` by importing the `Ray` class and calling `useDefaultSettings()`:

```js
import { Ray, ray } from 'node-ray/web';

// set several settings at once:
Ray.useDefaultSettings({
    host: '192.168.1.20',
    port: 23517,
});

// or set individual settings only:
Ray.useDefaultSettings({ port: 23517 });

// use ray() normally:
ray().html('<strong>hello world</strong>');
```

These settings persist across calls to `ray()`, so they only need to be defined once.

## Enabled state callback

If providing a callback for the `enabled_callback` setting (a function that returns a boolean), payloads will only be sent to Ray if:

- the `enable` setting is set to `true`
- the callback returns a value of `true`

If either condition is `false`, then no payloads will be sent to Ray.

Set the `enabled_callback` setting to `null` or leave it `undefined` to only consider the `enable` setting (the default).

## Sending/sent payload callbacks

Specify the `sending_payload_callback` or `sent_payload_callback` settings to trigger a callback before (sending) or after (sent) sending a payload.

This feature is helpful when sending additional payloads or modifying all payloads (e.g., changing the color).
