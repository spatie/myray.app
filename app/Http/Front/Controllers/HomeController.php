<?php

namespace App\Http\Front\Controllers;

use Illuminate\Http\Request;
use Spatie\PriceApi\SpatiePriceApi;

class HomeController
{
    public function __invoke(Request $request)
    {
        $view = $request->segment(1, 'home.index');

        $purchasableId = config('services.spatie_prices_api.purchasable_id');

        $prices = SpatiePriceApi::getPriceForPurchasable($purchasableId);

        return view('front.' . $view, [
            'downloadLinkMacIntel' => spatieUrl('https://spatie.be/products/ray/download/macosIntel/latest'),
            'downloadLinkMacAppleSilicon' => spatieUrl('https://spatie.be/products/ray/download/macosAppleSilicon/latest'),
            'downloadLinkWindows' => spatieUrl('https://spatie.be/products/ray/download/windows/latest'),
            'downloadLinkLinux' => spatieUrl('https://spatie.be/products/ray/download/linux/latest'),
            'couldFetchPrice' => $prices['couldFetchPrice'],
            'price' => $prices['actual'],
            'priceWithoutDiscount' => $prices['withoutDiscount'],
            'discount' => $prices['discount'],
        ]);
    }
}
