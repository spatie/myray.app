<div>


    <div class="fixed left-0 right-0 top-0 bottom-0 bg-indigo-100/75 z-40" x-cloak x-show="showSearchBox" @click="showSearchBox=false">
    </div>

    <div class="fixed left-0 right-0 top-0 bottom-0 z-50 pointer-events-none" x-cloak x-show="showSearchBox" x-trap="showSearchBox">
        <div class="flex justify-center items-center h-full">
            <div class="bg-white shadow-lg w-full max-w-2xl rounded pointer-events-auto m-3">
                <div class="relative flex items-center border-b">
                    <div class="absolute left-0 z-50 left-3">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.0555 13.8145L11.7477 10.5066C12.544 9.44645 12.9739 8.15598 12.9725 6.83C12.9725 3.44305 10.217 0.6875 6.83 0.6875C3.44305 0.6875 0.6875 3.44305 0.6875 6.83C0.6875 10.217 3.44305 12.9725 6.83 12.9725C8.15598 12.9739 9.44645 12.544 10.5066 11.7477L13.8145 15.0555C13.9819 15.2052 14.2003 15.2851 14.4248 15.2788C14.6493 15.2725 14.8629 15.1805 15.0217 15.0217C15.1805 14.8629 15.2725 14.6493 15.2788 14.4248C15.2851 14.2003 15.2052 13.9819 15.0555 13.8145ZM2.4425 6.83C2.4425 5.96223 2.69982 5.11396 3.18193 4.39244C3.66403 3.67092 4.34927 3.10856 5.15098 2.77648C5.95269 2.4444 6.83487 2.35751 7.68596 2.5268C8.53705 2.6961 9.31883 3.11397 9.93243 3.72757C10.546 4.34117 10.9639 5.12295 11.1332 5.97404C11.3025 6.82513 11.2156 7.70731 10.8835 8.50902C10.5514 9.31073 9.98909 9.99597 9.26756 10.4781C8.54604 10.9602 7.69777 11.2175 6.83 11.2175C5.66679 11.2161 4.55162 10.7534 3.72911 9.93089C2.9066 9.10838 2.4439 7.99321 2.4425 6.83Z" fill="#13052B"/>
                        </svg>
                    </div>

                    <input class="w-full p-3 pl-10 outline-none" type="text" wire:model.live.debounce="query">
                </div>

                @if($results)
                    <div class="max-h-80 overflow-y-auto px-3 pb-3">
                        <div class="text-sm font-bold mt-2 mb-2">Results</div>
                        @if($results->hits->count() > 0)
                            <ul class="search-results">
                                @foreach($results->hits as $hit)
                                    <li class="mb-3">
                                        <a href="{{$hit->url}}">
                                            <div class="text-xs font-semibold">{{$hit->title()}}</div>
                                            <div class="text-xs font-normal">{!! $hit->highlightedSnippet() !!}</div>
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
