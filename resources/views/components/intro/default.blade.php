@if (isset($title))
    <div class="max-w-[54rem] mx-auto mb-10 md:mb-16 text-center">
        <{{ $tag ?? "h2" }}
            class="font-display font-black text-4xl/[1.15] mb-4 text-transparent bg-clip-text bg-gradient-to-r from-orange to-bright-orange text-balance md:text-6xl/tight md:mb-[0.25em]">
            {{ $title }}
        </{{ $tag ?? "h2" }}>
        @if (isset($text))
            <p class="text-xl font-bold leading-snug opacity-90">
                {{ $text }}
            </p>
        @endif
    </div>
@endif
