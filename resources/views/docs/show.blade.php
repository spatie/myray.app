<x-layouts.docs :title="$page->title" description="Understand and fix bugs faster using Ray">

    <section>
        <x-markdown class="w-full highlight gap-20 lg:flex">
<article class="markup w-full lg:w-[45rem]">
<h1>{{ $page->title }}</h1>
{!! $page->contents !!}
</article>

<div class="table-of-contents w-full max-w-60">
<div class="sticky top-0">
<h2 class="text-base font-semibold">On this page</h2>
[TOC]
</div>
</div>
        </x-markdown>

    </section>

    <a class="text-sm mt-5 flex items-center" target="_blank"
        href="https://github.com/spatie/myray.app/blob/main/docs/{{ $page->getPath() }}">
        <span class="mr-2"><x-icons.github /></span>
        Help us improve this page
    </a>

</x-layouts.docs>
