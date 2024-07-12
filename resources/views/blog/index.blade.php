<x-layouts.default title="Ray Blog" description="Read about new features, upcoming updates, and useful tips for using Ray.">

    <div class="absolute w-full translate-y-[-18rem] pointer-events-none md:p-8 bg-gradient-to-b from-midnight-extra-light to-midnight md:flex md:justify-center">
        <img class="opacity-75 max-w-[90rem] mx-auto hidden md:block" src="/images/24-background-1.svg" alt="">
        <img class="opacity-75 mx-auto md:hidden" src="/images/24-background-1-m.svg" alt="">
    </div>

    <div class="container max-w-4xl mx-auto pb-12 md:pb-0">
        <div class="mx-auto px-6 sm:px-12 md:px-16">

            <x-intro.default title="Blog"
                text="Read about new features, upcoming updates, and useful tips for using Ray."
                tag="h1" />

            <div class="flex flex-col gap-8 mb-8">
                @forelse($posts as $post)

                    <a href="{{ route('post.show', $post->slug) }}"
                        class="flex flex-col items-start justify-between rounded-2xl shadow-top-white ring-neutrals-white-20 ring-inset hover:ring-2">
                        <article class="bg-bleak-purple bg-opacity-75 rounded-2xl w-full p-8 md:p-12">
                            @isset($post->date)
                                <div class="mb-2">
                                    <time datetime="{{ $post->date->format('Y-m-d') }}"
                                        class="text-white text-opacity-50">{{ $post->date->format('d F Y') }}</time>
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

                @empty
                    <article class="flex py-12 flex-col items-start justify-between">
                        <div class="group relative">
                            <h3
                                class="mt-1 text-lg font-semibold leading-6 text-indigo-900 group-hover:text-indigo-600">
                                The first post will be published soon...
                            </h3>
                        </div>
                    </article>
                @endforelse
            </div>

            <div class="flex">
                {{ $posts->links('vendor.pagination.simple-tailwind') }}
            </div>

        </div>

    </div>

    <div class="container mx-auto p-2 pb-12 lg:py-24 lg:px-16">
        <x-cta.large />
        <x-nav.footer />
    </div>

</x-layouts.default>
