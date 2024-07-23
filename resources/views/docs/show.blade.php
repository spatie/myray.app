<x-layouts.docs
    :title="$page->title"
    description="Understand and fix bugs faster using Ray"
>
    <div class="flex text-xs md:text-xxs items-center mb-4 text-midnight-dark">
        <a href="/docs" class="mr-2">
            <x-icons.home />
        </a>
        @foreach($categories as $category)
            <x-icons.caret-right />

            <a class="mr-2" href="/docs/{{$category->slug}}">{{$category->title}}</a>
        @endforeach
        <x-icons.caret-right />
        <a class="mr-2 font-bold" href="/docs/{{$category->slug}}">{{$page->title}}</a>
    </div>
    <section class="docs-content md:w-full">
        <x-markdown>
<article>
<h1>{{ $page->title }}</h1>
{!! $page->contents !!}
</article>

<div class="table-of-contents">
<h2>On this page</h2>

[TOC]
</div>
        </x-markdown>
    </section>
    <a class="text-xs text-midnight-dark mt-5 block flex items-center" target="_blank" href="https://github.com/spatie/myray.app/blob/main/docs/{{$page->getPath()}}">
        <div class="mr-2 inline-block">
            <x-icons.github />
        </div>
        Help us improve this page
    </a>
</x-layouts.docs>
