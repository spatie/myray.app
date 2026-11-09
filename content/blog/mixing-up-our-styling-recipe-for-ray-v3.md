---
title: 'Mixing up our styling recipe for Ray v3'
date: '2024-12-06T00:00:00.000000Z'
updated_at: '2024-12-06T14:46:13.000000Z'
published: true
summary: 'When it comes to styling, Tailwind is almost always our go-to choice, and Ray is no exception. Its utility-first approach provides a solid foundation. But while Tailwind provides a solid foundation, it doesn’t directly answer questions like: How do we handle component variants? How do we override styles cleanly? Or how do we compose styles in a way that remains scalable?'
authors:
  -
    name: Sébastien
    avatar: /media/blog/authors/782b3209d5b842978c75849154e81010.png
header_image: null
og_image: null
tags: {}
---
When it comes to styling, Tailwind is almost always our go-to choice, and Ray is no exception. Its utility-first approach provides a solid foundation with well-structured design tokens, consistent class names, and an enjoyable developer experience. It's like butter in a cake, it’s essential to making our styling come together!

But, like any good cake, it needs some finishing touches to really shine! Simply adding Tailwind doesn’t solve every challenge we face. As Ray grows in complexity, these challenges become more apparent. While Tailwind provides a solid foundation, it doesn’t directly answer questions like: How do we handle component variants? How do we override styles cleanly? Or how do we compose styles in a way that remains scalable?

To tackle these questions, we did what any developer would do: turn to our trusted search engine, Google! After a bit of digging around, we've found a few tools to help us extend and enhance how we use Tailwind in Ray v3. Now, we won’t leave you in suspense for long. Chances are, many teams are already using them, but just in case you haven’t, here’s what we’ve been using to give our 'cake' those finishing touches: [CVA](https://cva.style/docs), [clsx](https://github.com/lukeed/clsx), [tailwind-merge](https://github.com/dcastil/tailwind-merge), and [prettier-plugin-tailwindcss](https://github.com/tailwindlabs/prettier-plugin-tailwindcss).

## [prettier-plugin-tailwindcss](https://github.com/tailwindlabs/prettier-plugin-tailwindcss)

