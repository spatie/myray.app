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
                name: 'Jeffrey van Rossum',
                text: "I use Ray almost everyday.",
                image: 'jeffrey',
                url: 'https://twitter.com/jeffreyrossum',
                title: 'WordPress and Laravel developer',
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
                name: 'Oliver Nybroe',
                text: 'Ray is the missing debugger when dd’ing just won’t cut it. It doesn’t replace dd or xdebug, it’s a third tool to solve the gap inbetween.',
                image: 'oliver',
                url: 'https://twitter.com/olivernybroe',
                title: 'Laravel Developer',
            ),
            new Testimonial(
                name: 'Luke Downing',
                text: 'Ray sheds light on your code and brightens your day. Simple and convenient, there’s no other debugging tool I’d rather reach for.',
                image: 'luke',
                url: 'https://twitter.com/lukedowning19',
                title: 'Creator of Pest in Practice',
            ),
            new Testimonial(
                name: 'Steve Bauman',
                text: 'Ray is the most simple debugging tool available today. I love using it and I consider it essential to my every day workflow.',
                image: 'steve',
                url: 'https://twitter.com/stevethebauman',
                title: 'Creator of Showcode and Ldap Record',
            ),
            new Testimonial(
                name: 'James Brooks',
                text: 'Ray is the app I\'ve been missing in my development toolkit. Debugging any sized application is now a breeze.',
                image: 'james',
                url: 'https://twitter.com/jbrooksuk',
                title: 'Software engineer at Laravel',
            ),
            new Testimonial(
                name: 'Christoph Rumpel',
                text: "I'm an Xdebug user, but I still, find myself using Ray a lot because it is just so easy to use and beautiful ✨",
                image: 'Christoph',
                url: 'https://twitter.com/christophrumpel',
                title: 'PHP Developer and teacher',
            ),
            new Testimonial(
                name: 'Stefan Bauer',
                text: "Ray makes me enjoy debugging again. Its beauty and its simplicity. If a project doesn't use Ray yet, the first action I do is to install Ray. Every single time.",
                image: 'stefan',
                url: 'https://twitter.com/stefanbauerme',
                title: 'Author of Laravel Secrets',
            ),
            new Testimonial(
                name: 'Tony Lea',
                text: "Debugging my application is so much easier thanks to Ray. No more dd() or \Log::info() all over the place. Ray, all the way.",
                image: 'tony',
                url: 'https://twitter.com/tnylea',
                title: 'Creator of The Dev Dojo',
            ),
            new Testimonial(
                name: 'Caneco',
                text: "dd() is for now, ray() is forever… or at least until you clear your log screen.",
                image: 'caneco',
                url: 'https://twitter.com/caneco',
                title: 'Full Stack Developer at Mediacare',
            ),
            new Testimonial(
                name: 'Fabio Ivona',
                text: "Ray is a must have in every artisan toolbox. dd() with steroids.",
                image: 'fabio',
                url: 'https://twitter.com/fabioivona',
                title: 'Software engineer at def:studio',
            ),
            new Testimonial(
                name: 'Joren Van Hocht',
                text: "As a day one customer, not a single day passes without using Ray. It’s an essential tool in my toolbox. It’s as simple as dd, but way more powerful.",
                image: 'joren',
                url: 'https://twitter.com/jorenvanhocht',
                title: 'PHP Developer at Take The Lead',
            ),
            new Testimonial(
                name: 'Daniel Koop',
                text: "I have just started using ray and I just love the simplicity of the tool. It is a neat way for debugging without a configuration hassle and I love the pause feature rather than running sleep.",
                image: 'mrkoopie',
                url: 'https://twitter.com/mrkoopie',
                title: 'WordPress and Laravel developer',
            ),
            new Testimonial(
                name: 'Charlie Joseph',
                text: "Day to day, Ray has been my must-have tool when working with projects. Being able to quickly debug to a seperate, non intrusive window really persuaded me with Ray.",
                image: 'charlie',
                url: 'https://twitter.com/heychazza',
                title: 'Developer at Analyse.net',
            ),
            new Testimonial(
                name: 'Dan Harrin',
                text: "Where dd() falls short, Ray is sure to plug the gaps in your workflow. It's so much more than just checking a payload... it's your sidekick for performance refactoring too.",
                image: 'dan',
                url: 'https://twitter.com/danjharrin',
                title: 'Lead Developer at Stagent',
            ),
            new Testimonial(
                name: 'Martin Joo',
                text: "Ray is the Mike Tyson of debugging.",
                image: 'martin',
                url: 'https://twitter.com/mmartin_joo',
                title: 'Web developer',
            ),
            new Testimonial(
                name: 'Ron Northrip',
                text: "Ray will give you super powers.",
                image: 'ron',
                url: 'https://twitter.com/ronnorthrip',
                title: 'VP of Engineering at Blue Check Me',
            ),
            new Testimonial(
                name: 'Robin Martijn',
                text: "I've been using Ray since it came out and I've never needed anything else. I don't feel like working with complicated debugging tools, nor is it necessary with Ray.",
                image: 'robin',
                url: 'https://twitter.com/RobinMartijn',
                title: 'Building Cronly.app',
            ),
            new Testimonial(
                name: 'Jack Mollart',
                text: "Ray makes my debugging experience much more enjoyable - it is added to all of my projects.",
                image: 'jack',
                url: 'https://twitter.com/Jxckaroo',
                title: 'Backend Engineer',
            ),
            new Testimonial(
                name: 'Alex Garrett-Smith',
                text: "Ray is a tool you don’t think you need until you use it. Now I can’t work without it.",
                image: 'alex',
                url: 'https://twitter.com/alexjgarrett',
                title: 'Found Team Code Course',
            ),
            new Testimonial(
                name: 'Andre Biel',
                text: "Despite being awesome in so many different ways, ray is the missing dd() for pure API applications.",
                image: 'andre',
                url: 'https://twitter.com/the_real_biel',
                title: 'Co-founder Nice Outside',
            ),
            new Testimonial(
                name: 'Chris',
                text: "I use Ray because it works everywhere, including in production.",
                image: 'chris',
                url: 'https://twitter.com/ninthspace',
                title: 'Rescuer of projects',
            ),
            new Testimonial(
                name: 'JL',
                text: "Ray is a 'ray' of sunshine that saves me time digging into log files or the response tab in chrome. Wordpress, Laravel, Yii: I've used ray everywhere and it's done nothing but make me more productive.",
                image: 'jl',
                url: 'https://twitter.com/JLadHDeveloper',
                title: 'Full Stack Wildcard Developer',
            ),
        ]);
    }
}
