@php
    $showDiscount = $couldFetchPrice && $discount->active;
@endphp


<div
x-data="{ download: false }"
class="">
    <a data-role='download-link' target="_blank" href="{{ $downloadLinkMacIntel }}" @click.prevent="download = true">
        <x-button class="mt-4 lg:w-full">
            <span data-role="download-label">
                Download free trial
            </span>
        </x-button>
    </a>

    <template x-if="download">
        <div class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center" @keydown.window.escape="download = false">
            <div class="
                absolute inset-0 opacity-75
                bg-gradient-to-r from-indigo-500 to-indigo-900">
            </div>
            <button class="
                absolute top-0 right-0 m-6
                leading-none text-white text-3xl
                ">×</button>
            <div class="bg-white p-12 markup" @click.away="download = false">
                <h2>
                    <span class="text-gradient">Thanks!</span>
                </h2>
                <div>
                    Pick a version:
                    <ul class="mt-2 list-inside list-disc">
                        <li><a class="markup-link" download href="{{ $downloadLinkMacIntel }}">MacOS (Intel)</a></li>
                        <li><a class="markup-link" download href="{{ $downloadLinkMacApple }}">MacOS (Apple Silicon) </a></li>
                        <li><a class="markup-link" download href="{{ $downloadLinkWindows }}">Windows</a></li>
                        <li><a class="markup-link" download href="{{ $downloadLinkLinux }}">Linux</a></li>
                    </ul>
                </div>

                <div class="mt-4">
                    <strong>Subscribe</strong> for Ray updates and promotions.
                </div>

                <form class="mt-4 md:flex items-stretch" method="POST" action="{{ route('subscribe') }}">
                    @csrf
                        <input
                            class="flex-grow px-3 h-10
                                bg-gray-100 focus:bg-indigo-100 rounded-sm
                                placeholder-indigo-400 focus:placeholder-transparent
                                focus:outline-none focus:ring-0 focus:bg-opacity-100"
                            id="email" type="email" name="email" required placeholder="Email">

                       <button type="submit" class="
                            h-10 px-4
                            bg-gradient-to-r from-indigo-500 to-indigo-600
                            border-b border-r border-indigo-700
                            shadow-lg rounded-sm
                            font-bold text-white text-base
                            transform active:translate-y-px
                            ">
                            Submit
                        </button>

                        @error('email')
                            {{ $message }}
                        @enderror
                </form>
                <div class="mt-4 text-xs text-indigo-900 text-opacity-50">
                    No spam, just a few updates a year.
                </div>
            </div>

            {{--

            // Disabled for now as we can't detect M1 macs

            <script>

                setTimeout(function(){
                    window.location = downLoadLink;
                }, 1000);
            </script>
            --}}
        </div>
    </template>
</div>

<div class="mt-6 mb-4 text-sm text-indigo-900 text-opacity-50">

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
        <div class="text-xs text-indigo-900 text-opacity-50">
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