So ... about that cake! Let’s start by getting our layers perfectly aligned. For that, we use **prettier-plugin-tailwindcss**, a handy plugin that automatically sorts classes according to Tailwind's recommended order. If you're interested, Jonathan Reinink and Adam Wathan wrote a great blog post about it a few years ago, [take a look](https://tailwindcss.com/blog/automatic-class-sorting-with-prettier#how-classes-are-sorted)! It's quite simple to integrate, go to your `.prettierrc` file and add it as one of the plugins:

```
{
  "plugins": ["prettier-plugin-tailwindcss"]
}
```

To finish things off, we want the plugin to work with our other tools like **clsx** and **cva** as well. If we want to order the classnames inside strings provided to function calls, we need to define what these functions are. Go to the `options` key in your `.prettierrc` and add them:

```
"tailwindFunctions": [  
    "clsx",  
    "cva"
],
```

## [tailwind-merge](https://github.com/dcastil/tailwind-merge)

Back to our cake, we want to ensure our cake has no clashing flavors. Optionally, but a nice addition, **tailwind-merge** helps resolve conflicts when combining Tailwind CSS classes. For example:

For example, let’s say you want to apply both `bg-blue-500` and `bg-red-500` to the same element. Without **tailwind-merge**, Tailwind would apply both, and the class that comes last in the CSS order would overwrite the other. However, with **tailwind-merge**, conflicting classes are automatically merged, ensuring that only the correct class is applied.

While you don’t need to use this on every class, it can be especially useful when creating one-off components. For instance, if you need a component with a thicker border than usual, **tailwind-merge** ensures that custom classes override the default ones without causing conflicts. The developer behind it has written some clear [documentation](https://github.com/dcastil/tailwind-merge/blob/v2.5.5/docs/when-and-how-to-use-it.md), which I recommend reading before implementing it.

We did encounter a small issue where custom color and font size classes conflicted. When applying a font size class, it would sometimes remove the color. This issue occurred because we customize our color and font size values in the Tailwind configuration. To fix this, we needed to extend **tailwind-merge** with our custom settings. Here's how you can do it:

```typescript
const twMerge = extendTailwindMerge({  
    extend: {  
        classGroups: {  
            'font-size': ['text-10', 'text-11', 'text-12', 'text-14', 'text-16', 'text-20', 'text-24', 'text-36'],  
        },  
    },  
});
```

Because we use numbers to identify our font sizes in our classes, we can alternatively use a regular expression as well:

```typescript
const twMerge = extendTailwindMerge({  
    extend: {  
        classGroups: {  
            'font-size': {  
                text: [(value: string) => Array.isArray(value.match(/^\d+$/))],  
            },  
        },  
    },  
});
```

## [clsx](https://github.com/lukeed/clsx)

You must be thinking "don't start with the cake again!" Well, we don't want to disappoint! So our secret ingredient, making sure every piece of the cake fits perfectly together: **clsx**. A tiny and fast utility for conditionally constructing class name strings. In Ray, we use it everywhere to manage class names that need to change based on certain conditions.

A simple example of conditionally appending classes looks like this: 

```tsx
<div className={clsx('bg-red-500 transition-opacity', !isOpen && 'opacity-0', isOpen && 'opacity-100')}>
</div>
```

For better readability, we often prefer a more object-based approach:

```tsx
<div
	className={clsx('bg-red-500 transition-opacity', {
		'opacity-0': !isOpen,
		'opacity-100': isOpen
	})}
>
</div>
```

When dealing with components that have a lot of Tailwind classes, we like to group them into logical chunks for better organization:

```tsx
<div
	className={clsx(
		'flex items-center justify-between gap-4',
		'bg-red-500 text-white',
		'hover:bg-red-700'
	)}
>
</div>
```

The best part about **clsx** is that it allows you to combine all of these approaches! Whether you’re conditionally appending, using objects, or grouping classes, it makes managing class names on components much simpler and more readable.

## [cva](https://cva.style/docs)

Okay, one more time before finishing our cake story: Just like that perfect layer of frosting, **cva** gives us a readable way to manage component variants in a clean and scalable manner. This is particularly helpful for foundational components like buttons, banners, and others, which often have many variants. We typically don’t use **cva** for larger components, as they tend to have a more fixed structure. However, we’re not ruling it out entirely, edge cases can always arise. As Ray grows in complexity, we’ve realized that handling multiple variants for components can get tricky. Simply relying on **clsx** doesn't always provide the solid, readable structure we need to keep things maintainable.

A very simple example is applying **cva** to our Banner component:

```typescript
const bannerVariants = cva('flex bg-gradient-to-r px-4 py-2', {  
    variants: {  
        variant: {  
            primary: 'from-banner-primary-gradient-start to-banner-primary-gradient-end',  
            secondary: 'from-banner-secondary-gradient-start to-banner-secondary-gradient-end',  
        },
        size: {
	        'md': 'px-4 py-2',
	        'sm': 'px-3 py-1'
        }
    },  
    defaultVariants: {  
        variant: 'primary',   
        size: 'md'
    },  
});
```

Another way we have used **cva** is to group text styles together to create groups of classes that define how a certain type of text should look like. This creates a more consistent way to apply and manage our font styles.

```typescript
export const textVariants = cva('', {  
    variants: {  
        variant: {  
            h1: 'font-sans text-20 font-bold leading-120',  
            h2: 'font-sans text-16 font-semibold leading-120',  
            body: 'font-sans leading-150',  
        },  
        size: {  
            lg: '',  
            default: '',  
            sm: '',  
        },  
        weight: {  
            default: '',  
            medium: '',  
            semibold: '',  
        },  
    },  
    compoundVariants: [  
        {  
            variant: 'body',  
            size: 'lg',  
            className: 'text-16',  
        },  
        {  
            variant: 'body',  
            size: 'default',  
            className: 'text-14',  
        },  
        {  
            variant: 'body',  
            size: 'sm',  
            className: 'text-12',  
        },  
        {  
            variant: 'body',  
            weight: 'default',  
            className: 'font-medium',  
        },  
        {  
            variant: 'body',  
            weight: 'semibold',  
            className: 'font-semibold',  
        },  
    ],  
    defaultVariants: {  
        variant: 'body',  
        size: 'default',  
        weight: 'default',  
    },  
});
```

## Putting It All Together

All of the tools mentioned above can be seamlessly combined to manage our Tailwind classes and variants:

```tsx
export function Banner({ className, variant, size }) {  
    return (  
        <div className={twMerge(clsx(bannerVariants({ variant, size }), className))}> 
        </div>  
    );  
}
```

By mixing **cva**, **clsx**, **tailwind-merge**, and **prettier-plugin-tailwindcss**, we’ve baked a pretty solid styling toolkit for Ray. Together, they let us tackle component variants, keep our classes tidy, and make styling as smooth as possible, no frosting left behind! And with that, our cake is finally finished. Who knows, maybe for the next project, we’ll bake up something new!

