<!DOCTYPE html>
<html lang="en" class="bg-gray-100 overflow-x-hidden">
<head>
    @include('partials.layout.head')
</head>
<body class="bg-white font-sans font-medium text-black">
    @include('partials.announcement-banner')

    <div class="max-w-6xl mx-auto">
        @include('partials.header', ['narrow' => true])

        @yield('content')

        @include('partials.footer')
    </div>
    @livewire('dummy-component')
</body>
</html>
