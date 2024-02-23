<a
    href="{{ $category->firstPage()->url }}"
    x-bind:class="$currentSection('{{ $category->firstPage()->url }}') ? '-left-px active border-l border-indigo-500 font-semibold text-indigo-500' : ''"
    wire:navigate.hover
>
    {{ $category->title }}
</a>
<ul x-show="$currentSection('{{ $category->firstPage()->url }}')">
    @foreach($category->categories as $subCategory)
        <li>
            @include('partials.docs.navigation-sub-category', ['category' => $subCategory])
        </li>
    @endforeach
    @if(count($category->pages) >= 2)
        @foreach($category->pages as $page)
            <li>
                <a
                    href="{{ $page->url }}"
                    x-bind:class="$current('{{ $page->url }}') ?  'active text-indigo-500' : ''"
                    wire:navigate.hover
                >
                    {{ $page->menuTitle() }}
                </a>
            </li>
        @endforeach
    @endif
</ul>
