---
title: 'Adding wire:navigate to Markdown links'
date: '2024-03-18T00:00:00.000000Z'
updated_at: '2024-03-27T14:44:57.000000Z'
published: true
summary: |-
  We just released our new Ray docs, [check 'em out](https://myray.app/docs/getting-started/introduction) if you haven't already! They're hosted right here on myray.app and are extra snappy because they use Livewire's navigate feature.

  Here's how we added `wire:navigate` to all the links in our docs.
authors:
  -
    name: Sebastian
    avatar: /media/blog/authors/27e1bbf570a99f9a73dd0f34af844db1.jpg
header_image: null
og_image: null
tags: {}
---
We just released our new Ray docs, [check 'em out](https://myray.app/docs/getting-started/introduction) if you haven't already! They're hosted right here on myray.app and are extra snappy because they use Livewire's navigate feature.

Livewire's [navigate feature](https://livewire.laravel.com/docs/navigate) was recently introduced in Livewire 3. Livewire can hijack a link click, fetch the destination's HTML and swap it with the current page. This results in SPA-like speedy navigation.

If you want to enable Livewire's fast navigation, add a `wire:navigate` attribute to a link.

```html
<a href="/docs/installation" wire:navigate>Installation</a>
```

## Wire navigatifying our docs

Back to the Ray docs. All of our documentation is written in Markdown. The downside is you can't add HTML attributes to links in Markdown.

```md
Read our [installation guide](/docs/installation).
```

We could replace all our links with HTML. But that's cumbersome and we're bound to forget a few places now or in the future.

```md
Read our <a href="/docs/installation" wire:navigate>installation guide</a>.
```

Luckily, `league/commonmark`—the Markdown converter we all use and love—supports extensions. And we wrote just that: an extension to automatically append `wire:navigate` to all links.

You can configure which links the package should add attributes to. In this example, we'll set up the extension to add `wire:navigate` to all links that point to docs pages on myray.app.

```php
$converter = new CommonMarkConverter([
	'wire_navigate' => [
	    'domain' => 'myray.app',
	    'paths' => ['docs'],
	],
]);

$converter->addExtension(new WireNavigateExtension());
```

If you want to learn more or give it a try, check out the [repository on GitHub](https://github.com/spatie/commonmark-wire-navigate). And don't forget to take a peek at our [new and improved docs](https://myray.app/docs/getting-started/introduction). We hope you enjoy them!
