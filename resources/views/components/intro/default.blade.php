@if (isset($title))
    <div class="max-w-prose mx-auto mb-8 md:mb-16 md:text-center">
        <{{ $tag ?? "h2" }}
            class="font-display font-black text-3xl mb-[0.25em] text-transparent bg-clip-text !leading-snug bg-gradient-to-r from-orange to-bright-orange md:text-5xl">
            {{ $title }}
        </{{ $tag ?? "h2" }}>
        @if (isset($text))
            <p class="text-lg leading-snug">
                {{ $text }}
            </p>
        @endif
    </div>
@endif
