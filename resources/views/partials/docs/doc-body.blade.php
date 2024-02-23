

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

<a class="text-xs text-midnightDark mt-5 block flex items-center" target="_blank" href="https://github.com/spatie/myray.app/blob/main/docs/{{$page->getPath()}}">
    <div class="mr-2 inline-block">
        @include('partials.svg.icon-github')
    </div>
    Help us improve this page
</a>
