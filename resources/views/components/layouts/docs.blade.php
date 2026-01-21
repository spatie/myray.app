@props(['title', 'description'])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="$title" :description="$description" :color="'#36107A'">
        @if (isset($schema))
            <x-slot:schema>{{ $schema }}</x-slot:schema>
        @endif
    </x-layouts.head>
</head>

<body class="overflow-x-hidden bottom-gradient" x-data="{ showSearchBox: false }" @keydown.cmd.k.window.prevent="showSearchBox = true">

    <div class="absolute w-full pointer-events-none">
        <div class="bg-gradient-to-b from-midnight-extra-light to-midnight md:flex md:justify-center">
            <div class="w-full translate-y-[-18rem]">
                <img class="opacity-20 max-w-[90rem] mx-auto" src="/images/24-background-3.svg" alt="">
            </div>
        </div>
    </div>

    <x-nav.header />

    <main x-data="{ download: false }">
        <div class="mx-auto p-6 md:py-24 md:pt-0 md:pb-0 lg:px-16 2xl:container">
            <div class="gap-12 mb-8 lg:flex">
                <div class="w-full mb-8 lg:max-w-80">
                    <x-docs-navigation />
                </div>

                <div class="w-full min-w-0 flex-1">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div class="container mx-auto p-2 pb-12 lg:py-24 lg:px-16">
            <x-cta.large />
            <x-nav.footer />
        </div>

        <x-download-modal />

    </main>

    @livewire('doc-search')
</body>

</html>
