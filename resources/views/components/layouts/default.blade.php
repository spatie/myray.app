@props(['title', 'description'])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="$title" :description="$description ?? ''" />
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
        <x-download.template />
    </main>

    {{-- Force Alpine to initialize on every page --}}
    @livewire('dummy-component')
</body>

</html>
