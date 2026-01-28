@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex justify-center w-full gap-6">

        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex px-6 py-3 md:py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light">
                Newer posts
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex px-6 py-3 md:py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light">
                Older posts
            </a>
        @endif
    </nav>
@endif
