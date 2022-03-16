<header>
    <nav class="
        mx-auto px-6 sm:px-12 md:px-16 pt-8 pb-16
        max-w-4xl
        flex items-center justify-between

    ">
        <div class="sm:flex items-center">
            <div>
                <span class="absolute -bottom-6 left-3 text-indigo-800 text-opacity-50 font-normal text-px-xs">
                    {{-- By <a class="hover:underline" href="{{spatieUrl()}}">Spatie</a>--}}
                    <a href="https://spatie.be/products/ray/release-notes" class="flex items-center bg-purple-100 rounded-sm text-black px-3 pt-4 pb-2 whitespace-nowrap">
                        <span><strong>Version 2.0</strong> just released!</span>
                    </a>
                </span>
                <a class="block w-20" href="/">
                    @include('partials.logoRay')
                </a>
            </div>
           
        </div>

        <ul class="
        grid grid-flow-col gap-8
        font-semibold">
            <li><a class="markup-link" href="{{spatieUrl('https://spatie.be/docs/ray')}}">Docs</a></li>
            <li><a class="markup-link" href="{{spatieUrl('https://spatie.be/products/ray')}}">Buy</a></li>
            <li><a class="hover:text-indigo-500
                transition-colors duration-300" title="GitHub" href="https://github.com/spatie/ray/"><i class="fab fab fa-github"></i></a></li>
        </ul>
    </nav>
</header>
