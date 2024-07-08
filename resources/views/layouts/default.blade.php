<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.layout.head')
</head>
<body>
    @yield('content')

    {{-- Force Alpine to initialize on every page --}}
    @livewire('dummy-component')
</body>
</html>
