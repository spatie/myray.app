@extends('front.layouts.master')

@section('title', 'Dump Debugging Evolved')

@section('description', 'Debug with Ray to fix problems faster')

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
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-400 bg-opacity-75"></i> <span>Use in <a
                                 href="/wordpress" class="underline">WordPress</a> or any PHP project</span>
                     </li>
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-400"></i> See models, mails, queries, … in Laravel
                    </li>
                     <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-500"></i> Debug locally or via SSH
                     </li>
                    <li class="flex lg:flex-row-reverse items-center">
                        <i class="flex-shrink-0 mt-1 mx-3 w-2 h-2 rounded-full bg-indigo-600"></i> <span>Works with <a
                                href="/javascript" class="underline">Javascript</a>, <a href="/javascript" class="underline">Node.js</a> and Ruby</span>
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

<section class="my-12 px-6 sm:px-12 pb-6 bg-gradient-to-r from-indigo-100 to-indigo-200">
    <div class="max-w-md mx-auto lg:max-w-none grid lg:grid-cols-3 gap-6 lg:gap-3 xl:gap-6">
        @include('components.testimonial', [
            'index' => 1,
            'quote' => 'As an amateur developer that swears by <code>dd()</code>, I was thrilled to hear about Ray. Now I can <strong class="font-semibold">feel like a real developer</strong>, even without using \'real\' debugging tools!',
            'avatar' => '/images/testimonials/michael.jpg',
            'author' => 'Michael Dyrynda',
            'title' => 'Senior Developer at MaxoTel',
            'url' => 'https://twitter.com/michaeldyrynda',
        ])

        @include('components.testimonial', [
            'index' => 2,
            'quote' => 'Ray is a part of my <strong class="font-semibold">Essentials</strong> toolbox. It has the snapiness of a real debugger, but the simplicity of <code>dd()</code>',
            'avatar' => '/images/testimonials/nuno.jpg',
            'author' => 'Nuno Maduro',
            'title' => 'Software Engineer at Laravel',
            'url' => 'https://twitter.com/enunomaduro',
        ])

        @include('components.testimonial', [
            'index' => 3,
            'quote' => 'Ray is <strong class="font-semibold">the app I\'ve been missing</strong> in my development toolkit. Debugging any sized application is now a breeze.',
            'avatar' => '/images/testimonials/james.jpg',
            'author' => 'James Brooks',
            'title' => 'Software Developer at Laravel',
            'url' => 'https://twitter.com/jbrooksuk',
        ])
    </div>
</section>

@include('partials.syntax')
</main>

@include('partials.detectOS')

@endsection
