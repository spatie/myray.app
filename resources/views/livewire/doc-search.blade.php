@persist('search')
<div
    x-data="{ selectedIndex: -1 }"
    x-init="$watch('showSearchBox', value => { if (value) selectedIndex = -1 })"
>
    <div
        class="fixed left-0 right-0 top-0 bottom-0 bg-midnight-dark bg-opacity-85 z-40"
        x-cloak
        x-show="showSearchBox"
        @click="showSearchBox=false"
    ></div>
    <div
        class="fixed left-0 right-0 top-0 bottom-0 z-50 pointer-events-none"
        x-cloak
        x-show="showSearchBox"
        x-trap="showSearchBox"
    >
        <div class="flex justify-center items-center h-full">
            <div class="bg-bleak-purple-dark shadow-large-drop border border-bleak-purple-light w-full max-w-2xl rounded-xl pointer-events-auto m-3">
                <div class="relative flex items-center">
                    <div class="absolute z-50 left-3">
                        <x-icons.search />
                    </div>
                    <input
                        type="text"
                        class="w-full p-3 pl-10 outline-none rounded-xl bg-transparent"
                        wire:model.live.debounce="query"
                        @keydown.arrow-down.prevent="selectedIndex = Math.min(selectedIndex + 1, {{ $results?->hits->count() ?? 0 }} - 1)"
                        @keydown.arrow-up.prevent="selectedIndex = Math.max(selectedIndex - 1, -1)"
                        @keydown.enter.prevent="if (selectedIndex >= 0 && $refs['result-' + selectedIndex]) window.location.href = $refs['result-' + selectedIndex].href"
                    >
                </div>
                @if($results)
                    <div class="max-h-80 overflow-y-auto px-3 pb-2">
                        @if($results->hits->count() > 0)
                            <ul class="search-results flex flex-col gap-4">
                                @foreach($results->hits as $hit)
                                    <li class="docs-search-results-item">
                                        <a
                                            class="group block rounded-lg -mx-2 px-2 py-1 transition-colors"
                                            :class="selectedIndex === {{ $loop->index }} ? 'bg-bleak-purple-light' : ''"
                                            href="{{ $hit->url }}"
                                            x-ref="result-{{ $loop->index }}"
                                            @mouseenter="selectedIndex = {{ $loop->index }}"
                                        >
                                            <div class="font-semibold leading-tight group-hover:underline">{{ str_replace(' - Ray', '', $hit->title()) }}</div>
                                            <div class="font-normal text-white opacity-65">{!! $hit->highlightedSnippet() !!}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="font-normal">No results found</div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endpersist
