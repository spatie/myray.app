@props(['title', 'description'])

<!DOCTYPE html>
<html lang="en">
    <head>
        <x-layouts.head :title="$title" :description="$description" />
    </head>
    <body>
        {{ $slot }}

        {{-- Force Alpine to initialize on every page --}}
        @livewire('dummy-component')
    </body>
</html>
