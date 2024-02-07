<div class="navigation-category" x-data="{ open: {{\Illuminate\Support\Str::contains($slug, $category->slug) ? 'true' : 'false'}} }">
    @ray($category)

    <strong class="cursor-pointer" @click="open = !open">{{$category->title}}</strong>
    <ul x-show="open">
        @foreach($category->subCategories as $subCategory)
            <li>
                @include('partials.docs.navigation-sub-category', ['category' => $subCategory])
            </li>
        @endforeach
        @foreach($category->pages as $page)
            <li>
                <a href="{{$page->url}}">
                    {{$page->title}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
