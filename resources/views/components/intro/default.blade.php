@if (isset($title))
    <div class="max-w-[54rem] mx-auto mb-8 md:mb-16 md:text-center">
        <{{ $tag ?? "h2" }}
            class="font-display font-black text-4xl/snug mb-[0.25em] text-transparent bg-clip-text bg-gradient-to-r from-orange to-bright-orange md:text-6xl/tight">
            {{ $title }}
        </{{ $tag ?? "h2" }}>
        @if (isset($text))
            <p class="text-xl font-bold leading-snug opacity-90">
                {{ $text }}
            </p>
        @endif
    </div>
@endif
