<!DOCTYPE html>
<html lang="en" class="bg-gray-100 overflow-x-hidden">
<head>
    @include('partials.layout.head')
</head>
<body class="antialiased bg-white font-sans font-medium text-black docs" x-data="{showSearchBox: false}"
      @keydown.cmd.k.window.prevent="showSearchBox = true">
<div class="border-b border-gray-200 bg-white relative z-50" id="header">
    @include('partials.header')
</div>

<div class="relative">
    <div class="absolute right-0 -top-4">
        @include('partials.svg.ornament')
    </div>

    <div class="lg:flex">
        @persist('scrollbar')
        <div class="border-r border-gray-200 sticky top-0 lg:h-screen overflow-y-scroll" wire:scroll>
            <x-docs-navigation></x-docs-navigation>
        </div>
        @endpersist

        <section class="page-content lg:w-full p-5 lg:p-14 lg:pb-24">
            @yield('content')

            <div class="absolute right-0 bottom-24">
                @include('partials.svg.ornament')
            </div>
        </section>
    </div>
</div>

@livewire('doc-search')

<script>
    document.addEventListener('alpine:init', () => {
        let state = Alpine.reactive({path: window.location.pathname});

        function strip(path) {
            parts = path.replace(/https?:\/\//, '').split('/');
            parts.shift();

            return parts.join('/');
        }

        function section(path) {
            parts = path.split('/');
            parts.pop();

            return parts.join('/');
        }

        let scrollPosition = 0;

        document.addEventListener('livewire:navigating', () => {
            scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
        });

        document.addEventListener('livewire:navigated', () => {
            queueMicrotask(() => {
                document.documentElement.scrollTop = document.body.scrollTop = Math.min(
                    scrollPosition,
                    document.getElementById('header').clientHeight,
                );

                state.path = window.location.pathname;
            });
        });

        Alpine.magic('current', (el) => (expected = '') => {
            return strip(state.path) === strip(expected);
        });

        Alpine.magic('currentSection', (el) => (expected = '') => {
            return section(strip(state.path)) === section(strip(expected));
        });
    });
</script>

</body>
</html>
