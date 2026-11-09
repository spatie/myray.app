<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Client\Factory;
use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../vendor/autoload.php';

if ($argc !== 4) {
    fwrite(STDERR, "Usage: php scripts/import-blog.php production-export.json public-api.json NEW_OUTPUT_DIRECTORY\n");
    exit(1);
}

[$script, $exportPath, $apiPath, $output] = $argv;
$export = json_decode(file_get_contents($exportPath), true, flags: JSON_THROW_ON_ERROR);
$api = json_decode(file_get_contents($apiPath), true, flags: JSON_THROW_ON_ERROR);
$posts = collect($export['posts'])->keyBy('slug');
$publicPosts = collect($api['data'])->keyBy('slug');

if (($export['schema_version'] ?? null) !== 1
    || ($export['scope']['product'] ?? null) !== 'ray'
    || ($export['scope']['published'] ?? null) !== true
    || $posts->count() !== count($export['posts'])
    || $publicPosts->count() !== $api['meta']['total']
    || $posts->keys()->sort()->values()->all() !== $publicPosts->keys()->sort()->values()->all()) {
    throw new RuntimeException('The export and complete public API snapshot must contain the same published Ray posts.');
}

foreach ($posts as $slug => $post) {
    $publicPost = $publicPosts[$slug];

    if (! preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)
        || $publicPost['published'] !== true
        || new DateTimeImmutable($post['updated_at']) != new DateTimeImmutable($publicPost['updated_at'])
        || trim($post['content']) === '') {
        throw new RuntimeException("Invalid or changed post: {$slug}");
    }
}

if (file_exists($output)) {
    throw new RuntimeException('Choose a new output directory; the importer never overwrites existing files.');
}

$files = new Filesystem();
$http = new Factory();
$files->ensureDirectoryExists("{$output}/content/blog");
$assets = [];

foreach ($publicPosts as $post) {
    preg_match_all('~https://content\.spatie\.be/assets/[^\s"\'<>]+~', $post['content'], $matches);

    foreach (array_filter([...$matches[0], $post['header_image'], $post['og_image']]) as $url) {
        $url = html_entity_decode($url, ENT_QUOTES | ENT_HTML5);
        $path = substr(parse_url($url, PHP_URL_PATH), strlen('/assets/'));

        if (parse_url($url, PHP_URL_HOST) !== 'content.spatie.be'
            || str_contains(rawurldecode($path), '..')
            || ! preg_match('/\.(png|jpe?g|gif|webp|svg|mp4)$/i', $path)) {
            throw new RuntimeException("Unexpected media URL: {$url}");
        }

        $assets[$url] = "/media/blog/{$path}";
    }

    foreach ($post['authors'] as $author) {
        $hash = md5($author['email']);
        $assets["https://www.gravatar.com/avatar/{$hash}"] = "/media/blog/authors/{$hash}.png";
    }
}

foreach ($assets as $url => $path) {
    $response = $http->timeout(60)->retry(3, 500)->get($url)->throw();

    if (str_starts_with($url, 'https://www.gravatar.com/')) {
        $extension = match (getimagesizefromstring($response->body())['mime']) {
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
        };
        $path = preg_replace('/\.png$/', ".{$extension}", $path);
        $assets[$url] = $path;
    }

    $files->ensureDirectoryExists(dirname("{$output}/public{$path}"));
    $files->put("{$output}/public{$path}", $response->body());
    echo "Downloaded {$path}\n";
}

foreach ($posts as $slug => $post) {
    $publicPost = $publicPosts[$slug];
    $replacements = $assets;

    foreach ($assets as $url => $path) {
        if (str_starts_with($url, 'https://content.spatie.be/assets/')) {
            $sourcePath = substr($url, strlen('https://content.spatie.be/assets/'));
            $replacements["statamic://asset::assets::{$sourcePath}"] = $path;
            $replacements["/assets/{$sourcePath}"] = $path;
        }
    }

    $body = strtr($post['content'], $replacements);
    $summary = strtr($post['summary'] ?? '', $replacements);

    if (str_contains($body.$summary, 'statamic://') || str_contains($body.$summary, 'content.spatie.be')) {
        throw new RuntimeException("Unmigrated reference in {$slug}");
    }

    $metadata = [
        'title' => $post['title'],
        'date' => $publicPost['date'],
        'updated_at' => $post['updated_at'],
        'published' => true,
        'summary' => $summary,
        'authors' => collect($publicPost['authors'])->map(fn (array $author) => [
            'name' => $author['name'],
            'avatar' => $assets['https://www.gravatar.com/avatar/'.md5($author['email'])],
        ])->all(),
        'header_image' => $publicPost['header_image'] ? $assets[$publicPost['header_image']] : null,
        'og_image' => $publicPost['og_image'] ? $assets[$publicPost['og_image']] : null,
        'tags' => $post['tags'],
    ];

    $files->put("{$output}/content/blog/{$slug}.md", "---\n".Yaml::dump($metadata, 4, 2, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK)."---\n".$body."\n");
}

echo "Imported {$posts->count()} posts and ".count($assets)." media files into {$output}\n";
