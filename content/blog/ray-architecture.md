---
title: "Ray's architecture: how we structure an Electron app"
date: '2024-09-09T00:00:00.000000Z'
updated_at: '2024-09-19T12:31:11.000000Z'
published: true
summary: 'At Laracon US, Freek from Spatie unveiled updates on Ray 3.0, which will feature a complete visual redesign to enhance user experience. The new version aims to improve performance, scalability, and maintainability by revising the codebase and application architecture. The team is rethinking its folder structure for better organization. The goal is to create a more stable and scalable application, with ongoing adjustments as development progresses.'
authors:
  -
    name: Sébastien
    avatar: /media/blog/authors/782b3209d5b842978c75849154e81010.png
header_image: null
og_image: null
tags: {}
---
At this year's Laracon US, Freek took the stage to share some exciting updates from the Spatie team: we are hard at work on Ray 3.0! This new version promises a complete visual overhaul, enhancing both the design and overall user experience.

In addition to making Ray look better, we are focused on improving performance, addressing existing issues and rewriting key parts of the codebase to ensure Ray is more scalable and maintainable in the long run. In other words: our front-end development team is sipping on extra coffee.

A key aspect of enhancing the application's manageability is rethinking its architecture. We'll dive into how we approach this to ensure long-term stability and scalability.

## Technology
To start things off, Ray is build with React and Electron. We chose Electron because it allows us to maintain a single codebase while delivering the application across multiple operating systems. Like any technology, it comes with its own set of challenges and trade-offs, but this gives us a chance to refine areas that need improvement.

## Architecture
For version 3.0 we've decided to re-evaluate the source folder architecture of the application. We want to make it easier to locate resources and better organize tasks and responsibilities. It’s tailored to our team’s needs and reflects our specific preferences and requirements for this project.

The main architecture is divided into 5 source folders, of which we will explore the two most important ones: main and renderer.

![](/media/blog/ray/ray-v3-architecture/ray-main-architecture.png)

But first let's provide some context on what these contain:
* **Main**: This refers to the Electron main process, which serves as the application entry point and runs in Node.js.
* **Renderer**: This represents the Electron renderer process, responsible for rendering the web content.
* **Preload**: This folder includes code that executes before the renderer process starts loading web content. It enhances the renderer by exposing APIs that enable communication between the main and renderer processes.
* **Resources**: This directory holds assets such as icons, images, fonts, as well as certificates and app icons needed for the build process.
* **Shared**: This contains context-agnostic code used by both the main and renderer processes, including types, helpers, utilities, and classes.

## Modules
The modules folder acts as a centralized hub for managing functionalities within a project. It organizes self-contained units of features, with each module encapsulating its own logic, types, components, and classes. In our opinion, its structure promotes separation of concerns, enhances scalability, and facilitates grouping related items together for better organization.

Here is a simple example on how modules are handled in the main process (**license**) and the renderer process (**settings**):

![](/media/blog/ray/ray-v3-architecture/ray-modules-architecture.png)

Each of these "modules" have their own specific responsibilities and tasks. These modules are being combined in pages and communicate with each other through for example, stores.

Outside of the modules folder, there are additional directories such as components, stores, and hooks that house more general items not tied to any specific context. These folders contain shared resources that are used across various modules, ensuring consistency and reusability throughout the application.

The key aspect is that everything related to a module is neatly organized within their respective module. So if a bug pops up in, for example, the settings window, then there’s no need to hit the panic button. We’ve organized the folder structure so our team can navigate it with a calm composure, no need for coffee-fueled frenzies! Although, we still have to test out that last one.

## Structures
The structures folder is where we keep core elements that underpin the application's architecture.
- **Classes**: Core classes that define the fundamental building blocks of our application. These can extend classes from other libraries in order to customize them a bit more towards the needs of the application.
- **Types**: Type definitions that ensure consistency and type safety across the codebase.
- **Factories**: Functions or classes designed to create and manage instances, such as a factory that accepts a class and returns a singleton. These factories streamline object creation and ensure that we maintain control over instance management.

![](/media/blog/ray/ray-v3-architecture/ray-structures-architecture.png)

## Components
Building components can be approached in several ways, but our team prefers a method that divides a component into multiple files, each with a distinct responsibility. 

This approach ensures that a component is divided into manageable parts, allowing each part to handle its specific responsibilities and communicate through React context or by passing props. By clearly naming these different parts, we enhance readability and make the component structure more intuitive for our team.

For illustration, let's consider a Collapse component. Note that not every component is structured this way, as it could be overkill for simpler cases. We aim for readability and consistency. Here's how we can organize a complex and flexible component:

![](/media/blog/ray/ray-v3-architecture/ray-collapse-architecture.png)

* **`index.ts`**: Decide what is being exported to the outside world.
- **`Collapse.tsx`**: The main entry point of the component.
- **`CollapseHeader.tsx`**: A subcomponent responsible for rendering the header section of the collapse component.
- **`CollapseContent.tsx`**: A subcomponent that handles the content area of the collapse component.
- **`Collapse.context.ts`**: This approach enables effective communication between parts of a component, especially in a compositional component setup, if applicable.
- **`Collapse.types.ts`**: Defines the types and interfaces used by the `Collapse` component.
- **`Collapse.cva.ts`**: Contains Tailwind classes for creating variant-based components using the [CVA]([https://cva.style/docs](https://cva.style/docs)) library.

This modular approach helps keep each part of the component organized and focused on its specific role, making the codebase easier to navigate and maintain.

## Stores
Working with React gives us numerous options for state management, but having many choices isn’t always a good thing. It’s like every month there’s a new store library popping up, and choosing one can feel like trying to pick your favorite food. Our decision is based on the specific needs of the project and what we like to work with.

So for Ray, we've decided to go with [Jotai](https://jotai.org/). Since Ray doesn’t require complex state handling, Jotai’s simplicity and easy-to-learn API fit perfectly. We’ve used it in a previous project and appreciated its developer-friendly experience. It also seems to scale well with growing applications. Think of it as using `useState`, but outside of a component.

Jotai doesn't have one way to do things, it is not opinionated and you kind of have to find your own of working with it. If you want to get familiar with it, check out its [documentation](https://jotai.org/).

Here's how we can organize a store, let's consider a logs store containing all the logs that are send to the Ray application:

![](/media/blog/ray/ray-v3-architecture/ray-store-architecture.png)

We structure our stores as follows:
- **`index.ts`**: The entry point of the store, where we export what should be accessible externally.
- **`logs.ts`**: Contains the main state, including read-only and derived atoms.
- **`logs.actions.ts`**: Houses action atoms, which are primarily setters that modify the read-only atoms in the state.
- **`logs.types.ts`** (optional): Defines specific types for the store, if needed.
- **`logs.helpers.ts`** (optional): Includes helper functions for the store, mainly used in actions, if necessary.

## Ray 3.0
As of now, we're working on Ray version 3.0, and all these architectural decisions are made early in the project. Of course, these choices may evolve as the project progresses. We’re continuously evaluating how to implement features to optimize user experience, but our goal is to maintain consistency and build a more readable and manageable codebase.

Fingers crossed everything goes smoothly. We might need a few extra cups of coffee, but rest assured, we’re working hard to get Ray version 3.0 into your hands!
