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
        <div class="absolute right-0 -top-4">
            @include('partials.docs.ornament')
        </div>

        <div class="md:flex">
            <div class="border-r border-gray-200">
                <x-docs-navigation></x-docs-navigation>
            </div>

            <section class="page-content md:w-full p-5 md:p-14">
                @yield('content')
            </section>
        </div>

        <div class="absolute right-0 -bottom-4">
            @include('partials.docs.ornament')
        </div>
    </div>

    @include('partials.footer')

    @include('partials.layout.scripts')
</body>
</html>
