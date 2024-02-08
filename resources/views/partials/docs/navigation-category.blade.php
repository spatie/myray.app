<div class="navigation-category" x-data="{ open: {{\Illuminate\Support\Str::contains($slug, $category->slug) ? 'true' : 'false'}} }">
    <strong class="cursor-pointer text-base font-semibold" @click="open = !open">{{$category->title}}</strong>
    <ul x-show="open">
        @foreach($category->subCategories as $subCategory)
            <li>
                @include('partials.docs.navigation-sub-category', ['category' => $subCategory])
            </li>
        @endforeach
        @foreach($category->pages as $page)
            <li
                @class([
                    'active border-indigo-500' => $page->slug === $slug,
                ])
            >
                <a href="{{$page->url}}">
                    {{$page->title}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
