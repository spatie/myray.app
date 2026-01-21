<x-layouts.default :title="$post->title" :description="htmlspecialchars_decode(strip_tags($post->summary))" :color="'#36107A'">

    <x-slot name="background">
        <div class="bg-gradient-to-b from-midnight-extra-light to-midnight md:flex md:justify-center">
            <div class="w-full translate-y-[-18rem]">
                <img class="opacity-20 max-w-[90rem] mx-auto" src="/images/24-background-3.svg" alt="">
            </div>
        </div>
    </x-slot>

    <div class="container max-w-4xl mx-auto pb-12 md:pb-0">

        <div class="mx-auto px-6 sm:px-12 md:px-16">

            <div class="max-w-2xl mx-auto">
                <div class="mb-3 lg:mb-6">
                    <a class="inline-block underline text-bleak-purple-extra-light mb-4 hover:text-white"
                        href="{{ route('blog.index') }}">
                        Back to overview</a>
                    <h1
                        class="font-display font-black text-4xl mb-[0.25em] pb-[0.075em] text-balance text-transparent bg-clip-text bg-gradient-to-r from-orange to-bright-orange md:text-6xl">
                        {{ $post->title }}
                    </h1>
                </div>

                <div class="flex items-center gap-8 mb-12">
                    <p>{{ $post->date?->format('j F Y') ?? 'Preview' }}</p>
                    <div class="flex items-center gap-x-6">
                        @foreach ($post->authors as $author)
                            <x-author :image="$author->gravatar_url" :name="$author->name" />
                        @endforeach
                    </div>
                </div>
            </div>

            @if ($post->header_image)
                <div class="my-12 shadow-xl">
                    <img class="w-full rounded-xl my-4" alt="" src="{{ $post->header_image }}" />
                </div>
            @endif

            <div class="markup text-lg max-w-2xl mx-auto text-bright-purple-extra-light">
                {!! $post->content !!}
            </div>

        </div>

    </div>

    <div class="container max-w-4xl mx-auto pb-8 mt-8 border-t border-white border-opacity-10 md:pb-0 md:mt-16">
        <div class="max-w-md mx-auto px-6 py-8 md:py-16 md:px-0 lg:pb-0">
            <x-form.newsletter />
        </div>
    </div>

</x-layouts.default>
