<section class="mt-24 pb-24 -mb-24 overflow-hidden">
    <div class="background-02 absolute inset-0 pointer-events-none" >
        <img
            alt=""
            style="bottom: 3%; height:650px"
            class="absolute w-full opacity-25 lg:opacity-75"
            src="/images/background-02.svg"/>
    </div>

    <div class="
            mx-auto px-6 sm:px-12 md:px-16
            max-w-4xl
            markup
        ">
        <h2><span class="text-gradient">Simple syntax</span></h2>

        <dl class="grid bg-white bg-opacity-25 md:grid-cols-auto-1fr">
            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray($anything);
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Send a string, arrays, object, …  to Ray
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray($anything, $somethingElse);
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Send as much as you want
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray($anything)->green();
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Apply a color, so you can use Ray's color filters
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray()->queries();
                </code>
            </dt>

            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                See all queries executed by your Laravel app
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray()->measure();
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Check execution time and memory usage
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray()->trace();
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Find out where your code was called from
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray()->pause();
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Pause your code
            </dd>

            <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                <code class="text-indigo-500 text-sm font-semibold">
                    ray()->ban();
                </code>
            </dt>
            <dd class="py-3 border-b border-gray-400 border-opacity-25">
                Keep it cool while debugging <i class="ml-1 fas fa-sunglasses"></i>
            </dd>
        </dl>

        <p class="mt-6">
            <a href="{{spatieUrl('https://spatie.be/docs/ray') }}" class="font-semibold markup-link">Read the docs</a>
        </p>
    </div>

    <div class="flex justify-center">
        <div class="flex flex-col items-center">
            @include('partials.priceCard')
        </div>
    </div>
</section>
