<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

beforeEach(function () {
    $this->travelTo(now()->setDate(2025, 4, 10)->startOfDay());

    Http::preventStrayRequests();
    Http::fake(['spatie.be/api/price/*' => Http::response([], 404)]);
    Storage::fake('blog');

    $body = <<<'MARKDOWN'
    ## Local content

    A **formatted** post.

    ```blade
    {{-- Keep this comment --}}
    <div>{{ $message }}</div>
    ```

    ![Screenshot](/media/blog/example.png)

    [Docs](/docs/getting-started/installation)
    MARKDOWN;

    foreach (range(1, 11) as $number) {
        $metadata = [
            'title' => "Local post {$number}",
            'date' => $number === 11 ? '2025-04-11T00:00:00Z' : sprintf('2025-03-%02dT00:00:00Z', $number),
            'updated_at' => '2025-04-02T13:14:15Z',
            'published' => $number !== 10,
            'summary' => 'A **local** summary.',
            'authors' => [['name' => 'Taylor', 'avatar' => '/media/blog/taylor.png']],
        ];

        Storage::disk('blog')->put("post-{$number}.md", "---\n".Yaml::dump($metadata, 4)."---\n{$body}\n");
    }
});

it('paginates published posts newest first without repeating the last page', function () {
    $this->get('/blog')->assertOk()
        ->assertSeeInOrder(['Local post 9', 'Local post 8', 'Local post 7', 'Local post 6', 'Local post 5', 'Local post 4', 'Local post 3', 'Local post 2'])
        ->assertDontSee('href="'.route('blog.show', 'post-1').'"', false)
        ->assertDontSee('Local post 10')
        ->assertDontSee('Local post 11');

    $this->get('/blog/load-more?page=2')->assertOk()
        ->assertSee('Local post 1')
        ->assertDontSee('Local post 2')
        ->assertSee('data-has-more="false"', false);

    $this->get('/blog?page=2')->assertOk()->assertSee('page: 2', false);
    $this->get('/blog/load-more?page=3')->assertOk()
        ->assertDontSee('Local post')
        ->assertSee('data-has-more="false"', false);
});

it('renders local markdown while keeping drafts and scheduled posts private', function () {
    $this->get('/blog/post-9')->assertOk()
        ->assertSee('Local content')
        ->assertSee('<strong>formatted</strong>', false)
        ->assertSeeText('{{-- Keep this comment --}}')
        ->assertSee('src="/media/blog/example.png"', false)
        ->assertSee('Taylor')
        ->assertDontSee('content.spatie.be');

    $this->get('/blog/post-10')->assertNotFound();
    $this->get('/blog/post-11')->assertNotFound();
    $this->get('/blog/missing')->assertNotFound();
    $this->get('/blog/123-post-9')->assertRedirectToRoute('blog.show', 'post-9')->assertStatus(301);

    $this->travelTo(\Carbon\CarbonImmutable::parse('2025-04-11T00:00:00Z'));
    $this->get('/blog/post-11')->assertOk();
});

it('preserves atom identifiers and update dates with absolute content urls', function () {
    $response = $this->get('/feed')->assertOk()->assertDontSee('content.spatie.be');
    $feed = simplexml_load_string($response->getContent());

    expect($feed->entry)->toHaveCount(9)
        ->and((string) $feed->entry[0]->title)->toBe('Local post 9')
        ->and((string) $feed->entry[0]->id)->toBe(url('/post-9'))
        ->and((string) $feed->entry[0]->link['href'])->toBe(url('/blog/post-9'))
        ->and((string) $feed->entry[0]->updated)->toBe('2025-04-02T13:14:15+00:00')
        ->and((string) $feed->entry[0]->author->name)->toBe('Taylor')
        ->and((string) $feed->entry[0]->summary)->toContain(
            '<strong>formatted</strong>',
            'src="'.url('/media/blog/example.png').'"',
            'href="'.url('/docs/getting-started/installation').'"',
        );
});
