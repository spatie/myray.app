@props(['title', 'description'])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="$title" :description="$description" />
</head>

<body class="antialiased overflow-x-hidden" x-data="{ showSearchBox: false }" @keydown.cmd.k.window.prevent="showSearchBox = true">

    <div class="absolute w-full pointer-events-none">
        <div class="bg-gradient-to-b from-midnight-extra-light to-midnight md:flex md:justify-center">
            <div class="w-full translate-y-[-18rem]">
                <img class="opacity-20 max-w-[90rem] mx-auto" src="/images/24-background-3.svg" alt="">
            </div>
        </div>
    </div>

    <x-nav.header />

    <main class="container mx-auto p-6 md:py-24 lg:px-16 md:pt-0" x-data="{ download: false }">

        <div class="gap-12 mb-24 lg:flex">
            <div class="w-full mb-8 lg:max-w-80" wire:scroll>
                <x-docs-navigation></x-docs-navigation>
            </div>

            <div class="w-full min-w-0 flex-1">
                {{ $slot }}
            </div>
        </div>

        <x-cta.large />
        <x-nav.footer />

        <x-download.template />

    </main>

    {{-- <div class="relative">
        <div class="absolute right-0 -top-4">
            <x-docs.ornament />
        </div>

        <div class="lg:flex">
            @persist('scrollbar')
                <div class="border-r border-gray-200 sticky top-0 lg:h-screen overflow-y-scroll" wire:scroll>
                    <x-docs-navigation></x-docs-navigation>
                </div>
            @endpersist

            <section class="page-content lg:w-full p-5 lg:p-14 lg:pb-24">
                {{ $slot }}

                <div class="absolute hidden md:block right-0 bottom-24">
                    <x-docs.ornament />
                </div>
            </section>
        </div>
    </div> --}}

    @livewire('doc-search')

    <script>
        document.addEventListener('alpine:init', () => {
            let state = Alpine.reactive({
                path: window.location.pathname
            });

            function strip(path) {
                parts = path.replace(/https?:\/\//, '').split('/');
                parts.shift();

                return parts.join('/');
            }

            function section(path) {
                parts = path.split('/');
                parts.pop();

                return parts.join('/');
            }

            let scrollPosition = 0;

            document.addEventListener('livewire:navigating', () => {
                scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
            });

            document.addEventListener('livewire:navigated', () => {
                try {
                    if (window.location.hash) {
                        setTimeout(() => {
                            document.getElementById(window.location.hash.replace('#', ''))
                                .scrollIntoView();
                        });
                    }
                } catch (e) {
                    console.error(e);
                } 

                queueMicrotask(() => {
                    state.path = window.location.pathname;
                });
            });

            Alpine.magic('current', (el) => (expected = '') => {
                return strip(state.path) === strip(expected);
            });

            Alpine.magic('currentSection', (el) => (expected = '') => {
                return section(strip(state.path)) === section(strip(expected));
            });
        });
    </script>
</body>

</html>