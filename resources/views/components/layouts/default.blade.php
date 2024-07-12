@props(['title', 'description'])

<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased">

<head>
    <x-layouts.head :title="$title" :description="$description ?? ''" />
</head>

<body class="overflow-x-hidden">

    <x-nav.header />

    <main class="static" x-data="{ download: false }">
        {{ $slot }}
        <x-download.template />
    </main>

    {{-- Force Alpine to initialize on every page --}}
    @livewire('dummy-component')
</body>

</html>
