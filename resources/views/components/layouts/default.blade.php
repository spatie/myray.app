@props(['title', 'description', 'color', 'image' => null, 'showHeader' => true, 'showCta' => true, 'showFooter' => true, 'downloadTitle' => null, 'downloadDisclaimer' => null])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="$title" :description="$description ?? ''" :color="isset($color) ? $color : '#170636'" :image="$image" />
</head>

<body class="overflow-x-hidden bottom-gradient">

    @if ($lifetimeOfferActive)
        <a href="{{ spatieUrl('https://spatie.be/products/ray') }}"
           class="relative block text-lg py-2 bg-gradient-to-r from-bright-purple-light to-bright-purple text-center z-10 border-b border-white border-opacity-25 overflow-hidden group"
           target="_blank">
            <span class="absolute inset-0 bg-gradient-to-r from-bright-purple to-bright-purple-light opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            <span class="relative font-bold group-hover:underline">
                ⚡️ Lifetime Ray licenses available for
                <x-countdown.timer :expires-at="$lifetimeOfferExpiration" />
            </span>
        </a>
    @endif

    @if (isset($background))
        <div class="absolute w-full pointer-events-none">
            {{ $background }}
        </div>
    @endif

    @if ($showHeader)
        <x-nav.header class="lg:sticky" />
    @endif

    <main class="static" x-data="{ download: false }">
        {{ $slot }}

        @if ($showFooter)
            <div class="container mx-auto p-2 pb-12 lg:py-24 lg:px-16">
                @if ($showCta)
                    <x-cta.large />
                @endif

                <x-nav.footer />
            </div>
        @endif

        <x-download-modal :title="$downloadTitle">
            @if ($downloadDisclaimer)
            <x-slot name="disclaimer">
                {!! $downloadDisclaimer !!}
            </x-slot>
            @endif
        </x-download-modal>

    </main>

    {{-- Force Alpine to initialize on every page --}}
    @livewire('dummy-component')
</body>

</html>
