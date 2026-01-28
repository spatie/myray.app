@props(['description' => 'Ray keeps all your debug output neatly organized in a dedicated desktop app.', 'downloadBtn' => null, 'showBuyBtn' => true])

<div data-no-index class="rounded-xl bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] shadow-large-drop overflow-hidden mb-12 lg:mb-20">
    <div
        class="flex flex-col lg:flex-row items-center gap-12 p-12 overflow-hidden bg-gradient-to-b from-midnight to-midnight-extra-light rounded-xl lg:gap-24 lg:p-24 lg:pr-0">

        <div class="absolute pointer-events-none overflow-hidden h-screen inset-0 opacity-75">
            <img class="w-[85rem] max-w-none p-0 mx-auto md:top-[-10rem]" src="/images/24-background-4.svg" />
        </div>

        <div class="lg:shrink-0 space-y-8 lg:text-center">
            <div class="lg:max-w-[34rem]">
                <h2 class="font-display font-black text-5xl tracking-tight mb-[0.4em] md:text-6xl">
                    Debug without <span class="bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text">breaking your flow</span>
                </h2>
                <p class="text-2xl leading-tight mb-8">{{ $description }}</p>
            </div>

            <x-download.cta :show-byline="true" />
        </div>

        <div class="shrink-0 lg:w-[45rem] shadow-large-drop rounded-3xl overflow-hidden">
            <div
                class="rounded-3xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white">
                <div class="rounded-xl overflow-hidden">
                    <img src="/images/screenshots/screen_cta.png" alt="">
                </div>
            </div>
        </div>

    </div>
</div>
