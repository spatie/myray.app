<blockquote
    class="lg:mx-0 lg:mt-6 w-full lg:w-auto mb-4 lg:mb-0 flex flex-col border border-indigo-300 border-opacity-50 bg-white rounded shadow-lg overflow-hidden">
    <img alt="" class="hidden lg:block absolute opacity-25 w-full h-full object-cover"
        src="/images/quote-0{{ $index ?? 1 }}.svg" />
    <div class="flex-grow flex items-center overflow-hidden  px-8 py-8 text-sm lg:text-base leading-relaxed">
        <p>{!! $quote !!}</p>
        @if ($index == 0)
        @include('components.triangle-bg-svg')

        @endif
    </div>
    <small class="block
            bg-gray-200 bg-opacity-50 px-6 py-4">
        <a href="{{ $url }}" class="flex items-center space-x-3">
            <div class="flex-none w-10 h-10 rounded-full overflow-hidden shadow-sm">
                <img src="{{ $avatar }}">
            </div>
            <div class="text-xs ">
                <div class="font-bold">{{ $author }}</div>
                <div class="mt-0.5">
                    {{ $title ?? '' }}
                </div>
            </div>
        </a>
    </small>


</blockquote>