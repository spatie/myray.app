<x-layouts.default title="Blog" description="Read about new features, upcoming updates, and useful tips for using Ray." :color="'#36107A'">

    <x-slot name="background">
        <div class="bg-gradient-to-b from-midnight-extra-light to-midnight md:flex md:justify-center">
            <div class="w-full translate-y-[-18rem]">
                <img class="opacity-75 max-w-[90rem] mx-auto hidden md:block" src="/images/24-background-1.svg" alt="">
                <img class="opacity-75 mx-auto md:hidden" src="/images/24-background-1-m.svg" alt="">
            </div>
        </div>
    </x-slot>

    <div class="container max-w-4xl mx-auto pb-12 md:pb-0">
        <div class="mx-auto px-6 sm:px-12 md:px-16">

            <x-intro.default title="Blog"
                text="Read about new features, upcoming updates, and useful tips for using Ray."
                tag="h1" />

            <div x-data="{
                page: 1,
                hasMorePages: {{ $posts->hasMorePages() ? 'true' : 'false' }},
                loading: false,

                async loadMore() {
                    this.loading = true;
                    this.page++;

                    const response = await fetch(`/blog/load-more?page=${this.page}`);
                    const html = await response.text();

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newPosts = doc.querySelector('[data-posts]').innerHTML;
                    this.hasMorePages = doc.querySelector('[data-has-more]')?.dataset.hasMore === 'true';

                    this.$refs.postsContainer.insertAdjacentHTML('beforeend', newPosts);
                    this.loading = false;
                }
            }">
                <div class="flex flex-col gap-8 mb-8" x-ref="postsContainer">
                    @forelse($posts as $post)
                        @include('blog.partials.post-card', ['post' => $post])
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

                <div class="flex justify-center" x-show="hasMorePages" x-cloak>
                    <button @click="loadMore()"
                            :disabled="loading"
                            class="inline-flex px-6 py-3 md:py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light disabled:opacity-50">
                        <span x-show="!loading">Older posts</span>
                        <span x-show="loading" x-cloak>Loading...</span>
                    </button>
                </div>
            </div>

        </div>

    </div>

</x-layouts.default>
