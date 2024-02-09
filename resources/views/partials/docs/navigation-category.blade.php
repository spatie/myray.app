<div class="navigation-category">
    <a href="{{$category->firstPage()->url}}" class="pl-0 cursor-pointer text-base font-semibold">
        {{$category->title}}
    </a>
    @if(\Illuminate\Support\Str::contains($slug, $category->slug))
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
                        {{$page->title}}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
