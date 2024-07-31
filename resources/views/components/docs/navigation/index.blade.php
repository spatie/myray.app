<nav class="w-full rounded-2xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-[1px] lg:top-6 lg:sticky docs-sidebar" x-data="{ navOpen: false }"
    x-on:livewire:navigated.window="navOpen = false">
    @persist('scrollbar')
    <div class="bg-midnight rounded-2xl docs-sidebar-contents" wire:scroll>

        <div class="p-6 border-b border-white border-opacity-10 z-10 lg:bg-midnight lg:bg-opacity-80 lg:sticky lg:top-0">
            <button @click="showSearchBox = true"
                class="transition-border border border-white border-opacity-20 rounded-full py-3 px-4 w-full hover:border-opacity-50">
                <div class="flex items-center">
                    <x-icons.search />
                    <span class="opacity-70 text-sm ml-2">Click to search</span>
                </div>
            </button>
        </div>

        <button @click="navOpen = !navOpen"
            class="p-6 w-full text-left font-semibold text-lg flex justify-between items-center lg:hidden">
            <span>Table of contents</span>
            <span class="w-6" x-bind:class="navOpen && 'rotate-180'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 15 15"><path stroke="#fff" stroke-linecap="square" d="m4.5 6.5 3 3 3-3"/></svg>
            </span>
        </button>

        <ul class="p-6 pt-0 mt-0 lg:pt-6" x-bind:class="!navOpen ? 'hidden lg:block' : ''">
            @foreach ($navigation->categories as $key => $category)
                <li class="mb-6">
                    <x-docs.navigation.category :category="$category" />
                </li>
            @endforeach
        </ul>
    </div>
    @endpersist()
</nav>
