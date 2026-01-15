<div class="grid grid-cols-3 gap-8 my-8 lg:grid-cols-6">
    @foreach ($docs as $doc)
        <a wire:navigate href="{{ $doc->url }}" class="relative text-center group leading-tight">
            <div
                class="flex-1 rounded-2xl overflow-hidden mb-2 bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] group-hover:from-orange group-hover:to-bright-orange">
                <div
                    class="flex flex-col align-items-center justify-center items-center py-4 rounded-2xl bg-bleak-purple bg-opacity-75 group-hover:bg-opacity-100">
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
