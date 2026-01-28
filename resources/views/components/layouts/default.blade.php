@props(['title', 'description', 'color', 'image' => null, 'showHeader' => true, 'showCta' => true, 'showFooter' => true, 'downloadTitle' => null, 'downloadDisclaimer' => null])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="$title" :description="$description ?? ''" :color="isset($color) ? $color : '#170636'" :image="$image">
        @if (isset($schema))
            <x-slot:schema>{{ $schema }}</x-slot:schema>
        @endif
    </x-layouts.head>
</head>

<body class="overflow-x-hidden bottom-gradient">

    @if ($lifetimeOfferActive)
        <x-promo-banner
            url="https://spatie.be/products/ray"
            :text="config('ray.lifetime_offer.text')"
            :expires-at="$lifetimeOfferExpiration"
        />
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
