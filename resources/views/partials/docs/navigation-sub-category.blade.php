<a href="{{$category->firstPage()->url}}" @class([
    '-left-px active border-l border-indigo-500 font-semibold text-indigo-500' => \Illuminate\Support\Str::contains($slug, $category->slug),
])>
    {{$category->title}}
</a>
@if(\Illuminate\Support\Str::contains($slug, $category->slug))
    <ul>
        @foreach($category->subCategories as $subCategory)
            <li>
                @include('partials.docs.navigation-sub-category', ['category' => $subCategory])
            </li>
        @endforeach
        @foreach($category->pages as $page)
            <li>
                <a href="{{$page->url}}"
                    @class([
                        'active text-indigo-500' => \Illuminate\Support\Str::contains($slug, $page->slug),
                    ])
                >
                    {{$page->title}}
                </a>
            </li>
        @endforeach
    </ul>
@endif
