@persist('search')
<div>
    <div
        class="fixed left-0 right-0 top-0 bottom-0 bg-indigo-100/75 z-40"
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
            <div class="bg-white shadow-lg w-full max-w-2xl rounded pointer-events-auto m-3">
                <div class="relative flex items-center border-b">
                    <div class="absolute left-0 z-50 left-3">
                        @include('partials.svg.icon-search')
                    </div>
                    <input
                        type="text"
                        class="w-full p-3 pl-10 outline-none rounded"
                        wire:model.live.debounce="query"
                    >
                </div>
                @if($results)
                    <div class="max-h-80 overflow-y-auto px-3 pb-3">
                        <div class="text-xxs font-bold mt-2 mb-2">Results</div>
                        @if($results->hits->count() > 0)
                            <ul class="search-results">
                                @foreach($results->hits as $hit)
                                    <li class="mb-3">
                                        <a href="{{$hit->url}}">
                                            <div class="text-xs font-semibold">{{$hit->title()}}</div>
                                            <div class="text-xxs font-normal">{!! $hit->highlightedSnippet() !!}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="text-xs font-normal">No results found</div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endpersist
