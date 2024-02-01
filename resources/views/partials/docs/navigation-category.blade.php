<strong>{{$category->title}}</strong>
<ul>
    @foreach($category->subCategories as $subCategory)
        <li>
            @include('partials.docs.navigation-category', ['category' => $subCategory])
        </li>
    @endforeach
    @foreach($category->pages as $page)
        <li>{{$page->title}}</li>
    @endforeach
</ul>
