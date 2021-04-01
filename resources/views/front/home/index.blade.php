@extends('front.layouts.master')

@section('title', 'Dump Debugging Evolved')

@section('description', 'Debug with Ray to fix problems faster')

@section('content')

<main>

    <section class="overflow-hidden pb-12">
        <div class="background-01 absolute inset-0" >
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
                    @include('partials.rayScreen')

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
                <p class="max-w-md font-semibold text-3xl leading-relaxed">
                   Debug with Ray <br>to fix problems faster
                </p>

                <div class="mt-8">
                    @include('partials.priceCard')
                </div>
            </div>



            <div class="lg:-mt-6 xl:mt-6
            lg:col-span-2 lg:-ml-12 lg:-mr-10
            lg:text-right lg:text-white font-medium leading-tight">
                <ul class="grid gap-3">
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-400 bg-opacity-75"></i> Use in WordPress or any PHP project
                     </li>
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-400"></i> See models, mails, queries, … in Laravel
                    </li>
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-500"></i> Debug locally or via SSH
                     </li>
                    <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-600"></i> Works with Javascript, Node.js and Ruby
                     </li>
                    <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-700"></i>
                        <span>Measure performance &amp; set breakpoints</span>
                    </li>
                </ul>
            </div>
            <div
                class="mt-12 lg:col-span-3 lg:mt-0 lg:-mr-12 shadow-xl rounded overflow-hidden
                "
            >
                <div
                x-data="{ open: false }"
                style="padding-bottom: 75%;"
                class="h-0
                bg-gradient-to-r from-indigo-700 to-indigo-900">
                    <button class="absolute w-full h-full inset-0 group flex items-center justify-center" @click="open = true">
                        <img class="absolute w-full h-full top-0 left-0 object-cover
                        opacity-75 group-hover:opacity-50
                        transition-opacity duration-300
                        " src="/images/intro-1200.png" alt="Intro screenshot">
                        <div class="
                        px-4 py-2
                        bg-indigo-500 rounded-sm
                        text-white font-bold text-base
                        group-hover:bg-indigo-600
                        cursor-pointer transition-colors duration-300">
                            Play <i class="ml-1.5 fas fas fa-play text-xs"></i>
                        </div>
                    </button>
                    <template x-if="open">
                        <div class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center" @keydown.window.escape="open = false">
                            <div class="
                                absolute inset-0 opacity-75
                                bg-gradient-to-r from-indigo-500 to-indigo-900">
                            </div>
                            <button class="
                                absolute top-0 right-0 m-6
                                leading-none text-white text-3xl
                                ">×</button>
                            <iframe src="https://player.vimeo.com/video/497806481?autoplay=1" class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" @click.away="open = false">
                            </iframe>
                        </div>
                    </template>
                </div>
            </div>
        </div>
</section>

<section class="mb-24 overflow-hidden">
    <div class="
        mx-auto px-6 sm:px-12 md:px-16
        max-w-4xl
        markup
        grid gap-8 lg:gap-x-16 md:grid-cols-2 items-start
    ">
        <div>
            <h3 class="flex items-center">
                <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-green-400"></i>
                Good lookin' debug info
            </h3>
            <p class="py-2">
                <img alt="Screenshot with debug info" class="rounded shadow-md border border-gray-200" src="/images/features/good-lookin.png" />
            </p>
            <p class="text-sm max-w-sm">
                Strings, array, objects, … you can send anything to Ray from PHP/Laravel/WordPress or from JavaScript/Node.js.
                Ray formats the output and displays the origin of your calls.
            </p>
        </div>

        <div class="mt-8">
            <h3 class="flex items-center">
                <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-orange-400"></i>
                Ray loves Laravel
            </h3>
            <p class="py-2">
                <img alt="Screenshot with laravel specific info" class="rounded shadow-md border border-gray-200" src="/images/features/laravel.png" />
            </p>
            <p class="text-sm max-w-sm">
                When installed in a Laravel app, Ray can format models and queries, track events, and even render mailables.
            </p>
        </div>

         <div>
            <h3 class="flex items-center">
                <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full  bg-red-500"></i>
                Organize calls
            </h3>
             <p class="py-2">
                 <img alt="Screenshot with colored calls" class="rounded shadow-md border border-gray-200" src="/images/features/organise-calls.png" />
             </p>
            <p class="text-sm max-w-sm">
                Collapse and expand calls, or group items that belong together. Assign Ray colors to your dumps, so you can make use of the color filters in the UI.
            </p>
        </div>

         <div class="mt-8">
            <h3 class="flex items-center">
                <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full  bg-purple-400"></i>
                Easy on the eyes
            </h3>
             <p class="py-2">
                 <img alt="Screenshot dark mode" class="rounded shadow-md border border-gray-200" src="/images/features/dark.png" />
             </p>
            <p class="text-sm max-w-sm">
                By default, Ray will follow the theme of your OS. And yes, there's a dark mode.
            </p>
        </div>

        <div>
            <h3 class="flex items-center">
                <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-blue-500"></i>
                Setting breakpoints
            </h3>
            <p class="py-2">
                <img alt="Screenshot with breakpoints" class="rounded shadow-md border border-gray-200" src="/images/features/pause.png" />
            </p>
            <p class="text-sm max-w-sm">
                You can pause your code. No need to install a special PHP extension.
            </p>
        </div>

        <div class="mt-8">
            <h3 class="flex items-center">
                <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-gray-500"></i>
                Your IDE's sidekick
            </h3>
            <p class="py-2">
                <img alt="Screenshot with hot keys" class="rounded shadow-md border border-gray-200" src="/images/features/sidekick.png" />
            </p>
            <p class="text-sm max-w-sm">
                Use system-wide hotkeys to jump to Ray, or have its compact window permanently float above all other windows.
            </p>
        </div>

    </div>
