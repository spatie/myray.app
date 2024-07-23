@php($headerItemClass = 'transition inline-flex px-4 py-3 leading-none border border-white border-opacity-10 rounded-full lg:border-opacity-0 lg:py-4 lg:px-6 hover:border-white hover:border-opacity-50')

<header id="header" {{ $attributes->twMerge("p-6 lg:p-12 top-0 z-10") }}>
    <div
        class="max-w-[64rem] mx-auto bg-bleak-purple bg-opacity-50 backdrop-blur-xl text-base rounded-2xl shadow-large-drop lg:text-lg lg:rounded-full">
        <div class="p-6 shadow-top-white rounded-2xl lg:rounded-full">

            <nav class="flex flex-wrap gap-4 w-full justify-between">

                <a class="flex align-middle flex-1 basis-1 lg:pl-4" href="/">
                    <img class="w-32" src="/images/ray-logo.svg" alt="Logo">
                </a>
                <ul class="flex gap-2 order-last w-full lg:order-none lg:w-auto">
                    <li><a class="{{ $headerItemClass }}" href="{{ route('docs.index') }}">Docs</a></li>
                    <li><a class="{{ $headerItemClass }}" href="#">What's new</a></li>
                    <li><a class="{{ $headerItemClass }}" href="{{ route('blog') }}">Blog</a></li>
                </ul>

                <ul class="flex-1 text-right">
                    <li>
                        <a class="inline-flex px-6 py-3 lg:py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light"
                            href="{{ spatieUrl('https://spatie.be/products/ray') }}">Buy license</a>
                    </li>
                </ul>

            </nav>

        </div>
    </div>
</header>
