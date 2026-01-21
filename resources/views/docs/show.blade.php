<x-layouts.docs :title="$page->title" description="Understand and fix bugs faster using Ray">

    <section>
        <x-markdown class="w-full highlight gap-x-20 flex flex-col xl:flex-row">
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
