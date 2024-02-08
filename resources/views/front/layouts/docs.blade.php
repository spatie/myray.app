<!DOCTYPE html>
<html lang="en" class="bg-gray-100 overflow-x-hidden">
<head>
    @include('partials.layout.head')
</head>
<body class="bg-white font-sans font-medium text-black docs">
    <div class="border-b border-gray-200 bg-white relative z-50">
        @include('partials.header')
    </div>

    <div class="relative">
        @include('partials.docs.ornament')

        <div class="flex">
            <div class="border-r border-gray-200">
                <x-docs-navigation></x-docs-navigation>
            </div>

            <section class="page-content w-full p-14">
                @yield('content')
            </section>
        </div>
    </div>

    @include('partials.footer')

    @include('partials.layout.scripts')
</body>
</html>
