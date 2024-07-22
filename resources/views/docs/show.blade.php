<x-layouts.docs :title="$page->title" description="Understand and fix bugs faster using Ray">

    <section class="gap-20 lg:flex">
        <x-markdown class="w-full markup highlight lg:w-[45rem]">
            <article class="w-full">
                <h1>{{ $page->title }}</h1>
                {!! $page->contents !!}
            </article>

            <div class="table-of-contents">
                <h2>On this page</h2>
                [TOC]
            </div>
        </x-markdown>

        <div class="table-of-contents w-full max-w-60 sticky top-0">
            <h2 class="text-base font-semibold">On this page</h2>
            <ul class="markup">
                <li>
                    <a href="#reference">Reference</a>
                </li>
                <li>
                    <a href="#updating-a-ray-instance">Updating a Ray instance</a>
                </li>
            </ul>
        </div>

    </section>

    <a class="text-sm mt-5 flex items-center" target="_blank"
        href="https://github.com/spatie/myray.app/blob/main/docs/{{ $page->getPath() }}">
        <span class="mr-2"><x-icons.github /></span>
        Help us improve this page
    </a>

</x-layouts.docs>
