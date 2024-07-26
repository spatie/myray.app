@php
    $testimonialCount = count($testimonials);
    $itemsPerColumn = ceil($testimonialCount / 4);
@endphp

<x-layouts.default title="Ray lets you debug and fix bugs faster"
    description="Send, format, and filter debug info from local and remote projects. Ray collects all your debugging output in a neat desktop app.">

    <div class="bg-gradient-to-b from-midnight to-midnight-extra-light border-b border-white border-opacity-15">

        <div class="absolute w-full translate-y-[-35%] pointer-events-none md:p-8">
            <img class="opacity-75 max-w-[90rem] mx-auto hidden md:block" src="/images/24-background-1.svg" alt="">
            <img class="opacity-75 mx-auto md:hidden" src="/images/24-background-1-m.svg" alt="">
        </div>

        <div class="container mx-auto p-6 pb-12 lg:px-4 lg:pb-24">

            <div class="max-w-[54rem] mx-auto mb-12 md:text-balance md:text-center md:mb-24">
                <h1 class="font-display font-black text-5xl tracking-tight mb-[0.25em] md:text-7xl">The debugger that
                    lets you
                    <span class="bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text">fix
                        bugs
                        faster</span>
                </h1>
                <p class="text-xl mb-8 lg:text-2xl">Send, format, and filter debug info from local and remote projects.
                    Ray collects
                    all
                    your debugging
                    output in a neat desktop app.</p>

                <div class="flex flex-wrap gap-4 items-center justify-start md:justify-center">
                    <div class="shadow-small-drop">
                        <x-download.button />
                    </div>
                    <div class="shadow-small-drop">
                        <a class="transition inline-block text-xl px-6 py-4 font-bold rounded-md shadow-top-white bg-bleak-purple bg-opacity-50 hover:bg-opacity-80"
                            href="{{ spatieUrl('https://spatie.be/products/ray') }}">Buy now for &euro;49</a>
                    </div>
                </div>
            </div>

            <x-animation />

            <div class="flex flex-col gap-4 md:items-center ">
                <p>Works great with</p>
                <ul class="flex flex-wrap gap-4 items-center md:gap-8">
                    <li><a class="block transition hover:opacity-50" href="{{ route('docs.index') }}/php/laravel/installation"><img src="/images/logos/logo_laravel_white.svg"
                                alt="Laravel"></a></li>
                    <li><a class="block transition hover:opacity-50" href="{{ route('docs.index') }}/php/vanilla-php/installation"><img src="/images/logos/logo_php_white.svg"
                                alt="PHP"></a></li>
                    <li><a class="block transition hover:opacity-50" href="{{ route('docs.index') }}/javascript/vanilla-javascript/getting-started"><img src="/images/logos/logo_js_white.svg"
                                alt="JavaScript"></a></li>
                    <li><a class="block transition hover:opacity-50" href="{{ route('docs.index') }}/javascript/vuejs/getting-started"><img src="/images/logos/logo_vue_white.svg"
                                alt="Vue"></a></li>
                    <li><a class="block transition hover:opacity-50" href="{{ route('docs.index') }}/javascript/react/getting-started"><img src="/images/logos/logo_react_white.svg"
                                alt="React"></a></li>
                    <li><a class="block transition hover:opacity-50" href="{{ route('docs.index') }}/php/wordpress/getting-started"><img src="/images/logos/logo_wordpress_white.svg"
                                alt="WordPress"></a></li>
                    <li class="transition text-white text-opacity-50 hover:text-opacity-100"><a href="{{ route('docs.index') }}/getting-started/integrations">&mldr; and more</a></li>
                </ul>
            </div>
        </div>

    </div>

    <div class="border-b border-white border-opacity-10">
        <div class="container mx-auto p-6 md:py-24 lg:px-16">

            <x-intro.default title="A better way to dump()"
                text="Sed pretium, lacus nec accumsan commodo, diam tortor auctor ex, eu consectetur risus urna a ante." />

            <div>
                <div class="rounded-3xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white">
                    <div class="rounded-xl overflow-hidden">
                        <img src="https://images.placeholders.dev/?width=1920&height=1080" alt=""
                            srcset="">
                    </div>
                </div>
                <div class="flex flex-wrap flex-col lg:flex-row">
                    <div class="flex-1 px-0 py-6 lg:p-8">
                        <h3 class="font-display font-bold text-2xl">Send anything to Ray</h3>
                        <p class="text-lg">Strings, array, objects, … you can send anything to Ray. Etiam in placerat
                            nisl.
                            Aenean tempus at
                            varius commodo.</p>
                    </div>
                    <div class="flex-1 px-0 py-6 lg:p-8">
                        <h3 class="font-display font-bold text-2xl">Measure performance</h3>
                        <p class="text-lg">Suspendisse nisl tortor, porttitor eget molestie nec, commodo et odio. Nunc
                            commodo nisl id enim
                            semper.</p>
                    </div>
                    <div class="flex-1 px-0 py-6 lg:p-8">
                        <h3 class="font-display font-bold text-2xl">Remote debug over SSH</h3>
                        <p class="text-lg">Suspendisse nisl tortor, porttitor eget molestie nec, commodo et odio. Nunc
                            commodo nisl id enim
                            semper.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mx-auto p-6 md:py-24 lg:px-16">

        <div class="max-w-prose mx-auto mb-8 md:mb-16 md:text-center">
            <h2 class="font-display font-bold text-4xl">Ways Ray helps you debug code</h2>
        </div>

        <div class="grid gap-12 mx-auto mb-8 lg:mb-12 lg:grid-cols-2">
            @for ($i = 0; $i < 4; $i++)
                <div class="bg-bleak-purple-dark rounded-2xl overflow-hidden flex-1">
                    <div class="p-8 md:p-12">
                        <h3 class="font-display font-bold text-xl md:text-2xl">Feature</h3>
                        <p class="text-lg text-white text-opacity-50">Description</p>
                    </div>
                    <img class="w-full" src="https://images.placeholders.dev/?width=640&height=480" alt="Image">
                </div>
            @endfor
        </div>

        <div class="flex justify-center">
            <a class="inline-flex px-6 py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light"
                href="{{ route('docs.index') }}">Explore more features</a>
        </div>

    </div>

    <div class="bg-bright-purple p-6 lg:py-24 border-b border-t border-white border-opacity-15">

        <div class="absolute pointer-events-none overflow-hidden inset-0 opacity-75">
            <img class="w-[85rem] max-w-none p-0 mx-auto md:p-8 -translate-y-2/4 top-2/4"
                src="/images/24-background-1.svg" />
        </div>

        <div class="bg-midnight lg:w-[45rem] mx-auto border border-bleak-purple-light rounded-md shadow-large-drop">
            <div class="flex items-center px-3 gap-2 bg-white bg-opacity-10 h-8 border-b border-bleak-purple-light">
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
            </div>
            <div class="p-8 lg:p-12">
                <h2 class="font-display font-black text-3xl leading-[1] mb-[0.5em] text-balance md:text-5xl">A word
                    about
                    <span class="bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text">why we
                        built
                        Ray</span>
                </h2>
                <div class="text-lg leading-snug mb-8 *:mb-2">
                    <p>Every developer should feel comfortable using the tools they prefer. While tools like Xdebug are
                        powerful, they have steep learning curves and can get in your way when you just want to fix
                        problems
                        quickly.</p>
                    <p>Every developer should feel comfortable using the tools they prefer. While tools like Xdebug are
                        powerful, they have steep learning curves and can get in your way when you just want to fix
                        problems
                        quickly.</p>
                </div>
                <div class="flex gap-6 items-center mb-0">
                    <img class="rounded-full w-16" src="https://2.gravatar.com/avatar/874805999527de531a64edc2a0e416a1349ae32cb6e87edaa8c4acbd8dd85819?size=256"
                        alt="Freek">
                    <div class="leading-none">
                        <p class="text-lg font-bold">Freek Van der Herten</p>
                        <p class="text-white text-opacity-50">Owner of Spatie &amp; full-time dump debugger</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto p-6 md:py-24 md:pb-0 lg:px-6">

        <x-intro.default title="Love from the community"
            text="Sed pretium, lacus nec accumsan commodo, diam tortor auctor ex, eu consectetur risus urna a ante." />

        <div 
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" 
            x-bind:class="!testimonialsOpen && 'max-h-[45rem] overflow-hidden'" 
            x-data="{ testimonialsOpen: false }">
            @for ($i = 0; $i < 4; $i++)
                <div class="flex flex-col gap-6">
                    @foreach ($testimonials->slice($i * $itemsPerColumn, $itemsPerColumn) as $testimonial)
                        <div
                            class="rounded-xl bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] overflow-hidden grow-0">
                            <div class="rounded-xl bg-bleak-purple-dark p-8">
                                <div class="flex gap-6 items-center mb-6">
                                    <img class="rounded-full w-16"
                                        src="/images/testimonials/{{ $testimonial->image }}.jpg" alt="{{ $testimonial->name }}">
                                    <div class="leading-none">
                                        <p class="text-lg font-bold">{{ $testimonial->name }}</p>
                                        <p class="text-white text-opacity-50">{{ $testimonial->title }}</p>
                                    </div>
                                </div>
                                <p class="text-lg leading-tight ">{!! $testimonial->text !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor

            <div 
                class="bg-gradient-to-b from-transparent to-midnight flex w-full h-3/6 absolute bottom-0 items-end"
                x-bind:class="testimonialsOpen && 'hidden'">
                <div class="flex w-full justify-center">
                    <button
                        class="inline-flex px-6 py-4 leading-none rounded-full bg-gradient-to-b from-bright-purple-light to-bright-purple font-bold shadow-top-white hover:to-bright-purple-light"
                        @click="testimonialsOpen = !testimonialsOpen"> 
                        Show all reviews
                    </button>
                </div>
            </div>

        </div>

        <div class="max-w-md mx-auto py-12 md:py-16 lg:pb-0">
            <x-form.newsletter />
        </div>

    </div>

</x-layouts.default>
