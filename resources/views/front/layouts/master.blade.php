<!DOCTYPE html>
<html lang="en" class="bg-gray-100 overflow-x-hidden">
<head>
    @include('partials.layout.head')
</head>
<body class="max-w-6xl mx-auto bg-white font-sans font-medium text-black">
    @include('partials.header', ['narrow' => true])

    @yield('content')

    @include('partials.footer')

    @include('partials.layout.scripts')
</body>
</html>
