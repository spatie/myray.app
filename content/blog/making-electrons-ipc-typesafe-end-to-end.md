---
title: "Making electron's IPC typesafe end-to-end"
date: '2026-02-18T00:00:00.000000Z'
updated_at: '2026-02-18T09:33:52.000000Z'
published: true
summary: ''
authors:
  -
    name: Dries
    avatar: /media/blog/authors/910fb7d3b4ded4d33952ae4e54b48b5b.png
header_image: null
og_image: null
tags:
  - deep-dives
---
## Leveraging TypeScript at its fullest potential

The thing we love most about libraries that are fully typed is type inference, especially through generics. It almost feels like magic. A good example is TanStack’s [React Query](https://tanstack.com/query/latest/docs/framework/react/typescript#type-inference). I always get a warm, fuzzy feeling when my API data types are inferred and ripple through all the callbacks available in the `useQuery` or `useMutation` hooks.

But these features are often achieved through some pretty wild-looking type definitions. That’s something we rarely attempt in our own application code, because let’s be honest, who understands something like this on the first try, let alone comes up with it?

```typescript
export type DotNotationValueOf<
	T extends Record<string, unknown>,
	K extends DotNotationKeyOf<T>,
> = K extends `${infer Head}.${infer Tail}`
	? Head extends keyof T
		? T[Head] extends Record<string, unknown>
			? Tail extends DotNotationKeyOf<T[Head]>
				? DotNotationValueOf<T[Head], Tail>
				: never
			: Required<T>[Head] extends Record<string, unknown>
			  ? Tail extends DotNotationKeyOf<Required<T>[Head]>
			      ? DotNotationValueOf<Required<T>[Head], Tail> | undefined
				  : never
			  : never
		: never
	: K extends keyof T
		? T[K]
		: never;
```

If you’ve been writing TypeScript for a few years and have peeked at some library internals, you might find this readable. But for most TypeScript developers, this looks like pure wizardry.

In this blogpost we want to show you how going the extra mile in Ray has made our code much safer.

## Let's dive in!

What this “monstrosity” above enables is the ability to extract a value from an object using a key in dot notation. For example, suppose I want to create a type for a map of callbacks that uses another object's property values as the type of the callback function's arguments (bear with me, this might sound like a very niche problem). My first naïve implementation might look like this:

```typescript
const myObj = {
	foo: {
	    bar: 'hello',
	    baz: 'world',
	},
	quux: '!',
} as const;

type MyKeys = {
	[K in keyof typeof myObj]: {
		callback(value: (typeof myObj)[K]): void;
	};
};

const callbacksObj: MyKeys = {
	foo: {
	  callback(value) {}, // the value argument is typed as object with string literals "hello" and "world": '{bar: "hello", baz: "world"}'
	},
	quux: {
		callback(value) {}, // the value argument is typed as string literal: '!'
	},
};
```

This works nicely, but there’s one problem: the type of `value` for property `foo` is the object with properties `bar` and `baz`. If your goal is to go one level deep, you’re done. But what if you want a callback only for `foo.bar` but not for `foo.baz`?

That’s where our “monstrosity” (`DotNotationValueOf`) from earlier comes into play:

```typescript
const myObj = {
	foo: {
	    bar: 'hello',
	    baz: 'world',
	},
	quux: '!',
} as const;

type MyKeys = {
	[K in DotNotationKeyOf<typeof myObj>]: {
		callback(value: DotNotationValueOf<(typeof myObj), K>): void;
	};
};  

const obj: MyKeys = {
	'foo.bar': {
		callback(value) {}, // the value argument is typed as string literal: 'hello'
	},
	'quux': {
		callback(value) {}, // the value argument is typed as string literal: '!'
	},
};
```
As you can see, we can now access `foo.bar` and have our callback argument `value` correctly typed as string literal `'hello'`!

## How we used this in our codebase

In Ray, we have an incredibly useful hook that syncs data from our Electron store to the renderer process called `useStoreSync`. A small example:

```typescript
useStoreSync('server', {
	'settings.shouldConfirmCloseConnection': {
		callback: (value) => {
			setShouldConfirmConnectionClose(value);
		},
		defaultValue: false,
	},
	'connections': {
		callback: (connections) => {
			setServerConnections(connections);
		},
		defaultValue: [],
	},
});

// definition
function useStoreSync<N extends ElectronStoreNames>(
	storeName: N,
	storeKeys: StoreKeys<N>,
);
```

As you can see, we rely heavily on generics to make this work, but the underlying code isn’t much more complex than our earlier example. The `StoreKeys` type looks like this:

```typescript  
type StoreKeys<N extends ElectronStoreNames> = {
	[K in DotNotationKeyOf<ElectronStore<N>>]?: {
		callback: (value: DotNotationValueOf<ElectronStore<N>, K>) => void;
		defaultValue: unknown;
	};
};

// Additional types so you understand better what's happening above:
type StoreMapType = {
    archive: ArchiveStoreProps;
    archivev2: ArchiveStoreV2Props;
    license: LicenseStoreProps;
    onboarding: OnboardingStoreProps;
    settings: SettingsStoreProps;
    server: ServerStoreProps;
    windowState: WindowStateStoreProps;
    shortcuts: ShortcutStoreProps;
};
type ElectronStore<N extends ElectronStoreNames> = StoreMapType[N];
```

The `DotNotationValueOf<ElectronStore<N>, K>` part is what allows us to access the keys of our store in a dot notation manner.

At the start of our rewrite, the Electron stores were pretty flat JSON objects, but we quickly ran into the need for “namespacing.” We wanted to organize related keys under logical namespaces within the same store. For example, in our Server store, we wanted a `settings` namespace.

Initially, we prefixed flags with something like `settingShouldConfirmCloseConnection`, but that never felt quite right. We hadn’t yet figured out how to support dot notation in our `useStoreSync` hook, so we ended up with this:

```typescript
export type ServerStoreProps = {
    connections: ServerConnection[];
    settingShouldConfirmCloseConnection: boolean;
};
```

Later, we discovered a neat type definition inside the [electron-store](https://github.com/sindresorhus/electron-store) library that allowed dot notation keys—the `DotNotationKeyOf` type from earlier. We borrowed and adapted it for our use case.

That type was the missing piece we needed to move from prefixed keys to cleanly nested ones:

```typescript
export type ServerStoreProps = {
    connections: ServerConnection[];
    settings: {
        shouldConfirmCloseConnection: boolean;
    };
};
```

Much cleaner!

## Why going the extra mile with your types is worth it

The goal of this blog post is not to show off our cool types, but to make a case that showcases the power of being meticulous, so you might re-evaluate your own types within your own codebase. Slapped an `any` or `unknown` on something because you couldn't be bothered to figure out the types? We've all been there... I could have just called it a day after writing this:

```typescript
[k: string]: {
	callback(value: unknown): void;
	defaultValue: unknown;
}
```

While this works, you lose all your type safety. What happens if `settings.shouldConfirmCloseConnection` is renamed to `settings.shouldConfirmClose`? You’ll likely get a runtime error. Maybe you catch it during development, in your tests or during QA, but maybe you don’t.

Going the extra mile saves you a ton of headaches and makes you sleep soundly at night. Another added benefit is improvements in productivity thanks to IntelliSense: you don’t have to remember property names exactly or their types, your editor will do that for you.

## And a final example: Fully typed RPC handlers

Alongside our `useStoreSync` hook, we also have a simple, fully typed RPC implementation built on top of Electron’s IPC:

```typescript
// @shared/rpc.ts
export type RPCMap = {
    'archive:get-archive-logs-by-id': {
        params: { id: string };
        response: {
            archiveLogs: ArchiveLogs;
        };
    };
};

// Utility types for RPC
export type RPCName = keyof RPCMap;
export type RPCParams<N extends RPCName> = RPCMap[N]['params'];
export type RPCResponse<N extends RPCName> = RPCMap[N]['response'];

/**
 * RPC handler for main process
 *
 * Used in the main process to handle RPC calls.
 *
 * @param name
 * @param handler
 */
export function rpcHandle<N extends RPCName>(
    name: N,
    handler: (params: RPCParams<N>) => Promise<RPCResponse<N>> | RPCResponse<N>
) {
    ipcMain.handle(formatRpcName(name), async (_, params) => handler(params));
}

/**
 * RPC invoke for renderer process
 *
 * Used in the render process to invoke methods on the main side.
 *
 * @param name
 * @param params
 * @returns
 */
export function rpcInvoke<N extends RPCName>(name: N, params: RPCParams<N> = undefined): Promise<RPCResponse<N>> {
    return ipcRenderer.invoke(formatRpcName(name), params);
}

export function formatRpcName<N extends RPCName>(name: N) {
	return `rpc:${name}`;
}
```

First of all, we define a type that is effectively a map of all our events and their respective payloads and responses. This allows us to create 3 utility types `RPCName`, `RPCParams` and `RPCResponse`. We use generics based on the RPC name so we can let the type inference do it's magic later on in our `rpcHandle` and `rpcInvoke` functions.

The `rpcHandle` function is used in our main process. While its definition is fully typed, it contains some “unsafe” code internally because Electron’s `ipcMain.handle` method types the event name as just `string` and its parameters as `any`. However, this isn’t a real concern, since we shield our code from that type "unsafe" Electron code by wrapping it with our own typesafe `rpcHandle`. Same story for our `rpcInvoke`.

### Example usage

In the preload file:

```typescript
// preload.ts
contextBridge.exposeInMainWorld('electron', {
    rpc: {
        invoke: rpcInvoke,
    },
});
```

In the main process:

```typescript
// @main/rpc-handler.ts
rpcHandle('archive:get-archive-logs-by-id', ({ id }) => {
    const result = ArchiveStore.getArchiveLogsById(id);
    return Promise.resolve({ archiveLogs: result });
});
```

In the renderer process:

```typescript
// @renderer/useRpcInvoke.ts
export function useRpcInvoke() {
    return { invoke: window.electron.rpc.invoke };
}

// Example inside a React component
const { invoke } = useRpcInvoke();

const [activeArchiveId, setActiveArchiveId] = useState(1);
const [archiveLogs, setArchiveLogs] = useState<ArchiveLogs>([]);

useEffect(() => {
	invoke('archive:get-archive-logs-by-id', { 
		id: activeArchiveId 
	}).then(({ archiveLogs }) => {
		setArchiveLogs(archiveLogs);
	});
}, [activeArchiveId, invoke]);
```

This setup looks deceptively simple, but it took time to reach this level of elegance. It’s intuitive, maintainable and most importantly, protects us from runtime errors by surfacing issues at compile time.


## Additional concerns

### What about leveraging useSyncExternalStore from React for your useStoreSync hook?

Our `useStoreSync` hooks basically acts like a hand rolled (and suboptimal) `useSyncExternalStore`. We weren't aware of how handy this hook actually is when we first came up with our own implementation.

One of the future improvements on our roadmap is to create a fully typed store sync hook with `useSyncExternalStore` for each individual [electron-store](https://github.com/sindresorhus/electron-store). We would love to have an API like this:

```typescript
const { archives } = useArchiveStore(); // Where archives is inferred as Archive[]!
```

But that's the beauty of programming, you constantly evolve on your ideas because you learn of better ways to do things. Sometimes the best solutions only present themselves after implementing a suboptimal one.

Stay tuned for part 2 when we revisit this system by implementing a new store hook leveraging `useSyncExternalStore`!
