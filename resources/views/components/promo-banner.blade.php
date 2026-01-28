@props(['url', 'text', 'expiresAt' => null])

<div x-data="{ isSticky: false }"
     x-init="
        const observer = new IntersectionObserver(
            ([entry]) => { isSticky = !entry.isIntersecting },
            { threshold: 0 }
        );
        observer.observe($refs.sentinel);
     ">
    {{-- Sentinel: always in document flow, observed to detect scroll position --}}
    <div x-ref="sentinel" class="h-[44px]">
        <a href="{{ spatieUrl($url) }}"
           :class="isSticky ? 'fixed bottom-0 left-0 right-0 z-50 border-t' : 'relative border-b'"
           class="block text-lg py-2 bg-gradient-to-r from-bright-purple-light to-bright-purple text-center z-10 border-white border-opacity-25 overflow-hidden group"
           target="_blank">
            <span class="absolute inset-0 bg-gradient-to-r from-bright-purple to-bright-purple-light opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            <span class="relative font-bold group-hover:underline">
                {{ $text }}
                @if ($expiresAt)
                    <x-countdown.timer :expires-at="$expiresAt" />
                @endif
            </span>
        </a>
    </div>
</div>
