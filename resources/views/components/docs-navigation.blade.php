<div>
    <h2>Navigation</h2>

    <ul>
        @foreach($navigation->topCategory->subCategories as $key => $category)
            <li>
                @include('partials.docs.navigation-category', ['category' => $category])
            </li>
        @endforeach
    </ul>
</div>
