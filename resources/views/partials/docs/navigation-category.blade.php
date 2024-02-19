<div class="navigation-category">
    <a href="{{$category->firstPage()->url}}" class="pl-0 cursor-pointer text-sm font-semibold">
        {{$category->title}}
    </a>
    <ul>
        @foreach($category->categories as $subCategory)
            <li>
                @include('partials.docs.navigation-sub-category', ['category' => $subCategory])
            </li>
        @endforeach
        @foreach($category->pages as $page)
            <li
                @class([
                    'active border-indigo-500' => \Illuminate\Support\Str::contains($slug, $page->slug),
                ])
            >
                <a href="{{$page->url}}"
                    @class([
                        'active border-indigo-500 border-s' => \Illuminate\Support\Str::contains($slug, $page->slug),
                    ])
                >
                    {{$page->menuTitle()}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
