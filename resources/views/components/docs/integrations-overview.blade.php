<div class="grid grid-cols-4 gap-8 my-8">
    @foreach ($docs as $doc)
        <a href="{{ $doc->url }}" class="text-center group">
            <div
                class="flex-1 rounded-2xl overflow-hidden mb-2 bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] group-hover:from-orange group-hover:to-bright-orange">
                <div
                    class="flex flex-col align-items-center justify-center items-center rounded-2xl bg-bleak-purple aspect-square">
                    <img class="w-full p-10" src="/images/logos/icons/logo-{{ $doc->parts[1] }}.svg"
                        alt="{{ $doc->title }}">
                </div>
            </div>
            <span class="font-semibold inline-block">{{ $doc->title }}</span>
        </a>
    @endforeach
</div>
