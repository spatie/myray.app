<nav class="docs-navigation" x-data="{navOpen: false}">
    <button @click="navOpen = !navOpen" class="block md:hidden w-full bg-white border-b px-5 py-4 text-left font-semibold text-base flex justify-between items-center">
        <span>Contents</span>

        <i class="fa fa-thin fa-angle-up" x-bind:class="! navOpen ? 'rotate-180' : ''"></i>
    </button>

    <ul class="bg-white p-5 md:p-8 border-b md:border-none" x-bind:class="! navOpen ? 'hidden md:block' : ''">
        @foreach($navigation->categories as $key => $category)
            <li>
                @include('partials.docs.navigation-category', ['category' => $category])
            </li>
        @endforeach
    </ul>
</nav>
