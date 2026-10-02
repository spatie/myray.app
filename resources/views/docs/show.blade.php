<x-layouts.docs :title="$page->title" description="Ray keeps all your debug output neatly organized in a dedicated desktop app.">

    @php
        $description = Str::limit(strip_tags($page->contents), 160);

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'TechArticle',
            'headline' => $page->title,
            'description' => $description,
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Spatie',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/spatie.svg'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => url()->current(),
            ],
        ];
    @endphp

    <x-slot name="schema">
        <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
    </x-slot>

    <section>
        <x-markdown class="w-full highlight gap-x-20 flex flex-col xl:flex-row">

<div>

<div class="hidden border-b border-bleak-purple-extra-light/20 mb-6 pb-1 lg:flex">
    <nav class="flex items-center gap-2 text-sm">
        @foreach($categories as $category)
            <a class="text-bleak-purple-extra-light no-underline transition hover:text-white"
               href="{{ $category->firstPage()->url }}">{{ $category->title }}</a>
            <span class="text-bleak-purple-extra-light/50">/</span>
        @endforeach
        <span class="text-white">{{ $page->menuTitle ?? $page->title }}</span>
    </nav>
</div>

<article class="markup min-w-0 w-full max-w-[45rem] text-bright-purple-extra-light">

@if(end($categories)->thirdParty ?? false)
<div class="mb-3">
<span class="text-xs bg-orange/20 text-orange px-2 py-0.5 rounded-full">
    Community
</span>
</div>
@endif

<h1>{{ $page->title }}</h1>
{!! $page->contents !!}
</article>
</div>

<div class="docs-toc text-sm w-full order-first mb-8 lg:order-none lg:max-w-48">
<div class="lg:top-6 lg:sticky">
<h2 class="text-base font-semibold mb-3">On this page</h2>

[TOC]
</div>
</div>
        </x-markdown>

    </section>

    <a class="text-sm mt-5 flex items-center hover:underline" target="_blank"
        href="https://github.com/spatie/myray.app/blob/main/docs/{{ $page->getPath() }}">
        <span class="mr-2"><x-icons.github /></span>
        Help us improve this page
    </a>

</x-layouts.docs>
