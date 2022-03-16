<footer class="mt-24 md:mt-36 pb-12">
    <div class="
            flex items-baseline justify-between
            mx-auto pt-12 px-6 sm:px-12 md:px-16
            bg-gray-50 md:bg-white
            max-w-4xl
        ">

        <div class="hidden md:block">
            <a class="block w-32" href="/">
                @include('partials.logoRay')
            </a>
            <p class="mt-2 font-semibold opacity-75">Understand and fix bugs faster</p>
        </div>

        <nav>
            <ul class="grid gap-4 justify-end md:grid-flow-col md:gap-8
                font-semibold">
                <li><a class="markup-link" href="{{ route("privacy") }}">Privacy</a></li>
                <li><a class="markup-link" href="{{ route("termsOfUse") }}">Terms of Use</a></li>
                <li><a class="block w-16
                hover:text-spatie
                transition-colors duration-300" href="{{spatieUrl()}}">
                    @include('partials.logoSpatie')
                </a></li>
            </ul>
        </nav>

    </div>
</footer>
