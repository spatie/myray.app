@extends('front.layouts.master')

@section('title', 'JavaScript Debugging Evolved')

@section('description', 'Debug with Ray to fix and debug JavaScript & Node problems faster')

@section('content')

<main>

    <section class="overflow-hidden pb-12">
        <div class="background-01 absolute inset-0 pointer-events-none" >
            <img
                alt=""
                style="bottom: 3rem; height:700px"
                class="absolute w-full opacity-25 lg:opacity-75"
                src="/images/background-01.svg"/>
        </div>

        <div class="
            mx-auto px-6 sm:px-12 md:px-16
            max-w-4xl
            grid gap-8 lg:gap-16 lg:grid-cols-5 items-start">
            <div class="lg:col-span-3 lg:-ml-12">
                <div
                    style="padding-bottom: 75%;"
                    class="h-0
                    border border-gray-200 bg-white shadow-2xl rounded"
                >
                    @include('partials.rayScreen', [
                        'filename' => 'index',
                        'extension' => 'js'
                    ])

                </div>
                <p class="
                    text-right lg:text-left
                    m-4
                    text-xs text-indigo-900 text-opacity-50">
                    Available for
                    <i class="fab fa-apple"></i>  /
                    <i class="fab fa-windows"></i> /
                    <i class="fab fa-linux"></i>
                </p>
            </div>

            <div class="pt-8
            lg:col-span-2 lg:-mr-12">
                <p class="max-w-md font-semibold text-3xl leading-relaxed flex items-center">
                   <span class="w-24">@include('partials.logoRay')</span><span class="mx-4"> &hearts; </span><img class="w-12 ml-1" src="/images/javascript.svg" alt="JavaScript">
                </p>

                <p class="max-w-md font-semibold text-2xl leading-relaxed my-6">
                    Debug JavaScript &amp; Node<br>faster with Ray
                </p>

                <div class="">
                    @include('partials.priceCard')
                </div>
            </div>



            <div class="lg:-mt-6 xl:mt-12
            lg:col-span-2 lg:-ml-12 lg:-mr-10
            lg:text-right lg:text-white font-medium leading-tight">
                <ul class="grid gap-3">
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-400 bg-opacity-75"></i>  Strings, array, objects, … you can send anything to Ray
                     </li>
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-400"></i> Assign Ray colors to your dumps, so you can make use of the color filters in the UI.
                    </li>
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-500"></i> Collapse and expand calls, or group items that belong together.
                     </li>
                    <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-600"></i> Log the full stack trace of a JS error.
                    </li>
                    <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-700"></i> <span>And <a href="https://github.com/permafrost-dev/node-ray#reference" class="underline">so much more...</a></span>
                    </li>
                </ul>
            </div>
            <div
                class="mt-12 lg:col-span-3 lg:mt-0 lg:-mr-12 shadow-xl rounded overflow-hidden
                "
            >
                <img alt="Screenshot with JavaScript info" class="rounded shadow-md border border-gray-200" src="/images/features/javascript.png" />
            </div>
        </div>
</section>

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
                        ray(anything);
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Send a string, arrays, object, …  to Ray
                </dd>

                <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                    <code class="text-indigo-500 text-sm font-semibold">
                        ray(anything, somethingElse);
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Send as much as you want
                </dd>

                <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                    <code class="text-indigo-500 text-sm font-semibold">
                        ray(anything).green();
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Apply a color, so you can use Ray's color filters
                </dd>

                <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                    <code class="text-indigo-500 text-sm font-semibold">
                        ray().measure();
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Check execution time
                </dd>

                <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                    <code class="text-indigo-500 text-sm font-semibold">
                        ray().trace();
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Find out where your code was called from
                </dd>

                <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                    <code class="text-indigo-500 text-sm font-semibold">
                        ray().pause();
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Pause code execution within your code; must be called using <code>await</code>
                </dd>

                <dt class="pr-8 pt-3 md:py-3 md:border-b border-gray-400 border-opacity-25">
                    <code class="text-indigo-500 text-sm font-semibold">
                        ray().ban();
                    </code>
                </dt>
                <dd class="py-3 border-b border-gray-400 border-opacity-25">
                    Keep it cool while debugging <i class="ml-1 fas fa-sunglasses"></i>
                </dd>
            </dl>

            <p class="mt-6">
                <a href="{{ spatieUrl('https://spatie.be/docs/ray/v1/usage/nodejs') }}" class="font-semibold markup-link">Read the docs</a>
            </p>
        </div>

        <div class="flex justify-center">
            <div class="flex flex-col items-center">
                @include('partials.priceCard')
            </div>
        </div>
    </section>

</main>

@include('partials.detectOS')





@endsection
