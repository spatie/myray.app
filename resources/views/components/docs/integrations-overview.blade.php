<div class="grid grid-cols-3 gap-8 my-8 lg:grid-cols-4">
    @foreach ($docs as $doc)
        <a href="{{ $doc->url }}" class="text-center group">
            <div
                class="flex-1 rounded-2xl overflow-hidden mb-2 bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] group-hover:from-orange group-hover:to-bright-orange">
                <div
                    class="flex flex-col align-items-center justify-center items-center rounded-2xl bg-bleak-purple bg-opacity-75 aspect-square group-hover:bg-opacity-100">
                    <img class="w-full p-2 max-w-16 md:max-w-24" src="/images/logos/icons/logo-{{ $doc->parts[1] }}.svg"
                        alt="{{ $doc->title }}">
                </div>
            </div>
            <span class="font-semibold inline-block">{{ $doc->title }}</span>
        </a>
    @endforeach
</div>
