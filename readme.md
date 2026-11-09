# myray.app

This repo contains the source code of https://myray.app

## Installation

The site does not require a SQL database or migrations. Documentation is stored in Markdown files, blog posts come from Spatie's Content API, and the changelog is fetched from GitHub and cached locally. The default configuration uses file caching, file sessions, and synchronous jobs, with failed-job storage disabled.

- Create an environment file with `cp .env.example .env`
- Install dependencies with `composer install` and `npm install`
- Generate an app key with `php artisan key:generate`
- Generate assets with `npm run build`, or run a development server with `npm run dev`

## Deployment

This site runs on [Laravel Cloud](https://cloud.laravel.com). Every push to `main` is deployed automatically.

## Blog

Blog posts live in `content/blog/<slug>.md`, with YAML front matter and a Markdown body. Copy an existing post for the metadata format. Keep existing slugs and publication dates stable; update `updated_at` when editing a published post. Images, videos, and author avatars live in `public/media/blog` and use `/media/blog/...` URLs.

Only posts with `published: true` and a `date` at or before the current time appear on the site or in `/feed`. This repository is public: unpublished files are still visible on GitHub, so do not commit confidential drafts.

Markdown is rendered on demand and cached using Laravel's default cache store. The cache is disposable: a cold request renders it again, and changing the Markdown produces a new cache key. There is no blog HTML build step. Shiki highlighting requires Node.js and the installed `shiki` package at runtime.

Laravel Cloud serves static media through its CDN and purges the edge cache on deployment by default. Give replacement media a new filename and update its references, since clearing the CDN does not clear visitors' browser caches. Blog pages and the feed currently use uncached HTTP responses; the Markdown cache avoids repeating the rendering work.

See [the blog migration runbook](BLOG_MIGRATION.md) for the one-time export, cutover, and rollback procedure.
