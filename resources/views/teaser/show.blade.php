@php
    $disclaimer = '
        <p>You need an <a href="' . spatieUrl('https://spatie.be/products/ray') . '" class="underline text-white text-opacity-90 hover:text-opacity-100">existing Ray license</a> to use the beta version.</p>
        <p>By downloading Ray, you agree to our <a href="' . route('legal.terms') . '" class="underline text-white text-opacity-90 hover:text-opacity-100">terms of use</a>.</p>
    ';
@endphp

<x-layouts.default
    title="Power up your debugging"
    description="Send, format and, filter all your debug output in Ray, now fully rebuilt for speed. Download the beta now."
    downloadTitle="Test the next version of Ray"
    :image="asset('/images/ray-beta-og.jpg')"
    :downloadDisclaimer="$disclaimer"
    :showHeader="false"
    :showCta="false"
    :showFooter="false"
>

    <header class="relative max-w-[64rem] mx-auto mt-8 mb-0 z-10 p-6 md:mt-16">
        <div class="flex flex-wrap gap-4 w-full justify-center items-center">
            <img class="w-48 md:w-64" src="/images/ray3-logo.svg">
            <span class="badge-purple">Beta</span>
        </div>
    </header>

    <div class="bg-gradient-to-b from-midnight to-midnight-extra-light border-b border-white border-opacity-15">

        <div class="absolute w-full translate-y-[-35%] pointer-events-none md:p-8">
            <img class="opacity-75 max-w-[90rem] mx-auto hidden md:block" src="/images/24-background-1.svg" alt="">
            <img class="opacity-75 mx-auto md:hidden" src="/images/24-background-1-m.svg" alt="">
        </div>

        <div class="container mx-auto p-6 pb-12 lg:px-4 lg:pb-24">

            <div class="max-w-[54rem] mx-auto mb-12 text-center md:text-balance md:mb-20">

                <h1 class="font-display font-black text-6xl tracking-tight mb-[0.5em] md:text-8xl">
                    <span class="bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text">Power up</span>
                    your debugging
                </h1>
                <p class="text-xl mb-8 lg:text-2xl">
                    <span class="inline md:block">Send, format and, filter all your debug output in Ray,</span>
                    <span>now fully rebuilt for speed.</span>
                </p>

                <div class="flex flex-col gap-4 justify-start md:items-center">
                    <div class="shadow-small-drop">
                        <x-download.button button="Download beta" />
                    </div>
                    <p class="text-bleak-purple-extra-light">You need an <a class="text-white underline hover:no-underline" href="{{ spatieUrl('https://spatie.be/products/ray') }}" target="_blank">existing Ray license</a> <br /> to use the beta version.</p>
                </div>
            </div>

            <x-animation />

            <div class="flex flex-col gap-6 items-center">
                <h3 class="text-2xl font-display font-bold">Ray has great support for</h3>
                <ul class="text-xl flex flex-wrap gap-4 justify-center items-center md:gap-8">
                    <li><a class="block transition hover:opacity-50"
                            href="https://myray.app/docs/php/laravel/installation"><img
                                class="w-16" src="/images/logos/logo_laravel_white.svg" alt="Laravel"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="https://myray.app/docs/php/vanilla-php/installation"><img
                                class="w-16" src="/images/logos/logo_php_white.svg" alt="PHP"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="https://myray.app/docs/javascript/vanilla-javascript/getting-started"><img
                                class="w-16" src="/images/logos/logo_js_white.svg" alt="JavaScript"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="https://myray.app/docs/javascript/vuejs/getting-started"><img
                                class="w-16" src="/images/logos/logo_vue_white.svg" alt="Vue"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="https://myray.app/docs/javascript/react/getting-started"><img
                                class="w-16" src="/images/logos/logo_react_white.svg" alt="React"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="https://myray.app/docs/php/wordpress/getting-started"><img
                                class="w-16" src="/images/logos/logo_wordpress_white.svg" alt="WordPress"></a></li>
                    <li class="transition text-white text-opacity-50 hover:text-opacity-100"><a
                            href="{{ route('docs.index') }}/getting-started/integrations">&mldr; and more</a></li>
                </ul>
            </div>
        </div>

    </div>

    <div class="container mx-auto p-12 !pb-0 md:py-24 lg:px-16">

        <x-intro.default
            title="New in Ray 3.0"
            text="Now a lot faster and better looking, but we promise it’s not a midlife crisis."
        />

        <div class="grid gap-4 mx-auto mb-8 lg:mb-12 lg:grid-cols-2">

            <div class="col-span-2 bg-bleak-purple-dark rounded-2xl overflow-hidden flex flex-col xl:flex-row">
                <div class="p-8 space-y-3 md:p-12">
                    <h3 class="font-display font-bold text-xl xl:text-3xl">Archive your messages</h3>
                    <p class="text-xl text-white text-opacity-50">Instead of losing your logs when you clear your Ray window, save them. The new message archive stores all your logs, from any local or remote project, on disk.</p>
                </div>
                <div class="p-4 pt-0 pb-0 max-h-40 md:max-h-72 xl:pt-6">
                    <img class="w-full" src="/images/app/app_window_teaser.png" alt="">
                </div>
            </div>

            <div class="col-span-2 bg-bleak-purple-dark rounded-2xl overflow-hidden flex-wrap md:col-span-1">
                <div class="p-8 space-y-3 md:p-12">
                    <h3 class="font-display font-bold text-xl md:text-3xl">Better performance</h3>
                    <p class="text-xl text-white text-opacity-50">Rebuilt for speed, Ray 3.0 works and loads a lot faster. No more lag when you’re dumping 1,000 logs at once.</p>
                </div>
                <div class="absolute inset-0 h-[480px] hidden md:block pointer-events-none">
                    <img class="w-full object-cover object-top h-[inherit]" src="/images/teaser_performance_bg.png" alt="">
                </div>
            </div>

            <div class="col-span-2 bg-bleak-purple-dark rounded-2xl overflow-hidden flex-wrap md:col-span-1">
                <div class="p-8 space-y-3 md:p-12">
                    <h3 class="font-display font-bold text-xl md:text-3xl">Fresh new look</h3>
                    <p class="text-xl text-white text-opacity-50">Ray has a cool new design that feels great in dark or light mode, with more themes coming soon.</p>
                    <div class="flex gap-4 !mt-6">
                        <img class="flex-1 w-full" src="/images/teaser_preview_dark.png" alt="Dark mode">
                        <img class="flex-1 w-full" src="/images/teaser_preview_light.png" alt="Dark mode">
                    </div>
                </div>
            </div>

        </div>

        <div class="max-w-md mx-auto py-12 md:py-16 lg:pb-0">
            <x-form.newsletter />
        </div>

    </div>

    <div class="container mx-auto p-2 pb-12 lg:py-24 lg:px-16">

        <x-cta.large
            description="Ray helps every developer become a better debugger. Help us improve the next version of Ray by testing the beta release."
            downloadBtn="Download beta"
            :showBuyBtn="false"
        />

        <footer class="flex flex-col gap-12 items-center">
            <nav>
                <ul class="flex gap-6">
                    <li>
                        <a class="text-lg font-bold hover:underline" href="https://myray.app/terms-of-use" target="_blank">Terms of use</a>
                    </li>
                    <li>
                        <a class="text-lg font-bold hover:underline" href="https://myray.app/privacy" target="_blank">Privacy policy</a>

                    </li>
                    <li>
                        <button class="text-lg js-confetti" href="#">🎉</button>
                    </li>
                </ul>
            </nav>
            <a class="hover:opacity-90" href="https://spatie.be/?ref=myray.app" target="_blank">
                <img class="h-12" src="/images/spatie.svg" alt="Spatie">
            </a>
        </footer>

    </div>

</x-layouts.default>
