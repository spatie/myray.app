<nav class="docs-navigation p-8">
    <ul>
        @foreach($navigation->topCategory->subCategories as $key => $category)
            <li>
                @include('partials.docs.navigation-category', ['category' => $category])
            </li>
        @endforeach
    </ul>
</nav>
