---
title: 'Our mysterious control components'
date: '2024-10-04T00:00:00.000000Z'
updated_at: '2024-10-07T14:46:10.000000Z'
published: true
summary: 'In this post, we introduce the concept of control components in React, a pattern we often use at Spatie to handle data collection and event responses. We’ll discuss our opinionated approach and share practical examples to illustrate this method.'
authors:
  -
    name: Sébastien
    avatar: /media/blog/authors/782b3209d5b842978c75849154e81010.png
header_image: null
og_image: null
tags: {}
---
Ray version 3.0 is being built from the ground up, with a larger focus on user experience and enhanced performance and maintainability of the application. This also means that we've explored ideas and applied patterns to the way we build the components and interfaces in React. Sidenote: this is a shameless, but fancy way of saying we've refactored some code! Anyway, although they are quite opinionated and tailored to our preferred working style, we want to share them with you!

So drumroll please, or try to imagine a drumroll… In Ray version 3.0, but also in other projects for clients, we like to apply the concept of "**control components**" in React.

## What is this magical pattern?

We all know that the best pattern is the one that works… until someone else tries to maintain it! Therefore, this pattern is not set in stone, and the term might be used elsewhere to describe something completely different. In our case, control components are components that don’t really have an interface—aside from the fact that they are React components, which allows them to benefit from React’s reactivity and lifecycle features. Their main purpose is to **collect data** and respond to changes through events or an API. Afterward, they **distribute** the collected data and ensure it’s available throughout the React application in some form. These components are used at the **top level** of the React application and typically don’t have any children to avoid unnecessary re-renders. In most cases, they are initialized and **used only once**.

## For example

In Ray, we make use of Electron, which operates through two different processes. I’ll keep this brief, as it’s not the main focus of this post: the **main process** runs in a Node.js environment, and its primary purpose is to create and manage application windows, while the **renderer process** is responsible for rendering the web content.

Ray also uses **electron-store**, which ensures that data can persist on your local machine. This electron-store resides inside the main process. However, there are times when we need to access those values in the renderer process, or when we need to trigger an action in the renderer process that affects something in the main process.

This brings us to the challenge of communication between the main and renderer processes. Electron handles this through **inter-process communication** (IPC). But the question is: where do we manage this "communication" within our renderer process? This is where our "**control components**" come into play.

The communication between the processes consists of **listeners** and **emitters**. For example, let’s take a look at our `LicenseControl` component in Ray:

```tsx
export function LicenseControl() {  
    const { getStoreValue } = useStoreValue();  
    const setHasActiveLicense = useSetAtom(setHasActiveLicenseAtom);  
    const setAmountOfLogRequests = useSetAtom(setAmountOfLogRequestsAtom);  
  
    useEffect(() => {  
        getStoreValue<boolean>('license', 'hasActiveLicense').then((result) => {  
            setHasActiveLicense(result);  
        });  
  
        getStoreValue<number>('license', 'amountOfLogRequests').then((result) => {  
            setAmountOfLogRequests(result);  
        });  
    }, []);  
  
    useReceiveEvent('set-has-active-license', (hasActiveLicense: boolean) => setHasActiveLicense(hasActiveLicense));  
    useReceiveEvent<number>('set-amount-of-log-requests', (amountOfLogRequests: number) => setAmountOfLogRequests(amountOfLogRequests));  
  
    return <></>;  
}
```

**Small sidenote for context:** We use **Jotai** as our "store" to access and update values across all components in our application.

Now, let’s dissect this control component:
- It returns a React **Fragment** (or `null`), indicating that it has no user interface.
- It contains a `useEffect` hook that initializes values as soon as the component is mounted and saves them in our Jotai store, making them accessible from any component.
- It listens for events coming from the main process and executes a callback when an event is triggered. This syncs values from the main process to our React stores, ensuring the data can be accessed by any component.

In other words, all this component does is sync values and handle changes between the main process and the renderer process. So why do we call this a "control component"?
- The code is centralized, so it avoids scattering logic across multiple components, establishing a single source of truth.
- Events that originate from various parts of the application and trigger actions elsewhere are consolidated in one place.
- It prevents unnecessary re-renders in underlying components, as it has no children.
- The data collected by this component is distributed throughout the React application and can be accessed universally.

## Other projects

Aside from Ray, we’ve also applied this pattern in other projects, where we’ve created components to handle keyboard or mouse controls. Let’s quickly take a look at the mouse control component:

```tsx
export function MouseControl() {  
    const { setMousePosition } = useMouseContext();  
  
    function handlePointerDown({ clientX, clientY }: MouseEvent) {   
		setMousePosition(clientX, clientY);
    }  
  
    function handlePointerMove({ clientX, clientY }: MouseEvent) {  
        setMousePosition(clientX, clientY);  
    }  
  
    useEffect(() => {  
        window.addEventListener('pointermove', handlePointerMove);  
        window.addEventListener('pointerdown', handlePointerDown);  
  
        return () => {  
            window.removeEventListener('pointermove', handlePointerMove); 
            window.removeEventListener('pointerdown', handlePointerDown); 
        };  
    }, []);  
  
    return <></>;  
}
```

The mouse events are collected in one place. The component react to the events and passes on the data collected to the store. In its turn, it can be accessed by any component in the React application. Each event has one source to distribute the data.

The mouse events are collected in one place. The component reacts to these events and passes the collected data to the store, where it can be accessed by any component in the React application. Each event has a single source responsible for distributing the data.

Another example is when we used a gesture library called [@use-gesture](https://use-gesture.netlify.app/) to enable panning or zooming on a canvas. We separated the `use-gesture` hooks into their own control component. This control component collects gesture data and sends it to a store, making it accessible to any component across the React application. This was a necessary abstraction to ensure the entire interface responds to changes triggered by gestures.

## Conclusion

To summarize what a control component does: it’s a component without an interface that collects data from various sources, responds to events, and distributes the data so it’s accessible throughout the application. While we prefer using a store for this, it can also be done using Context Providers or other methods, depending on your approach.

Keep in mind, this is simply an opinionated concept that we at Spatie like to use in the front-end for these specific use cases. It’s by no means "the right way" to structure your code. Every team or developer finds their own approach to organizing their codebases. After all, every developer knows that "the right way" is just another way of saying "The way I did it last time".

