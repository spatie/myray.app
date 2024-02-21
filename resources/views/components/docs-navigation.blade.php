<nav class="docs-navigation" x-data="{ navOpen: false }" x-on:livewire:navigated.window="navOpen = false">
    <button @click="navOpen = !navOpen" class="block lg:hidden w-full bg-white border-b px-5 py-4 text-left font-semibold text-base flex justify-between items-center">
        <span>Contents</span>

        <i class="fa fa-thin fa-angle-up" x-bind:class="! navOpen ? 'rotate-180' : ''"></i>
    </button>

    <div class="p-5 pb-0 lg:p-8 lg:pb-0">
        @livewire('doc-search')
    </div>

    <ul class="bg-white p-5 lg:p-8 border-b lg:border-none" x-bind:class="! navOpen ? 'hidden lg:block' : ''">
        @foreach($navigation->categories as $key => $category)
            <li>
                @include('partials.docs.navigation-category', ['category' => $category])
            </li>
        @endforeach
    </ul>
</nav>
