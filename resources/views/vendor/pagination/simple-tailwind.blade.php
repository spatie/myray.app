@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">

        @if ($paginator->onFirstPage())
            <span class="">
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="">
                &laquo; Newer
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="">
                Older &raquo;
            </a>
        @else
            <span class="">

            </span>
        @endif
    </nav>
@endif
