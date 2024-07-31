<x-layouts.docs :title="$page->title" description="Understand and fix bugs faster using Ray">

    <section>
        <x-markdown class="w-full highlight gap-x-20 flex flex-col xl:flex-row">
<article class="markup min-w-0 w-full max-w-[45rem]">
<h1>{{ $page->title }}</h1>
{!! $page->contents !!}
</article>

<div class="docs-toc text-sm w-full max-w-48 order-first mb-8 lg:order-none">
<div class="lg:top-6 lg:sticky">
<h2 class="text-base font-semibold mb-3">On this page</h2>

[TOC]
</div>
</div>
        </x-markdown>

        {{-- TODO: Wire to backend --}}
        <div class="flex flex-wrap justify-between w-full max-w-[45rem] border border-bleak-purple-light rounded-xl mb-8 text-sm lg:text-base lg:mb-16">
            <a class="flex-1 pl-6 py-4 rounded-xl bg-gradient-to-r from-transparent to-transparent bg-opacity-0 hover:from-[#A998D320]" href="#">
                <span class="inline-flex gap-4 items-center group-hover:opacity-75">
                    <svg class="w-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 7 12"><path d="M1.102 6.398a.56.56 0 0 1 0-.794l4.5-4.502a.562.562 0 1 1 .795.795l-4.102 4.1 4.103 4.105a.562.562 0 1 1-.795.795l-4.5-4.499Z"/></svg>
                    Installation
                </span>
            </a>
            <a class="flex-1 text-right py-4 pr-6 rounded-xl group bg-gradient-to-l from-transparent to-transparent bg-opacity-0 hover:from-[#A998D320]" href="#">
                <span class="inline-flex gap-4 items-center">
                    Configuration
                    <svg class="w-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 7 12"><path d="M6.398 6.398a.56.56 0 0 0 0-.794l-4.5-4.502a.562.562 0 0 0-.795.795l4.102 4.1-4.103 4.105a.562.562 0 0 0 .795.795l4.501-4.499Z"/></svg>
                </span>
            </a>
        </div>

    </section>

    <a class="text-sm mt-5 flex items-center hover:underline" target="_blank"
        href="https://github.com/spatie/myray.app/blob/main/docs/{{ $page->getPath() }}">
        <span class="mr-2"><x-icons.github /></span>
        Help us improve this page
    </a>

</x-layouts.docs>
