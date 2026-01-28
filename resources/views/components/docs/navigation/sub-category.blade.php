<a href="{{ $category->firstPage()->url }}"
    x-bind:class="$currentSection('{{ $category->firstPage()->url }}') && 'active'" wire:navigate.hover>
    {{ $category->title }}
</a>

@if (count($category->pages) >= 2)
    <ul class="docs-nav-items" x-show="$currentSection('{{ $category->firstPage()->url }}')">
        @foreach ($category->pages as $page)
            <li class="docs-nav-item" x-bind:class="$current('{{ $page->url }}') && 'active'">
                <a href="{{ $page->url }}" wire:navigate.hover>
                    {{ $page->menuTitle() }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
