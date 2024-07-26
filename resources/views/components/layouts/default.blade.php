@props(['title', 'description', 'color'])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="$title" :description="$description ?? ''" :color="isset($color) ? $color : '#170636'" />
</head>

<body class="overflow-x-hidden">

    @if (isset($background))
        <div class="absolute w-full pointer-events-none">
            {{ $background }}
        </div>
    @endif

    <x-nav.header class="lg:sticky" />

    <main class="static" x-data="{ download: false }">
        {{ $slot }}

        <div class="container mx-auto p-2 pb-12 lg:py-24 lg:px-16">
            <x-cta.large />
            <x-nav.footer />
        </div>

        <x-download.template />
    </main>

    {{-- Force Alpine to initialize on every page --}}
    @livewire('dummy-component')
</body>

</html>
