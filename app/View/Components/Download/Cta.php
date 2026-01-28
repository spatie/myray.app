<?php

namespace App\View\Components\Download;

use App\Support\LifetimeOffer;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\PriceApi\SpatiePriceApi;

class Cta extends Component
{
    public $discount;
    public $priceActual;
    public $priceWithoutDiscount;
    public $couldFetchPrice;
    public $showByline;
    public $byline;
    public $showLifetimeOffer;
    public $lifetimeOfferExpiration;
    public $centerButtons;

    public function __construct(bool $showByline = false, ?string $byline = null, bool $centerButtons = false)
    {
        $purchasableId = config('services.spatie_prices_api.purchasable_id');
        $prices = SpatiePriceApi::getPriceForPurchasable($purchasableId);

        $this->discount = $prices['discount'];
        $this->priceActual = $prices['actual'];
        $this->priceWithoutDiscount = $prices['withoutDiscount'];
        $this->couldFetchPrice = $prices['couldFetchPrice'];
        $this->showByline = $showByline;
        $this->byline = $byline ?? 'Ray licenses are valid for 1 year and managed through <a class="text-white underline hover:no-underline" href="' . spatieUrl('https://spatie.be/products/ray') . '" target="_blank">Spatie</a>. <br class="hidden md:block" /> VAT is calculated during checkout.';
        $this->centerButtons = $centerButtons;

        // Lifetime offer configuration
        $this->showLifetimeOffer = LifetimeOffer::isActive();
        $this->lifetimeOfferExpiration = LifetimeOffer::expirationDate();
    }

    public function render(): View
    {
        return view('components.download.cta');
    }
}
