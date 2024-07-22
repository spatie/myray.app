<a href="{{ $category->firstPage()->url }}" class="text-lg font-semibold" wire:navigate.hover>
    {{ $category->title }}
</a>

<ul class="docs-nav-items">
    @foreach ($category->categories as $subCategory)
        <li class="docs-nav-sub-category-item">
            <x-docs.navigation.sub-category :category="$subCategory" />
        </li>
    @endforeach
    @foreach ($category->pages as $page)
        <li class="docs-nav-item" x-bind:class="$current('{{ $page->url }}') && 'active'">
            <a href="{{ $page->url }}" wire:navigate.hover>
                {{ $page->menuTitle() }}
            </a>
        </li>
    @endforeach
</ul>
