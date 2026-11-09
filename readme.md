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
