<div data-posts>
    @foreach($posts as $post)
        <a href="{{ route('blog.show', $post->slug) }}"
            class="flex flex-col items-start justify-between rounded-2xl group">
            <article class="transition bg-bleak-purple bg-opacity-85 rounded-2xl w-full p-8 shadow-top-white md:p-12 group-hover:bg-opacity-100">
                @isset($post->date)
                    <div class="mb-2">
                        <time datetime="{{ $post->date->format('Y-m-d') }}"
                            class="text-white text-opacity-50">{{ $post->date->format('j F Y') }}</time>
                    </div>
                @endisset
                <div class="mb-6">
                    <h3 class="font-display font-bold text-xl mb-[0.5em] md:text-3xl">
                        {{ $post->title }}</h3>
                    <p class="text-white text-opacity-50 !leading-6 md:text-lg">
                        {{ htmlspecialchars_decode(strip_tags($post->summary)) }}</p>
                </div>
                <div class="relative mt-2 flex items-center gap-x-6">
                    <?php /** @var \Spatie\ContentApi\Data\Author $author */ ?>
                    <div class="flex items-center gap-x-6">
                    @foreach ($post->authors as $author)
                        <x-author :image="$author->gravatar_url" :name="$author->name" />
                    @endforeach
                    </div>
                </div>
            </article>
        </a>
    @endforeach
</div>
<div data-has-more="{{ $posts->hasMorePages() ? 'true' : 'false' }}"></div>
