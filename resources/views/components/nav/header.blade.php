@php($headerItemClass = 'inline-flex px-6 py-3 lg:py-4 leading-none border border-white border-opacity-10 rounded-full lg:border-opacity-0 hover:border-white hover:border-opacity-50')

<header class="p-6 lg:p-12 top-0 z-10 lg:sticky">
    <div
        class="max-w-[64rem] mx-auto bg-bleak-purple bg-opacity-50 backdrop-blur-xl text-lg rounded-2xl shadow-large-drop lg:rounded-full">
        <div class="p-6 shadow-top-white rounded-2xl lg:rounded-full">

            <nav class="flex flex-wrap gap-4 w-full justify-between">

                <a class="flex align-middle flex-1 basis-1 lg:pl-4" href="#">
                    <img class="w-32" src="/images/ray-logo.svg" alt="Logo">
                </a>
                <ul class="flex gap-2 order-last w-full lg:order-none lg:w-auto">
                    <li><a class="{{ $headerItemClass }}" href="#">Docs</a></li>
                    <li><a class="{{ $headerItemClass }}" href="#">What's new</a></li>
                    <li><a class="{{ $headerItemClass }}" href="#">Blog</a></li>
                </ul>

                <ul class="flex-1 text-right">
                    <li>
                        <a class="inline-flex px-6 py-3 lg:py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light"
                            href="#">Buy license</a>
                    </li>
                </ul>

            </nav>

        </div>
    </div>
</header>
