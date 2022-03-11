@extends('front.layouts.master')

@section('title', 'Dump Debugging Evolved')

@section('description', 'Debug with Ray to fix problems faster')

@section('content')

<main>

    <div class="mx-auto px-6 sm:px-12 md:px-16 pb-16
    max-w-4xl  ">

        <div class="flex flex-wrap lg:flex-nowrap items-center gap-x-24  w-full">
            <p class="w-full text-center lg:text-left font-black text-4xl leading-relaxed">
                Debug with Ray <br>to fix problems faster
            </p>

            <div class="w-full text-center lg:text-left ">
                @include('partials.priceCard')
            </div>
        </div>


        <div class="background-01 absolute inset-0 pointer-events-none">
            <img alt="" style="bottom: 3rem; height:700px" class="absolute w-full top-28 transform scale-x-[-1]  opacity-25 lg:opacity-75"
                src="/images/background-01.svg" />
        </div>
    </div>

    <section class=" p-12">

        <div class="">

        </div>



        <div class="
            mx-auto px-6 sm:px-12 md:px-16
            max-w-6xl
            grid gap-8 lg:gap-16 grid-cols-6 items-start">



            <div class="col-span-6 lg:col-span-3">

                @include('partials.rayScreenCode')
            </div>
            <div class="col-span-6 lg:col-span-3 lg:-ml-12">
                <div class="h-[75%]
                    border border-gray-200 bg-white shadow-2xl rounded">
                    @include('partials.rayScreen')


                </div>

                <p class="
                    text-right lg:text-left
                    m-4
                    text-xs text-indigo-900 text-opacity-50">
                    Available for
                    <i class="fab fa-apple"></i> /
                    <i class="fab fa-windows"></i> /
                    <i class="fab fa-linux"></i>
                </p>
            </div>
        </div>




    </section>

    <section>
        <div class="
            mx-auto px-6 sm:px-0 flex justify-center items-start">


            <div class="mt-12 w-full h-[30rem]  shadow-xl  overflow-hidden
                ">
                <div x-data="{ open: false }" style="padding-bottom: 75%;" class="h-0 top-1/2 transform -translate-y-1/2
                bg-gradient-to-r from-indigo-700 to-indigo-900">
                    <button class="absolute w-full h-full inset-0 group flex items-center justify-center"
                        @click="open = true">
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
                            Introducing Ray <i class="ml-1.5 fas fas fa-play text-xs"></i>
                        </div>
                    </button>
                    <template x-if="open">
                        <div class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center"
                            @keydown.window.escape="open = false">
                            <div class="
                                absolute inset-0 opacity-75
                                bg-gradient-to-r from-indigo-500 to-indigo-900">
                            </div>
                            <button class="
                                absolute top-0 right-0 m-6
                                leading-none text-white text-3xl
                                ">×</button>
                            <iframe src="https://player.vimeo.com/video/497806481?autoplay=1" class="w-full h-full"
                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""
                                @click.away="open = false">
                            </iframe>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-12">
        <div class="mx-auto p-6 mb-12 bg-gray-100 rounded sm:px-12 md:px-16
        max-w-4xl
        markup
          items-start">
            <div class="col-span-2 mt-4">
                <h3 class="text-left text-3xl font-bold">
                    Use ray in your next project
                </h3>
                <p class="text-sm text-left  w-full ">
                    Ray works perfectly using these frameworks
                </p>
            </div>


            <div class="grid grid-cols-4 col-span-8 gap-x-16">
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80  contrast-200 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/laravel.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Laravel</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/alpine.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Alpine</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/cms.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Cms</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/go.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Go</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/nodejs.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        NodeJS</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/rails.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Ruby</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/vue.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Vue</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/wordpress.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Wordpress</p>
                </div>
                <div class="flex flex-wrap justify-between group">
                    <img class=" p-10 w-full grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/yii.svg" alt="">
                    <p
                        class="w-full text-center -mt-2 text-xs opacity-0 transform translate-y-2 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        Yii2</p>
                </div>
            </div>

        </div>
    </section>

    <section id="screenshots-wrapper"
        class="relative w-full h-96 my-24 bg-gray-200 overflow-hidden flex items-center justify-center">
        <img id="screenshots" class="relative w-full max-w-none  " src="/images/screenshots-100.jpg" alt="">

        <div class="absolute top-0 left-0 w-full h-full ">

        </div>
    </section>




    <section class="mb-24 overflow-hidden">

        <div class="w-full mb-24">
            <h3 class="text-center mb-8 text-3xl font-bold">
                Easy on the eyes
            </h3>

            <p class="text-sm max-w-sm mx-auto w-full text-center">
                Ray presents debugging information in a clean way. This will greatly help you understand and fix bugs faster.
            </p>
        </div>



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
                    <img alt="Screenshot with debug info" class="rounded shadow-md border border-gray-200"
                        src="/images/features/good-lookin.png" />
                </p>
                <p class="text-sm max-w-sm">
                    Strings, array, objects, … you can send anything to Ray.
                    Output gets formatted automatically and displays the origin of your calls.
                </p>
            </div>

            <div>
                <h3 class="flex items-center">
                    <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full  bg-red-500"></i>
                    Organize calls
                </h3>
                <p class="py-2">
                    <img alt="Screenshot with colored calls" class="rounded shadow-md border border-gray-200"
                         src="/images/features/organise-calls.png" />
                </p>
                <p class="text-sm max-w-sm">
                    Collapse and expand calls, or group items that belong together. Assign Ray colors to your dumps, so
                    you can make use of the color filters in the UI.
                </p>
            </div>


        </div>
        <div class="
         bg-indigo-600
        my-24
        markup
        grid gap-8 lg:gap-x-16 md:grid-cols-2 items-start
    ">


            <div class="
            ">
                <div x-data="{ open: false }" style="padding-bottom: 75%;" class="h-0
            bg-gradient-to-r from-indigo-700 to-indigo-900">
                    <button
                        class="absolute w-full h-full inset-0 group flex  top-1/2 transform -translate-y-1/2  justify-center"
                        @click="open = true">
                        <img class="absolute w-full h-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 object-cover
                    opacity-75 group-hover:opacity-50
                    transition-opacity duration-300
                    " src="/images/intro-1200.png" alt="Intro screenshot">
                        <div class=" absolute top-1/2 transform translate-y-1/2
                    px-4 py-2
                    bg-indigo-500 rounded-sm
                    text-white font-bold text-base
                    group-hover:bg-indigo-600
                    cursor-pointer transition-colors duration-300">
                            Show Laravel features <i class="ml-1.5 fas fas fa-play text-xs "></i>
                        </div>
                    </button>
                    <template x-if="open">
                        <div class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center"
                            @keydown.window.escape="open = false">
                            <div class="
                            absolute inset-0 opacity-75
                            bg-gradient-to-r from-indigo-500 to-indigo-900">
                            </div>
                            <button class="
                            absolute top-0 right-0 m-6
                            leading-none text-white text-3xl
                            ">×</button>
                            <iframe src="https://player.vimeo.com/video/497806481?autoplay=1" class="w-full h-full"
                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""
                                @click.away="open = false">
                            </iframe>
                        </div>
                    </template>
                </div>
            </div>
            <div class=" flex items-center h-full">
                <div>
                    <h3 class="flex items-center text-white">
                        <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-orange-400"></i>
                        Ray loves Laravel
                    </h3>
                    <p class="text-sm max-w-sm text-white">
                        When installed in a Laravel app, Ray can format models and queries, track events, and even
                        render
                        mailables.
                    </p>
                </div>

            </div>
        </div>
        <div class="
        mx-auto px-6 sm:px-12 md:px-16
        max-w-4xl
        markup
        grid gap-8 lg:gap-x-16 md:grid-cols-2 items-start
    ">

            <div>
                <h3 class="flex items-center">
                    <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-blue-500"></i>
                    Setting breakpoints
                </h3>
                <p class="py-2">
                    <img alt="Screenshot with breakpoints" class="rounded shadow-md border border-gray-200"
                         src="/images/features/pause.png" />
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
                    <img alt="Screenshot with hot keys" class="rounded shadow-md border border-gray-200"
                         src="/images/features/sidekick.png" />
                </p>
                <p class="text-sm max-w-sm">
                    Use system-wide hotkeys to jump to Ray, or have its compact window permanently float above all other
                    windows.
                </p>
            </div>

        </div>
        <div class="bg-orange-500
        my-24
        markup
        grid gap-8 lg:gap-x-16 md:grid-cols-2 items-start
    ">
            <div class=" flex items-center justify-end pl-16 h-full">
                <div>
                    <h3 class="flex items-center text-white">
                        <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-indigo-500"></i>
                        Debug faster in WordPress
                    </h3>
                    <p class="text-sm max-w-sm text-white">
                        When installed in a WordPress app, Ray can format show you executed, sent mails and much more.
                    </p>
                </div>

            </div>
            <div class="
            ">
                <div x-data="{ open: false }" style="padding-bottom: 75%;" class="h-0
            bg-gradient-to-r from-indigo-700 to-indigo-900">
                    <button
                        class="absolute w-full h-full inset-0 group flex  top-1/2 transform -translate-y-1/2  justify-center"
                        @click="open = true">
                        <img class="absolute w-full h-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 object-cover
                    opacity-75 group-hover:opacity-50
                    transition-opacity duration-300
                    " src="/images/intro-1200.png" alt="Intro screenshot">
                        <div class=" absolute top-1/2 transform translate-y-1/2
                    px-4 py-2
                    bg-indigo-500 rounded-sm
                    text-white font-bold text-base
                    group-hover:bg-indigo-600
                    cursor-pointer transition-colors duration-300">
                            Show WordPress features <i class="ml-1.5 fas fas fa-play text-xs "></i>
                        </div>
                    </button>
                    <template x-if="open">
                        <div class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center"
                            @keydown.window.escape="open = false">
                            <div class="
                            absolute inset-0 opacity-75
                            bg-gradient-to-r from-indigo-500 to-indigo-900">
                            </div>
                            <button class="
                            absolute top-0 right-0 m-6
                            leading-none text-white text-3xl
                            ">×</button>
                            <iframe src="https://player.vimeo.com/video/497806481?autoplay=1" class="w-full h-full"
                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""
                                @click.away="open = false">
                            </iframe>
                        </div>
                    </template>
                </div>
            </div>

        </div>
        <div class="
