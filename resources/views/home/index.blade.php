@php
    $testimonialCount = count($testimonials);
    $itemsPerColumn = ceil($testimonialCount / 4);
@endphp

<x-layouts.default
    title="A new home for your debug output"
    description="Send your dumps to Ray and work with them in a dedicated desktop app.">

    <div class="bg-gradient-to-b from-midnight to-midnight-extra-light border-b border-white border-opacity-15">

        <div class="absolute w-full translate-y-[-32%] pointer-events-none hidden md:block md:p-8">
            <img class="opacity-75 max-w-[90rem] mx-auto hidden md:block" src="/images/24-background-1.svg" alt="">
        </div>

        <div class="container mx-auto p-6 pb-12 lg:px-4 lg:pb-24">

            <div class="max-w-[54rem] mx-auto mb-12 text-center md:text-balance md:mb-24">

                <a class="btn-bright-purple-v inline-flex px-5 py-3 leading-none rounded-full font-bold shadow-top-white mb-4" href="http://">See what's new in Ray 3.0</a>

                <h1 class="font-display font-black text-6xl tracking-tight mb-[0.4em] md:text-8xl">A new home for
                    <span class="bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text">your debug output</span>
                </h1>
                <p class="text-2xl mb-8 md:mb-12 lg:text-3xl">
                    <span>Send your dumps to Ray and work with them in a dedicated desktop app.</span>
                </p>

                <x-download.cta :show-byline="true" :center-buttons="true" />

            </div>

            <x-animation />

            <div class="flex flex-col gap-6 items-center">
                <p class="text-2xl text-center font-bold">Debug using the same syntax <span class="md:block">across languages and frameworks</span></p>
                <ul class="flex flex-wrap gap-4 items-center justify-center md:gap-8">
                    <li><a class="block transition hover:opacity-50"
                            href="{{ route('docs.index') }}/php/laravel/installation">
                            <img class="w-16" src="/images/logos/logo_laravel_white.svg" alt="Laravel"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="{{ route('docs.index') }}/php/vanilla-php/installation">
                            <img class="w-16" src="/images/logos/logo_php_white.svg" alt="PHP"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="{{ route('docs.index') }}/javascript/vanilla-javascript/getting-started">
                            <img class="w-16" src="/images/logos/logo_js_white.svg" alt="JavaScript"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="{{ route('docs.index') }}/javascript/vuejs/getting-started">
                            <img class="w-16" src="/images/logos/logo_vue_white.svg" alt="Vue"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="{{ route('docs.index') }}/javascript/react/getting-started">
                            <img class="w-16" src="/images/logos/logo_react_white.svg" alt="React"></a></li>
                    <li><a class="block transition hover:opacity-50"
                            href="{{ route('docs.index') }}/php/wordpress/getting-started">
                            <img class="w-16" src="/images/logos/logo_wordpress_white.svg" alt="WordPress"></a></li>
                </ul>
                <a class="transition opacity-50 hover:opacity-100" href="{{ route('docs.index') }}/getting-started/integrations">&mldr; and more</a>
            </div>
        </div>

    </div>

    <div class="hidden lg:block absolute w-full pointer-events-none overflow-hidden -translate-y-1/2" style="height: 451px;">
        <svg class="mx-auto" width="1280" height="451" viewBox="0 0 1280 451" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M264.984 268.866L364.266 446.359L231.294 324.856L264.984 268.866Z" stroke="url(#paint0_linear_2125_4467)" stroke-width="1.57538" stroke-miterlimit="10"/>
            <path d="M1086.54 2.04748L1211.89 292.34L1178.85 45.9237L1086.54 2.04748Z" stroke="url(#paint1_linear_2125_4467)" stroke-width="1.57538" stroke-miterlimit="10"/>
            <path d="M7.80521 58.0042L256.392 162.444L10.3416 158.221L7.80521 58.0042Z" stroke="url(#paint2_linear_2125_4467)" stroke-width="1.57538" stroke-miterlimit="10"/>
            <defs>
                <linearGradient id="paint0_linear_2125_4467" x1="384.52" y1="405.087" x2="229.303" y2="328.915" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#34245C"/>
                    <stop offset="1" stop-color="#8E80B1"/>
                </linearGradient>
                <linearGradient id="paint1_linear_2125_4467" x1="1183.27" y1="48.0255" x2="1093.82" y2="236.219" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#34245C"/>
                    <stop offset="1" stop-color="#8E80B1"/>
                </linearGradient>
                <linearGradient id="paint2_linear_2125_4467" x1="249.177" y1="93.3117" x2="6.21371" y2="118.669" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#34245C"/>
                    <stop offset="1" stop-color="#8E80B1"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="border-b border-white border-opacity-10">
        <div class="container mx-auto py-12 px-6 md:py-24 lg:px-16">

            <x-intro.default
                title="The better way to dump()"
                text="Debug without breaking your flow or your app"
            />

            <div class="flex flex-col md:flex-row gap-8 md:gap-16" x-data="{ activeTab: 0 }">

                <ul class="text-lg order-2 md:order-1 md:max-w-[400px]">
                    <li :class="activeTab === 0 ? 'shadow-large-drop' : 'opacity-50'" class="transition hover:opacity-100 rounded-2xl">
                        <button @click="activeTab = 0" class="relative p-8 space-y-2 rounded-2xl text-left overflow-hidden w-full">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange to-bright-orange rounded-2xl transition-opacity duration-500 ease-in-out"
                                 :class="activeTab === 0 ? 'opacity-100' : 'opacity-0'"></div>
                            <div class="relative z-10 space-y-2">
                                <h3 class="font-display font-bold text-2xl">Beyond strings and arrays</h3>
                                <p :class="activeTab === 0 && 'font-bold'">Ray beautifully renders anything you send it, and supports Laravel, PHP, JavaScript and more. Try dumping queries, emails, events or stack traces!</p>
                            </div>
                        </button>
                    </li>
                    <li :class="activeTab === 1 ? 'shadow-large-drop' : 'opacity-50'" class="transition hover:opacity-100 rounded-2xl">
                        <button @click="activeTab = 1" class="relative p-8 space-y-2 rounded-2xl text-left overflow-hidden w-full">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange to-bright-orange rounded-2xl transition-opacity duration-500 ease-in-out"
                                 :class="activeTab === 1 ? 'opacity-100' : 'opacity-0'"></div>
                            <div class="relative z-10 space-y-2">
                                <h3 class="font-display font-bold text-2xl">Find and filter messages</h3>
                                <p :class="activeTab === 1 && 'font-bold'">Ray automatically labels your messages where useful, and lets you filter by type, origin, or custom label to instantly search through all your messages.</p>
                            </div>
                        </button>
                    </li>
                    <li :class="activeTab === 2 ? 'shadow-large-drop' : 'opacity-50'" class="transition hover:opacity-100 rounded-2xl">
                        <button @click="activeTab = 2" class="relative p-8 space-y-2 rounded-2xl text-left overflow-hidden w-full">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange to-bright-orange rounded-2xl transition-opacity duration-500 ease-in-out"
                                 :class="activeTab === 2 ? 'opacity-100' : 'opacity-0'"></div>
                            <div class="relative z-10 space-y-2">
                                <h3 class="font-display font-bold text-2xl">Extend and customize</h3>
                                <p :class="activeTab === 2 && 'font-bold'">Customize how messages are displayed, extend Ray using macros, or build your own client to send data from languages or frameworks Ray doesn't support yet.</p>
                            </div>
                        </button>
                    </li>
                </ul>

                <div class="w-full flex rounded-3xl overflow-hidden shadow-large-drop order-1 md:order-2">
                    <div class="relative w-full bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white max-md:aspect-square">
                        <div class="absolute inset-3 px-3 z-10 overflow-hidden md:px-12" x-ref="carousel">
                            <div class="flex flex-col transition-transform duration-700 ease-in-out h-full"
                                 :style="`transform: translateY(calc(-${activeTab} * ${$refs.carousel?.clientHeight || 0}px))`">
                                <div class="flex-shrink-0" :style="`height: ${$refs.carousel?.clientHeight || 0}px`">
                                    <img src="/images/screenshots/screen_home_test_2.png" alt="" class="w-full h-full object-contain mt-4">
                                </div>
                                <div class="flex-shrink-0" :style="`height: ${$refs.carousel?.clientHeight || 0}px`">
                                    <img src="/images/screenshots/screen_home_test_3.png" alt="" class="w-full h-full object-contain mt-4">
                                </div>
                                <div class="flex-shrink-0" :style="`height: ${$refs.carousel?.clientHeight || 0}px`">
                                    <img src="/images/screenshots/screen_home_test_4.png" alt="" class="w-full h-full object-contain mt-4">
                                </div>
                            </div>
                        </div>
                        <img src="/images/ray_desktop_bg.jpg" class="w-full h-full object-cover rounded-xl overflow-hidden" alt="">
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container mx-auto py-12 px-6 md:py-24 lg:px-16">

        <div class="max-w-prose mx-auto mb-8 md:mb-16 text-center">
            <h2 class="font-display font-bold text-4xl/[1.15] text-balance">Some cool things Ray can do</h2>
        </div>

        <div class="grid gap-12 mx-auto mb-8 lg:mb-12 lg:grid-cols-3">
            @foreach ($features as $feature)
                @if ($feature->link)
                    <a href="{{ $feature->link }}" class="bg-bleak-purple-dark/50 rounded-2xl overflow-hidden flex-1 shadow-top-white transition hover:bg-bleak-purple-dark relative">
                        <div class="p-8 py-12 space-y-2 md:text-center">
                            <h3 class="font-display font-bold text-xl md:text-2xl">{{ $feature->title }}</h3>
                            <p class="text-xl text-white text-opacity-50">{{ $feature->description }}</p>
                            @if ($feature->isNew)
                                <div class="top-0 left-0 !m-0 pt-4 md:p-4 md:absolute">
                                    <span class="bg-gradient-to-r from-bright-purple/60 to-bright-purple-light/40 text-white text-xs font-bold px-3 py-1 rounded-full">New in Ray 3.0</span>                                </div>
                            @endif
                        </div>
                        <div class="absolute top-0 right-0 p-4">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                <path d="M11.25 2.25H15.75V6.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 10.5L15.75 2.25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 9.75V14.25C13.5 14.6478 13.342 15.0294 13.0607 15.3107C12.7794 15.592 12.3978 15.75 12 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V6C2.25 5.60218 2.40804 5.22064 2.68934 4.93934C2.97064 4.65804 3.35218 4.5 3.75 4.5H8.25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                        </div>
                    </a>
                @else
                    <div class="bg-bleak-purple-dark/50 rounded-2xl overflow-hidden flex-1 shadow-top-white relative">
                        <div class="p-8 py-12 space-y-2 md:text-center">
                            <h3 class="font-display font-bold text-xl md:text-2xl">{{ $feature->title }}</h3>
                            <p class="text-xl text-white text-opacity-60">{{ $feature->description }}</p>
                            @if ($feature->isNew)
                                <div class="top-0 left-0 !m-0 pt-4 md:p-4 md:absolute">
                                    <span class="bg-gradient-to-r from-bright-purple/60 to-bright-purple-light/40 text-white text-xs font-bold px-3 py-1 rounded-full">New in Ray 3.0</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="flex justify-center">
            <a wire:navigate class="btn-bright-purple-v inline-flex px-6 py-4 leading-none rounded-full font-bold shadow-top-white"
                href="{{ route('docs.index') }}">Explore our docs for more</a>
        </div>

    </div>

    <div class="bg-bright-purple p-6 lg:py-24 border-b border-t border-white border-opacity-15">

        <div class="absolute pointer-events-none overflow-hidden inset-0 opacity-75">
            <img class="w-[85rem] max-w-none p-0 mx-auto md:p-8 -translate-y-2/4 top-2/4"
                src="/images/24-background-1.svg" />
        </div>

        <div class="bg-midnight lg:max-w-prose mx-auto border border-bleak-purple-light rounded-md shadow-large-drop">
            <div class="flex items-center px-3 gap-2 bg-white bg-opacity-10 h-8 border-b border-bleak-purple-light">
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <div class="bg-bleak-purple-extra-light rounded-full w-3 h-3"></div>
                <span class="absolute left-0 w-full text-center text-sm text-white text-opacity-50 font-bold">LoveLetter.md</span>
            </div>
            <div class="p-8 lg:p-12">
                <h2 class="font-display font-black text-3xl leading-[1] mb-[0.5em] text-balance md:text-5xl">A love letter to
                    <span class="bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text pb-1 md:block">dump debugging</span>
                </h2>
                <div class="text-lg leading-snug mb-8 space-y-3">
                    <p>Dump debugging has always been a valid way to debug and figure out your code. It’s fast, obvious, and requires no setup. For many developers, that simplicity is hard to beat.</p>
                    <p>Ray keeps the instant feedback of writing <code class="text-[0.9em] text-[#c1a8ff]">console.log()</code> and <code class="text-[0.9em] text-[#c1a8ff]">dd()</code>, but moves your output out of the browser and into a dedicated app. We added lots of useful methods for different languages and frameworks, which all use the same syntax.</p>
                    <p>Ray is simple to extend and customise to suit your workflow, and has inspired our community to build support for many languages and frameworks.</p>
                    <p>We love using Ray and we hope you will too.</p>
                </div>
                <div class="flex gap-6 items-center mb-0">
                    <img class="rounded-full w-16"
                        src="https://2.gravatar.com/avatar/874805999527de531a64edc2a0e416a1349ae32cb6e87edaa8c4acbd8dd85819?size=256"
                        alt="Freek">
                    <div class="leading-none">
                        <p class="text-lg font-bold">Freek Van der Herten</p>
                        <p class="text-white text-opacity-50">Owner of Spatie and proud dump debugger</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto p-6 md:py-24 md:pb-0 lg:px-6">

        <x-intro.default title="Nice words from our users" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
            x-bind:class="!testimonialsOpen && 'max-h-[45rem] overflow-hidden'" x-data="{ testimonialsOpen: false }">
            @for ($i = 0; $i < 4; $i++)
                <div class="flex flex-col gap-6">
                    @foreach ($testimonials->slice($i * $itemsPerColumn, $itemsPerColumn) as $testimonial)
                        <div
                            class="rounded-xl bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] overflow-hidden grow-0">
                            <div class="rounded-xl bg-bleak-purple-dark p-8">
                                <div class="flex gap-6 items-center mb-6">
                                    <img class="rounded-full w-16"
                                        src="/images/testimonials/{{ $testimonial->image }}.jpg"
                                        alt="{{ $testimonial->name }}">
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

            <div class="bg-gradient-to-b from-transparent to-midnight flex w-full h-3/6 absolute bottom-0 items-end"
                x-bind:class="testimonialsOpen && 'hidden'">
                <div class="flex w-full justify-center">
                    <button
                        class="btn-bright-purple-v inline-flex px-6 py-4 leading-none rounded-full font-bold shadow-top-white"
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
