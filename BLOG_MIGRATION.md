# Move the Ray blog into this repository

The initial import contains 38 published posts, 64 content media files, and 8 author avatars. It was exported on 2026-11-09 from the current production data, not the historical CMS Git files. All exported slugs and update timestamps matched the public API before and after export.

Markdown and media are committed together. The application does not contact the content API, and no database migration is needed. The existing Atom feed, post URLs, numeric-prefix redirects, and eight-post pagination remain in place. The YouTube embed remains external.

## 1. Freeze editing and verify the snapshot

Agree a cutover window with the blog editors. Stop editing Ray posts in the old CMS until cutover is complete. Allow up to one day for recovery, but deploying this change does not require planned downtime.

Keep the old service, database backup, and media available throughout verification and rollback. Do not shut down the whole content service merely because this website has migrated: other consumers need their own migration.

If posts changed since the import, repeat the export below and replace the imported files before deploying. Treat the raw export and public API snapshot as temporary input: the API includes author emails, which must not be committed.

## 2. Export current production Markdown, read-only

Run from the content service's checkout on a machine with its Laravel Cloud CLI access. First confirm the CLI is linked to the content service, not this website.

```sh
set -euo pipefail
cloud repo:config content.spatie.be --organization=Spatie -n
curl -fsS 'https://content.spatie.be/api/collections/posts/entries?filter%5Bproduct%5D=ray&limit=100&sort=-date' > public-snapshot.json
jq -e '.meta.last_page == 1 and .meta.total == (.data | length) and (.data | length) > 0 and all(.data[]; .published == true and (.slug | test("^[a-z0-9]+(-[a-z0-9]+)*$"))) and ([.data[].slug] | unique | length) == (.data | length)' public-snapshot.json
```

If the snapshot spans multiple pages, collect all pages before proceeding; do not export only the first page.

Save the following as `export-query.php.txt` without a PHP opening tag. This reads the CMS entry table directly, avoiding augmented fields that turn Markdown into HTML. It deliberately excludes CMS IDs, users, emails, and drafts.

```php
$slugs = json_decode('SLUGS', true, flags: JSON_THROW_ON_ERROR);
$rows = Illuminate\Support\Facades\DB::table('entries')
    ->where('collection', 'posts')
    ->where('published', true)
    ->where('data->product', 'ray')
    ->whereIn('slug', $slugs)
    ->orderBy('slug')
    ->get(['slug', 'date', 'updated_at', 'data']);

if ($rows->count() !== count($slugs) || $rows->pluck('slug')->unique()->count() !== count($slugs)) {
    throw new RuntimeException('Public snapshot scope mismatch');
}

$posts = $rows->map(function ($row) {
    $data = json_decode($row->data, true, flags: JSON_THROW_ON_ERROR);

    return [
        'slug' => $row->slug,
        'content' => $data['content'],
        'summary' => $data['summary'] ?? null,
        'title' => $data['title'],
        'date' => $row->date,
        'updated_at' => Carbon\CarbonImmutable::parse($row->updated_at, 'UTC')->toISOString(),
        'header_image' => $data['header_image'] ?? null,
        'og_image' => $data['og_image'] ?? null,
        'tags' => $data['tags'] ?? [],
    ];
});

echo json_encode([
    'schema_version' => 1,
    'exported_at' => gmdate('c'),
    'scope' => ['collection' => 'posts', 'published' => true, 'product' => 'ray'],
    'posts' => $posts,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
```

Run the export in Bash. The slug validation above must pass before substituting the snapshot into the query. The CLI waits for the command and emits its final output as JSON.

```sh
set -euo pipefail
slugs=$(jq -c '[.data[].slug]' public-snapshot.json)
code=$(cat export-query.php.txt)
code=${code/SLUGS/$slugs}
cloud tinker production --code="$code" --json -n > export-run.jsonl
jq -se 'map(select(.output != null)) | last | select(.status == "command.success" and .exitCode == 0) | .output | fromjson' export-run.jsonl > production-export.json

curl -fsS 'https://content.spatie.be/api/collections/posts/entries?filter%5Bproduct%5D=ray&limit=100&sort=-date' > public-snapshot-after.json
diff <(jq -S '[.data[] | {slug, updated_at}] | sort_by(.slug)' public-snapshot.json) <(jq -S '[.data[] | {slug, updated_at}] | sort_by(.slug)' public-snapshot-after.json)
```

If the export fails or the snapshot changes, stop and repeat it. Transfer the export and the original public snapshot into a private temporary directory on the machine holding this repository.

## 3. Import into a new directory and verify

From this repository, run:

```sh
php scripts/import-blog.php /private/path/production-export.json /private/path/public-snapshot.json /tmp/ray-blog-import
```

The output directory must not exist. The importer checks slug sets, publication flags and update timestamps, downloads media, rewrites asset references, and strips private author metadata. A failed import may leave a partial directory; do not copy it into the repository. Use a new directory for the next attempt.

After a successful import, compare its `content/blog` and `public/media/blog` with this repository. Replace only those imported directories, accounting explicitly for any posts removed from publication. Review the diff before committing. Do not overwrite edits made locally since the CMS freeze.

Run `npm ci`, `npm run build`, and `php vendor/bin/pest`. The build only compiles frontend assets; blog HTML is rendered on demand. In a preview environment, verify every post URL and asset, all five current pagination pages, the final disabled/hidden load-more control, and a legacy numeric redirect. Check a code-heavy post, Blade examples, GIFs, video playback, social images, and a narrow viewport.

Compare `/feed` against a saved live feed: the same entry IDs, links, authors, publication ordering and original `updated_at` values must remain. IDs intentionally use `/<slug>` while links use `/blog/<slug>`; do not normalize them. Feed bodies should have absolute media and internal link URLs. Test with the old content host blocked, `node_modules` absent, and an empty Laravel cache, then repeat with a warm cache. Confirm no page or feed references the old host. Markdown and syntax highlighting run entirely in PHP.

## 4. Deploy and switch ownership

Merge the approved PR into `main` to use the existing automatic deployment. Keep the existing frontend build command. No HTML build artifacts, cache warming, database migration, or additional production command is required. The application must be able to render posts with an empty cache.

After deployment succeeds, repeat the public checks above on the production site. Confirm that the new commit is deployed and that the actual HTML points at local media. Check logs for failed requests. Only then tell editors to create and update posts in this repository rather than the old CMS.

Keep the old service and backups available for at least the agreed one-day recovery window. Retiring the shared content service is a separate operation after all its consumers are confirmed migrated.

## 5. Roll back if needed

Before the old service is retired, roll back to the previous successful deployment through Laravel Cloud, or revert this PR and deploy that revert. The previous application still depends on the old API and its media, which is why they must remain available during the recovery window.

If the old service has already been shut down, rolling back code alone will not restore the blog. Restore that service from its backup first, or fix forward using the committed Markdown and media. Do not delete data or resources as part of this PR.