mx-auto px-6 sm:px-12 md:px-16
max-w-4xl
markup
grid gap-8 lg:gap-x-16 md:grid-cols-2 items-start
">

            <div class="mt-8">
                <h3 class="flex items-center">
                    <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-orange-400"></i>
                    Remote debugging? No problem!
                </h3>
                <p class="py-2">
                    <img alt="Screenshot with laravel specific info" class="rounded shadow-md border border-gray-200"
                         src="/images/features/laravel.png" />
                </p>
                <p class="text-sm max-w-sm">
                    Ray is able to display debugging information from your server servers. This happens securely via SSH.
                </p>
            </div>

            <div class="mt-8">
                <h3 class="flex items-center">
                    <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-gray-500"></i>
                    Multi-window goodness
                </h3>
                <p class="py-2">
                    <img alt="Screenshot dark mode" class="rounded shadow-md border border-gray-200"
                         src="/images/features/dark.png" />
                </p>
                <p class="text-sm max-w-sm">
                    Ray can display debugging information for each project in a separate window.
                </p>
            </div>




        </div>
    </section>

    <section defer-x-data="testimonials" id="testimonial-wrapper" class="my-12 px-6 sm:px-12  pb-20 w-full ">
        <div class="absolute lg:w-full w-full h-full lg:h-full left-0 bg-gradient-to-r from-indigo-100 to-indigo-200">
        </div>
        <div
            class="max-w-md mx-auto pt-6 lg:pt-0 lg:max-w-none lg:w-full  flex  gap-6 lg:gap-3 xl:gap-6  overflow-hidden ">

            @include('components.testimonials')


        </div>

        <div class="w-full absolute -bottom-6 left-0 flex items-center justify-center">
            <x-button class="mt-4 " id="showMoreTestimonials">
                Show more...
            </x-button>
            <x-button class="-mt-40 hidden " id="closeMoreTestimonials">
                I'm convinced...
            </x-button>
        </div>

    </section>

    @include('partials.syntax')
</main>

@include('partials.detectOS')

@endsection