</section>

<section class="my-12 px-6 sm:px-12 pb-6
bg-gradient-to-r from-indigo-100 to-indigo-200">

        <div class="max-w-md mx-auto lg:max-w-none
        grid lg:grid-cols-3 gap-6 lg:gap-3 xl:gap-6">

        <blockquote class="-mt-8 flex flex-col border border-indigo-300 border-opacity-50 bg-white rounded shadow-lg overflow-hidden">
            <img
                alt=""
                class="hidden lg:block absolute opacity-25 w-full h-full object-cover"
                src="/images/quote-01.svg"/>
            <p class="flex-grow px-8 py-8 text-sm leading-relaxed">
                As an amateur developer that swears by <code>dd()</code>, I was thrilled to hear about Ray. Now I can <strong class="font-semibold">feel like a real developer</strong>, even without using 'real' debugging tools!
            </p>
            <small class="block
            bg-gray-200 bg-opacity-50 px-6 py-4">
                <a href="https://twitter.com/michaeldyrynda" class="flex items-center space-x-3">
                    <div class="flex-none w-10 h-10 rounded-full overflow-hidden shadow-sm">
                        <img src="/images/testimonials/michael.jpg">
                    </div>
                    <div class="text-xs ">
                        <div class="font-bold">Michael Dyrynda</div>
                        <div class="mt-0.5">
                            Senior Developer at MaxoTel
                        </div>
                    </div>
                </a>
            </small>
        </blockquote>

        <blockquote class="-ml-6 mr-6 lg:mx-0 lg:mt-6 lg:-mb-12 flex flex-col border border-indigo-300 border-opacity-50 bg-white rounded shadow-lg overflow-hidden">
            <img
                alt=""
                class="hidden lg:block absolute opacity-25 w-full h-full object-cover"
                src="/images/quote-02.svg"/>
            <div class="flex-grow flex items-center px-8 py-8 text-sm lg:text-base leading-relaxed">
                <p>Ray is a part of my <strong class="font-semibold">Essentials</strong> toolbox. It has the snapiness of a real debugger, but the simplicity of <code>dd()</code></p>
            </div>
            <small class="block
            bg-gray-200 bg-opacity-50 px-6 py-4">
                <a href="https://twitter.com/enunomaduro" class="flex items-center space-x-3">
                    <div class="flex-none w-10 h-10 rounded-full overflow-hidden shadow-sm">
                        <img src="/images/testimonials/nuno.jpg">
                    </div>
                    <div class="text-xs ">
                        <div class="font-bold">Nuno Maduro</div>
                        <div class="mt-0.5">
                            Software Engineer at Laravel
                        </div>
                    </div>
                </a>
            </small>
        </blockquote>

        <blockquote class="ml-6 -mr-6 lg:mx-0 lg:-mt-4 flex flex-col border border-indigo-300 border-opacity-50 bg-white rounded shadow-lg overflow-hidden">
            <img
                alt=""
                class="hidden lg:block absolute opacity-25 w-full h-full object-cover"
                src="/images/quote-03.svg"/>
            <div class="flex-grow flex items-center px-8 py-8 text-sm lg:text-base leading-relaxed">
                <p>
                    Ray is <strong class="font-semibold">the app I've been missing</strong> in my development toolkit. Debugging any sized application is now a breeze.
                </p>
            </div>
            <small class="block
            bg-gray-200 bg-opacity-50 px-6 py-4">
                <a href="https://twitter.com/jbrooksuk" class="flex items-center space-x-3">
                    <div class="flex-none w-10 h-10 rounded-full overflow-hidden shadow-sm">
                        <img src="/images/testimonials/james.jpg">
                    </div>
                    <div class="text-xs ">
                        <div class="font-bold">James Brooks</div>
                        <div class="mt-0.5">
                            Software Developer at Laravel
                        </div>
                    </div>
                </a>
            </small>
        </blockquote>

        </div>

</section>

    <section class="mt-24 pb-24 -mb-24 overflow-hidden">
        <div class="background-02 absolute inset-0" >
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
</main>

@include('partials.detectOS')





@endsection
