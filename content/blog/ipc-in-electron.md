---
title: 'IPC in Electron'
date: '2024-11-14T00:00:00.000000Z'
updated_at: '2024-11-14T08:47:17.000000Z'
published: true
summary: 'In Ray 3.0, we updated how the renderer and main processes communicate within our Electron app. While we’re still using the familiar React and Electron stack, we switched to a more dynamic, event-driven approach for IPC. This change simplifies communication, better integrates with React’s lifecycle, and adds security by whitelisting events. By drawing from existing community solutions, we’ve made our IPC system more efficient and easier to maintain.'
authors:
  -
    name: Sébastien
    avatar: /media/blog/authors/782b3209d5b842978c75849154e81010.png
header_image: null
og_image: null
tags: {}
---
As you may know, Ray is built with React and Electron, a stack we're really happy with! For version 3.0, we’re sticking with this stack, but we’ve completely overhauled how the renderer process and main process communicate within our Electron app. Consider this the so called 'bridge' between the two processes.

If you've ever built an Electron app, you've probably found yourself scouring the [Inter-Process Communication](https://www.electronjs.org/docs/latest/tutorial/ipc) documentation. But don’t worry, this isn’t just a copy-paste from the docs though, believe us, that would have saved some time here.

Instead, this post dives into how we specifically implemented IPC for Ray 3.0. While this approach isn’t necessarily the way, it's a way that works for our team and makes the complex feel simple. Or at least, that's what we try to do here.

## What is IPC?
Let’s quickly cover Inter-Process Communication (IPC) for anyone who might need a refresher.

In an Electron app, IPC is what allows the **main process** and the **renderer process** to talk to each other. These two processes are separate, and they each have different roles: the main process controls the application itself (handling things like file access, menus, and creating windows), while the renderer process is responsible for rendering the app’s user interface, typically using HTML, CSS, and JavaScript. In our case, that's where the React part comes in!

But since they’re isolated from each other, they can’t share information directly, this is where IPC comes in to save the day! Electron’s IPC system enables these processes to send messages back and forth, making it possible for the renderer process to ask the main process to do things (like open a file or read from the filesystem) and vice versa.

IPC works through Electron’s `ipcMain` and `ipcRenderer` modules, which act like a messaging bridge. When the renderer process needs data or wants to trigger an action in the main process, it can send a message to `ipcMain`. And when the main process has something to tell the renderer—like notifying it of new data—it can send messages to `ipcRenderer`.

**In short, IPC is the bridge that lets the main and renderer processes stay connected, each doing their job to keep the app responsive and functional.**

## Ray's implementation
Following the Electron docs, we’ve implemented our IPC setup in the **preload file**. The preload script runs in a secure, isolated context, giving us a safe way to expose only the necessary API methods to the renderer process while keeping sensitive operations in the main process.

Our first implementation of the bridge was quite static:

```typescript
contextBridge.exposeInMainWorld('electron', {  
    openSettingsWindow: function(tab) {  
        ipcRenderer.send('open-settings-window', tab);  
    },  
    openExternalBrowser: function(url) {  
        ipcRenderer.send('open-external-browser', url);  
    },  
    getAppVersion: function() {  
        return ipcRenderer.invoke('get-app-version');  
    },  
    renderLogs: function(logs) {  
        return ipcRenderer.on('render-logs', logs);  
    },  
});
```

The code above shows a small part of our initial setup. Over time, however, the preload file grew as we repeatedly had to add new functions, communication methods, and unique event names. It quickly became cumbersome and felt like we were duplicating similar functions with only minor variations. Worse, it was hard to tell from the function names alone whether communication was going from the main process to the renderer or vice versa.

While researching secure practices for Electron apps, I came across this [GitHub Issue log](https://github.com/reZach/secure-electron-template/issues/43), where developers were discussing how to remove listeners from the `ipcRenderer` channel. In one comment, a developer shared [their own Electron bridge implementation](https://github.com/reZach/secure-electron-template/issues/43#issuecomment-772303787) that was dynamic, simple, and clear. It was exactly what we needed!

In other words, we “took inspiration” (that’s the nice way of saying copy-paste) from their implementation, then adapted it to suit our needs. The result? A dynamic, streamlined bridge that made our IPC setup far easier to manage!

This is the final implementation of the bridge:

```typescript
contextBridge.exposeInMainWorld('electron', {  
    invoke: async function (channel, data = null) {  
        if (Object.values(twoWayEvents).includes(channel)) {  
            return await ipcRenderer.invoke(channel, data);  
        }  
    },  
    send: function (channel, data = null) {  
        if (Object.values(rendererToMainEvents).includes(channel)) {  
            ipcRenderer.send(channel, data);  
        }  
    },  
    receive: function (channel, callback) {  
        if (Object.values(mainToRendererEvents).includes(channel)) {  
            const subscription = (_, ...args) => callback(...args);  
  
            ipcRenderer.on(channel, subscription);  
  
            return () => {  
                ipcRenderer.removeListener(channel, subscription);  
            };  
        }  
    },  
    receiveOnce: function (channel, callback) {  
        if (Object.values(mainToRendererEvents).includes(channel)) {  
            ipcRenderer.once(channel, (_, ...args) => callback(...args));  
        }  
    },  
    removeAllListeners: function (channel) {  
        if (Object.values(mainToRendererEvents).includes(channel)) {  
            ipcRenderer.removeAllListeners(channel);  
        }  
    },  
});
```

As you can see, this approach creates a much more dynamic way for the two processes to communicate. We no longer have to write separate functions for each event, and the function names alone make it clear how communication flows between processes. You might recognize this pattern as an event emitter, which is essentially the foundation of inter-process communication.

## Using the bridge
There are three main functions widely used throughout Ray's renderer process: `invoke`, `send`, and `receive`. Each is designed to integrate smoothly with React’s lifecycle and includes an extra layer of security, as shown in the Github issue log as well. Events are only sent or received if they belong to a whitelisted array of approved events, if an event isn’t on that list, it simply won’t execute. In the main process, we need something else to communicate with the renderer process through the bridge: some sort of EventEmitter.

### Main process
In the main process, we use Electron's `ipcMain` module to handle communication with the renderer process. The Electron bridge in the preload file is primarily there to enable the renderer to send messages to the main process. For communication in the opposite direction, main to renderer, we created a class called `EventEmitter`. This class leverages the `ipcMain` module to listen for and respond to events.

```typescript
export const EventEmitter = Singleton(  
    class {  
        public on(name, callback) {  
            ipcMain.on(name, callback);  
        }  
  
        public off(name, callback) {  
            ipcMain.removeListener(name, callback);  
        }  
  
        public handle(name, callback) {  
            ipcMain.handle(name, callback);  
        }  
  
        public offHandle(name) {  
            ipcMain.removeHandler(name);  
        }  
  
        public emit(browserWindow, name, params) {  
            browserWindow.emit(name, params);  
        }  
  
        public emitAll(browserWindows, name, params) {  
            browserWindows.forEach(([_, browserWindow]) => {  
                browserWindow.emit(name, params);  
            });  
        }  
    }  
);
```

If the event names are whitelisted, these methods enable the main process to communicate with the renderer process, allowing both sending and receiving of events. You can even specify which window should receive the event!

### Renderer process
In the renderer process, it's pretty straightforward on how to use the methods provided the the electron bridge, but you have to take into account React's life cycle.

The `send` method enables one-way communication from the renderer process to the main process. The main process responds to the event using either `ipcMain.on` or our custom `EventEmitter.on`. It’s the simplest method to use and can be implemented anywhere:

```typescript
// Renderer process
window.electron.send(name, data);
```

```typescript
// Main process
EventEmitter.on(name, function(_, data) {  
    // Do something
});
```

The `invoke` method is similar to `send`, with the key difference being that it supports two-way communication. This means it waits for a response from the main process. When using `invoke`, it must be called inside an `async` method, and it will return the response from the main process. The main process responds to the event using either `ipcMain.handle` or our custom `EventEmitter.handle`.

```typescript
// Renderer process
async function doSomething() {  
    const response = await window.electron.invoke(name, data);

	doSomethingWithResponse(response);
}
```

```typescript
// Main process
EventEmitter.handle(name, function () {  
    return responseFromMain();
});
```

Finally, the `receive` method. This is called within the `useEffect` hook of the React lifecycle. The tricky part is that it also needs to be cleaned up when the React component is destroyed. In the Electron bridge, the `receive` function returns a cleanup function that removes the listener, which corresponds to the destroy function in the `useEffect` hook. It’s essential to always return the `window.electron.receive` method when using it; otherwise, it won’t be properly removed, potentially leading to performance issues.

```typescript
// Renderer process
useEffect(() => {  
    return window.electron.receive(name, function(value) {
	    // do something with value
    });  
}, [dependencies]);
```

```typescript
// Main process
// Send event to all open windows
EventEmitter.emitAll(browserWindows, name, value);
// Send event to one specific window
EventEmitter.emit(browserWindow, name, value);
```

And that’s a wrap! This is how we handle communication between the renderer and main processes in Ray v3.0. As you can see, we didn’t reinvent the wheel—we did some research, discovered a clear and effective method shared by others, and used it as a foundation. From there, we customized it to fit our specific needs and workflow.

By leveraging these techniques, we were able to create a more dynamic, secure, and efficient system for IPC in Ray. Hopefully, this gives you some useful insights into how we approached this challenge, and maybe even inspires your own solutions!

