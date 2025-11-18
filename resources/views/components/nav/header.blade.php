@php $headerItemClass = 'transition inline-flex px-4 py-3 leading-none bg-white bg-opacity-0 border border-white border-opacity-10 rounded-full lg:border-opacity-0 lg:py-4 lg:px-6 hover:border-white hover:border-opacity-20' @endphp

<header id="header" {{ $attributes->twMerge("p-6 lg:p-12 top-0 z-20") }}>
    <div
        class="max-w-[64rem] mx-auto bg-bleak-purple bg-opacity-50 backdrop-blur-xl text-base rounded-2xl shadow-large-drop lg:text-lg lg:rounded-full">
        <div class="p-6 shadow-top-white rounded-2xl lg:rounded-full">

            <nav class="flex flex-wrap gap-4 w-full justify-between">

                <a class="flex align-middle flex-1 basis-1 lg:pl-4 group" href="/" wire:navigate>
                    <img class="w-32 group-active:scale-95" src="/images/ray-logo.svg" alt="Logo">
                </a>
                <ul class="flex gap-2 order-last w-full lg:order-none lg:w-auto">
                    <li><a wire:navigate class="{{ $headerItemClass }} @if (Request::is('docs*')) {{'!bg-opacity-10'}} @endif" href="{{ route('docs.index') }}">Docs</a></li>
                    <li><a wire:navigate class="{{ $headerItemClass }} @if (Request::is('changelog')) {{'!bg-opacity-10'}} @endif" href="{{ route('changelog') }}">What's new</a></li>
                    <li><a wire:navigate class="{{ $headerItemClass }} @if (Request::is('blog*')) {{'!bg-opacity-10'}} @endif" href="{{ route('blog.index') }}">Blog</a></li>
                </ul>

                <ul class="flex-1 text-right">
                    <li>
                        <a class="btn-bright-purple-v inline-flex px-6 py-3 lg:py-4 leading-none rounded-full font-bold shadow-top-white whitespace-nowrap"
                            href="{{ spatieUrl('https://spatie.be/products/ray') }}">Buy license</a>
                    </li>
                </ul>

            </nav>

        </div>
    </div>
</header>
