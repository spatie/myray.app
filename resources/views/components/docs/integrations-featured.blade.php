<div class="pb-4 border-b border-bleak-purple-extra-light/20">
    <div class="grid grid-cols-3 gap-8 my-8 lg:grid-cols-3">
        @foreach ($docs as $doc)
            <a wire:navigate href="{{ $doc->url }}" class="relative text-center group leading-tight">
                <div class="relative flex-1 rounded-2xl overflow-hidden mb-3 p-[1px]">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-b from-neutrals-white-20 to-transparent transition-opacity duration-150 group-hover:opacity-0"></div>
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-b from-orange to-bright-orange opacity-0 transition-opacity duration-150 group-hover:opacity-100"></div>
                    <div
                        class="relative flex flex-col align-items-center justify-center items-center py-4 rounded-2xl bg-bleak-purple/85">
                        <img class="w-full p-2 max-w-16 md:max-w-24" src="/images/logos/icons/logo-{{ $doc->parts[1] }}.svg"
                            alt="{{ $doc->title }}">
                    </div>
                </div>
                <span class="text-white font-semibold inline-block">{{ $doc->title }}</span>
            </a>
        @endforeach
    </div>
    <p class="text-center">
        <a wire:navigate href="/docs/getting-started/integrations" class="text-orange hover:underline">View all integrations →</a>
    </p>
</div>
