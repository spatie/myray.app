@props(['platform', 'logo', 'links' => []])

<div class="flex-1 rounded-xl overflow-hidden bg-gradient-to-b from-neutrals-white-20 to-red p-[1px]">
    <div class="flex flex-col items-center rounded-xl">
        <div class="py-4">
            <img src="{{ $logo }}" alt="{{ $platform }}">
            <p class="text-bleak-purple-extra-light text-sm font-bold">{{ $platform }}</p>
        </div>
        <div class="px-4 py-4 border-t border-white border-opacity-10 w-full">
            <div class="space-x-1 flex gap-2 justify-center">
                @foreach ($links as $link)
                    <a
                        onclick="fathom.trackEvent('{{ $link['event'] }}');"
                        href="{{ $link['url'] }}"
                        download
                        class="text-base underline hover:no-underline">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
