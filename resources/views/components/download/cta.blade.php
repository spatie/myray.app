<div class="flex flex-col gap-6">
    <div class="space-y-4">
        <div class="flex flex-wrap gap-4 items-start {{ $centerButtons ? 'justify-start md:justify-center' : 'justify-start' }}">
            <div class="shadow-small-drop">
                <x-download.button />
            </div>
            <div class="shadow-small-drop">
                <a class="btn-bleak-trans transition inline-block text-xl px-6 py-4 font-bold rounded-md shadow-top-white"
                    href="{{ spatieUrl('https://spatie.be/products/ray') }}" target="_blank">
                    Buy Ray for
                    @if ($discount->active)
                        <span class="line-through opacity-50">{{ $priceWithoutDiscount->formattedPrice() }}</span>
                        <span class="text-orange orange-text-glow">{{ $priceActual->formattedPrice() }}</span>
                    @else
                        {{ $priceWithoutDiscount->formattedPrice() }}
                    @endif
                </a>
            </div>
        </div>
    </div>

    @if($showByline)
        <p class="text-bleak-purple-extra-light">
            {!! $byline !!}
        </p>
    @endif
</div>
