---
title: 'The ingredients we used for our new Ray docs'
date: '2024-03-22T00:00:00.000000Z'
updated_at: '2024-03-27T12:17:55.000000Z'
published: true
summary: 'We recently revamped our Ray documentation. The goal was to give the docs a new home on the myray.app domain and make them easier to navigate by totally overhauling their structure and content. This blog post will give an overview of some packages, technologies, and techniques we used.'
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
We recently revamped our Ray documentation. The goal was to give the docs a new home on the myray.app domain and make them easier to navigate by totally overhauling their structure and content. This blog post will give an overview of some packages, technologies, and techniques we used.

## TALL stack
The Ray website is made with the TALL stack (Tailwind CSS, Alpine.js, Laravel, and Livewire), which covers all our needs.

Tailwind CSS makes it fast to add styling, and Alpine.js does the same for small bits of interactivity.

We use Livewire for our search box (more on that below) and to make everything blazing fast with [wire:navigate](https://livewire.laravel.com/docs/wire-navigate).  

When you add `wire:navigate` to a link, Livewire will intercept any clicks on it, fetch the contents of the page in the background, and replace the HTML in the browser with an updated version, which is much faster than a full page reload. This results in a really smooth and snappy experience for the user, and we highly recommend trying it out on your projects.

## Markdown
At [Spatie](https://spatie.be/), we prefer to write our documentation in Markdown. Markdown is a straightforward and fast way to write text and add some basic styling (headings, bold, bullet lists, …). 

Because of its simplicity, Markdown works really well when stored in a version control system like Git, which is important to us because it allows easy collaboration. Our docs are available in [a public repository](https://github.com/spatie/myray.app/tree/main/docs), and we are always happy to receive pull requests to improve them. This is a great way to get started in opensource!

### Adding meta-data to our Markdown files
We use our [spatie/sheets](https://github.com/spatie/sheets) package to add some extra metadata to our Markdown files using the Front Matter specification. Here's an example of what that looks like:

```markdown
---
title: Using Ray With Laravel
menuTitle: Installation
weight: 1
---

If you use Laravel, this is the way.
...
```

At the top of our Markdown file, there's a section where you can add extra properties. In this example, we define the page title and the label of the menu item.  

By adding a weight property, we can manage this item's position in the menu.

The sheets package allows you to retrieve all pages in a Collection:

```php
$pages = Sheets::all()->sortBy('weight');

$firstPage = $pages->first();
echo $firstPage->title; // Outputs: 'Using Ray With Laravel'
```

### Converting Markdown to HTML
While the Sheets package can convert your Markdown to HTML, we decided to also use our [spatie/laravel-markdown](https://spatie.be/docs/laravel-markdown/v1/introduction) package. This package leverages [Commonmark](https://commonmark.thephpleague.com/) and adds some nice features like adding anchors to titles and creating a sub-navigation by listing all headers that are the page.

The package also offers code highlighting with [Shiki](https://github.com/spatie/shiki-php) out of the box, which makes all the code snippets we include in our docs look beautiful. 

### Leveraging wire:navigate in Markdown
Because there are many internal links inside our Markdown files we wanted to use `wir:navigate` on them. Our colleague Seb handled this by creating the [spatie/commonmark-wire-navigate package](https://github.com/spatie/commonmark-wire-navigate). For more info on this topic, you can read his blogpost: [Adding wire:navigate to Markdown links](https://myray.app/blog/adding-wire-navigate-to-markdown-links)

### Adding HTML components inside Markdown
We wanted to create more complex content like [the integrations overview](https://myray.app/docs/getting-started/integrations). To achieve this, we decided to create Blade components that we could embed inside our Markdown files.

Aaron Francis wrote a great blogpost on how to do this: [Rendering Blade components in Markdown](https://aaronfrancis.com/2023/rendering-blade-components-in-markdown).

## Search
We use `spatie/laravel-site-search` to power the search. This package can automatically crawl and index your site's contents using Melisearch under the hood.

We use Alpine to handle the open/closed state of our search box and Livewire to search and return results.

To allow people to open the search box with the well-known `CMD+K` shortcut, we used Alpine's keyboard event listener. Here's a simplified version of what that looks like:

```html
<body x-data="{showSearchBox: false}"
      @keydown.cmd.k.window.prevent="showSearchBox = true">

	<div>
		<!-- A backdrop that can be clicked to hide the search -->
		<div
    		class="fixed left-0 right-0 top-0 bottom-0 bg-indigo-100/75 z-40"
    		x-cloak
    		x-show= "showSearchBox"
    		@click="showSearchBox=false"
		></div>

		<!-- The wrapper around the search component -->
		<div
    		class="fixed left-0 right-0 top-0 bottom-0 z-50"
    		x-cloak
    		x-show= "showSearchBox"
    		x-trap= "showSearchBox"
		>
			<livewire:doc-search />
		</div>
	</div>
</div>
```

## Look under the hood yourself
The repository for the Ray website is public, and you can go and take a look under the hood yourself if you want to know more: [spatie/myray.app: Ray promotional website](https://github.com/spatie/myray.app).
