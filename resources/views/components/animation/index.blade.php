<div class="flex flex-wrap gap-8 mb-12 justify-center max-w-[1440px] mx-auto md:mb-24 md:gap-16 js-animation">

    <div class="hidden flex-1 max-w-[30rem] z-20 lg:block max-xl:absolute max-xl:-top-12 max-xl:right-12 max-xl:min-w-[480px]">
        <div
            class="bg-midnight bg-opacity-75 border border-bleak-purple-light rounded-md shadow-large-drop backdrop-blur-sm">
            <div
                class="flex items-center px-3 gap-2 bg-white bg-opacity-10 h-8 border-b border-bleak-purple-light">
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <span class="absolute left-0 w-full text-center text-sm text-white text-opacity-50 font-bold">TestCommand.php &mdash; Editor</span>
                <button class="absolute right-0 py-2 px-2 text-sm text-white/50 hover:text-white transition-colors js-anim-load">
                    <svg class="w-4 h-4 js-anim-load-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/>
                        <path d="M21 3v5h-5"/>
                    </svg>
                </button>
            </div>
            <div class="p-6 md:p-8">
                <x-animation.code />
            </div>
        </div>
    </div>

    <div class="w-full shadow-large-drop rounded-3xl order-first flex-1 lg:order-last xl:mt-28">
        <div
            class="rounded-3xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white">
                <x-animation.window />
        </div>
    </div>

</div>
