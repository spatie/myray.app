<?php

namespace App\Http\Front\Controllers;

use App\Support\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\PriceApi\SpatiePriceApi;

class HomeController
{
    public function __invoke(Request $request)
    {
        $view = $request->segment(1, 'home.index');

        $purchasableId = config('services.spatie_prices_api.purchasable_id');

        $prices = SpatiePriceApi::getPriceForPurchasable($purchasableId);

        return view('front.'.$view, [
            'downloadLinkMacIntel' => spatieUrl('https://spatie.be/products/ray/download/macosIntel/latest'),
            'downloadLinkMacAppleSilicon' => spatieUrl('https://spatie.be/products/ray/download/macosAppleSilicon/latest'),
            'downloadLinkWindows' => spatieUrl('https://spatie.be/products/ray/download/windows/latest'),
            'downloadLinkLinux' => spatieUrl('https://spatie.be/products/ray/download/linux/latest'),
            'couldFetchPrice' => $prices['couldFetchPrice'],
            'price' => $prices['actual'],
            'priceWithoutDiscount' => $prices['withoutDiscount'],
            'discount' => $prices['discount'],
            'testimonials' => $this->getTestimonials()
        ]);
    }

    protected function getTestimonials(): Collection
    {
        return collect([
            new Testimonial(
                name: 'Taylor Otwell',
                text: 'Ray is <strong class=" font-black text-2xl block">Life</strong>',
                image: 'taylor',
                url: 'https://twitter.com/taylorotwell',
                title: 'Laravel Founder & Creator',
            ),
            new Testimonial(
                name: 'Michael Dyrynda',
                text: 'As an amateur developer that swears by <code>dd()</code>, I was thrilled to hear about Ray. Now
    I can <strong class="font-semibold">feel like a real developer</strong>, even without using \'real\'
    debugging tools!',
                image: 'michael',
                url: 'https://twitter.com/michaeldyrynda',
                title: 'Senior Developer at MaxoTel',
            ),
            new Testimonial(
                name: 'Nuno Maduro',
                text: 'Ray is a part of my <strong class="font-semibold">Essentials</strong> toolbox. It has the
        snapiness of a real debugger, but the simplicity of <code>dd()</code>',
                image: 'nuno',
                url: 'https://twitter.com/enunomaduro',
                title: 'Software engineer at Laravel',
            ),
            new Testimonial(
                name: 'James Brooks',
                text: 'Ray is the app I\'ve been missing in my development toolkit. Debugging any sized application is now a breeze.',
                image: 'james',
                url: 'https://twitter.com/jbrooksuk',
                title: 'Software engineer at Laravel',
            ),
        ]);
    }
}
