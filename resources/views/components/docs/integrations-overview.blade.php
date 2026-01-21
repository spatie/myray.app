@foreach ($grouped as $category)
    <h3 class="text-white text-xl font-semibold mt-8 mb-4 first:mt-0">{{ $category['title'] }}</h3>
    <div class="grid grid-cols-3 gap-6 mb-8 lg:grid-cols-5">
        @foreach ($category['docs'] as $doc)
            <a wire:navigate href="{{ $doc->url }}" class="relative text-center group leading-tight">
                @if($doc->thirdParty ?? false)
                    <span class="absolute top-2 right-2 text-xs bg-orange/20 text-orange px-2 py-0.5 rounded-full z-10">
                        Community
                    </span>
                @endif
                <div class="relative flex-1 rounded-2xl overflow-hidden mb-2 p-[1px]">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-b from-neutrals-white-20 to-transparent transition-opacity duration-150 group-hover:opacity-0"></div>
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-b from-orange to-bright-orange opacity-0 transition-opacity duration-150 group-hover:opacity-100"></div>
                    <div
                        class="relative flex flex-col align-items-center justify-center items-center rounded-2xl bg-bleak-purple/85 aspect-square">
                        <img class="w-full p-2 max-w-16 md:max-w-20" src="/images/logos/icons/logo-{{ $doc->parts[1] }}.svg"
                            alt="{{ $doc->title }}">
                    </div>
                </div>
                <span class="text-white text-sm font-semibold inline-block">{{ $doc->title }}</span>
            </a>
        @endforeach
    </div>
@endforeach
