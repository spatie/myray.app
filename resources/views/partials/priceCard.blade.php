@php
    $showDiscount = $couldFetchPrice && $discount->active;
@endphp

<x-download />

<div class="mt-4 mb-4 mx-auto text-sm text-indigo-900 text-opacity-50">
    {{--
        <a href="{{spatieUrl('https://spatie.be/products/ray')}}">
            <button class="group
        py-6 px-6 w-full
        bg-gradient-to-r from-indigo-800 to-indigo-700
        border-b border-r border-orange-900
        shadow-lg rounded-sm
        font-normal text-white text-xl
        transform active:translate-y-px
        focus:outline-none focus:ring-0
        whitespace-nowrap
        overflow-hidden">
                <div class="text-sm">⚡️ Special Offer</div>
                Get a <strong>lifetime</strong> license!
            </button>
        </a>
        <div class="mt-3 mb-10 text-xs text-center text-indigo-900 text-opacity-50">
            Available for
            @php
                $expirationDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i', '2022-11-29 09:00' );
            @endphp
            <x-countdown class="inline-block tabular-nums font-bold" :expires="$expirationDate">
                <span x-text="timer.days">{{ $component->days() }}</span>d</span>
                <span x-text="timer.hours">{{ $component->hours() }}</span>h</span>
                <span x-text="timer.minutes">{{ $component->minutes() }}</span>m</span>
                <span x-text="timer.seconds">{{ $component->seconds() }}</span>s</span>
            </x-countdown>
        </div>
    --}}

    <a class="group inline-flex items-center" target="_blank" href="{{spatieUrl('https://spatie.be/products/ray')}}">
        <span class="leading-tight border-b border-indigo-900 border-opacity-50">
            Get an annual license
            @if($couldFetchPrice)
                for
                @if($showDiscount)
                    <del class="font-bold whitespace-nowrap">{{ $priceWithoutDiscount->formattedPrice() }}</del>
                @else
                    <span class="font-bold whitespace-nowrap">{{ $price->formattedPrice() }}</span>
                @endif
            @endif
        </span>
        @if($showDiscount)
            <span class="absolute left-full flex-none z-20 ml-2 px-1 min-w-10 h-10
            flex items-center justify-center
            border-t border-l border-white
            rounded-full bg-gradient-to-br from-orange-100 to-orange-200 shadow-sm
            text-orange-500 text-sm font-bold whitespace-nowrap
            transform group-hover:scale-90
            transition-transform duration-300">{{ $price->formattedPrice() }}</span>
        @endif

    </a>
</div>


@if($showDiscount)
    <div class="hidden text-xs text-indigo-900 text-opacity-50">
        {{ $discount->name }} ends in
        <x-countdown class="inline-block tabular-nums font-bold" :expires="$discount->expiresAt()">
            <span x-text="timer.days">{{ $component->days() }}</span>d</span>
            <span x-text="timer.hours">{{ $component->hours() }}</span>h</span>
            <span x-text="timer.minutes">{{ $component->minutes() }}</span>m</span>
            <span x-text="timer.seconds">{{ $component->seconds() }}</span>s</span>
        </x-countdown>
    </div>
@endif

<div class="mt-1 text-xs text-indigo-900 text-opacity-50">VAT will be calculated during checkout by <a class="underline" target="_blank" href="https://paddle.com/support/welcome/#vat-tax-handling-and-compliance">Paddle</a></div>
