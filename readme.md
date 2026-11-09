# myray.app

This repo contains the source code of https://myray.app

## Installation

- Create an environment file with `cp .env.example .env`
- Generate an app key with `php artisan key:generate`
- Create a database with `php artisan migrate`
- Install dependencies with `composer install` and `npm install`
- Generate assets with `npm run build`, or run a development server with `npm run dev`

## Deployment

This site runs on [Laravel Cloud](https://cloud.laravel.com). Every push to `main` is deployed automatically.

## Blog

Blog posts live in `content/blog/<slug>.md`, with YAML front matter and a Markdown body. Copy an existing post for the metadata format. Keep existing slugs and publication dates stable; update `updated_at` when editing a published post. Images, videos, and author avatars live in `public/media/blog` and use `/media/blog/...` URLs.

Only posts with `published: true` and a `date` at or before the current time appear on the site or in `/feed`. This repository is public: unpublished files are still visible on GitHub, so do not commit confidential drafts.

`npm run build` also runs `php artisan blog:cache`, rendering all posts with Shiki into `bootstrap/cache/blog`. Keep this directory in the deployment artifact: it lets production serve highlighted code without Node.js or `node_modules`. Rebuild after changing posts or rendering configuration. Do not clear the `blog` cache store in production without rebuilding it.

See [the blog migration runbook](BLOG_MIGRATION.md) for the one-time export, cutover, and rollback procedure.
