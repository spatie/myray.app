@extends('front.layouts.master')

@section('title', 'Understand and fix bugs faster using Ray')

@section('description', 'Understand and fix bugs faster using Ray')

@section('content')

<main>

    <div class="mx-auto px-6 sm:px-12 md:px-16 pb-16
    max-w-4xl  ">

        <div class="flex flex-wrap lg:flex-nowrap items-center gap-x-24  w-full">
            <div>
                <p class="w-full text-center lg:text-left font-black text-4xl leading-tight">
                    Understand and fix bugs faster
                </p>

                <p class="mt-6 text-center lg:text-left text-indigo-900 text-opacity-50">
                    Ray is a desktop application that serves as the dedicated home for debugging output. Send, format
                    and filter debug information from both local projects and remote servers.
                </p>

            </div>

            <div class="w-full text-center lg:text-left mt-6">
                @include('partials.priceCard')
            </div>
        </div>


        <div class=" z-0 absolute inset-0 pointer-events-none">
            <img alt="" style="bottom: 3rem; height:700px" class="absolute w-full top-[30rem] lg:top-48 transform   "
                src="/images/background-01.svg" />
        </div>
    </div>

    <section class=" p-0 md:p-12">

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
        <div x-data="{ open: false }" class="
            mx-auto px-6 sm:px-0 flex justify-center items-start">


            <div class="md:mt-12 w-full pb-[75%] md:pb-0 " :class="open == true ? ' sm:h-full ' : ' sm:h-[30rem] '">

                <button class="absolute w-full h-full inset-0 group flex items-center justify-center"
                    @click="open = true;">


                    <img class="absolute w-full h-full top-0 left-0 object-cover
                        opacity-100 group-hover:opacity-90
                        transition-opacity duration-300
                        " src="/images/intro-video.jpg" alt="Intro screenshot">
                    <div class="h-14 px-6 mt-24 lg:mt-64
                        bg-gradient-to-r from-indigo-500 to-indigo-600
                        border-b border-r border-indigo-700
                        shadow-lg rounded-sm
                        font-bold text-white text-xl
                        transform active:translate-y-px
                        focus:outline-none focus:ring-0
                        whitespace-nowrap
                        overflow-hidden flex items-center">
                        Introducing Ray <i class="ml-1.5 mt-1 fas fas fa-play text-xs"></i>
                    </div>
                    <div class="h-0
                bg-gradient-to-r from-indigo-700 to-indigo-900"
                        :class="open ? ' ' : 'sm:top-1/2 sm:transform sm:-translate-y-1/2'">
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
                        <div class="w-full h-64 md:h-96 lg:h-full">
                            <iframe src="https://player.vimeo.com/video/688914670?autoplay=1" width="640" height="360"
                                class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""
                                @mousedown.away="open = false; " @touchstart.outside="open = false; ">
                            </iframe>
                        </div>

                    </div>
                </template>


            </div>

        </div>
    </section>

    <section class="mt-12 lg:mt-24">
        <div class="mx-auto p-6 mb-12 grid gap-10  rounded sm:px-12 md:px-16
        max-w-4xl
          items-start">
            <div class="col-span-5 ">
                <h3 class="text-left text-3xl font-bold">
                    Use Ray in your next project
                </h3>
                <p class="text-sm mt-4 text-left  w-full ">
                    Ray is up and running in seconds in these languages and frameworks!
                </p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 col-span-5 gap-x-16">
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/framework-agnostic-php"
                    class="flex items-center gap-4 border-b border-black/20 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80  contrast-200 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/php.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        PHP</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/javascript"
                    class="flex items-center gap-4 border-b border-black/20 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80  contrast-200 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/javascript.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        JavaScript</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/laravel"
                    class="flex items-center gap-4 border-b border-black/20 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80  contrast-200 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/laravel.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        Laravel</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/wordpress"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/wordpress.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        WordPress</p>
                </a>

                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/vue"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/vue.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        Vue</p>
                </a>

                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/alpinejs"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/alpine.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        Alpine</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/craft-cms"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/cms.png" alt="">
                    <p class="w-full text-left text-xs ">
                        Craft CMS</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/go"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/go.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        Go</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/nodejs"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/nodejs.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        NodeJS</p>
                </a>


                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/yii2"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/yii.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        Yii2</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/expressjs"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/ex.png" alt="">
                    <p class="w-full text-left text-xs ">
                        Express</p>
                </a>
                <a href="https://spatie.be/docs/ray/v1/installation-in-your-project/bash"
                    class="flex items-center gap-4 border-b border-black/20 h-16 py-4 justify-between group">
                    <img class="  w-8 grayscale opacity-80 contrast-200 group-hover:contrast-100 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                        src="/images/frameworks/bash.svg" alt="">
                    <p class="w-full text-left text-xs ">
                        Bash</p>
                </a>
            </div>

        </div>
    </section>





    <section class="overflow-hidden">




        <div class="
        mx-auto px-6 sm:px-12 md:px-16
        pt-0 lg:pt-24
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
                    " src="/images/laravel-screenshot.jpg" alt="Intro screenshot">
                        <div class="h-14 px-6 top-1/2
                    bg-gradient-to-r from-indigo-500 to-indigo-600
                    border-b border-r border-indigo-700
                    shadow-lg rounded-sm
                    font-bold text-white text-xl
                    transform active:translate-y-px
                    focus:outline-none focus:ring-0
                    whitespace-nowrap
                    overflow-hidden flex items-center">
                            Show Laravel Features <i class="ml-1.5 mt-1 fas fas fa-play text-xs"></i>
                        </div>
                        <div class="absolute w-12 h-full top-0 -right-6 transform skew-x-6 bg-orange-500">

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
                            <iframe src="https://player.vimeo.com/video/688914670?autoplay=1" class="w-full h-full"
                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""
                                @mousedown.away="open = false">
                            </iframe>
                        </div>
                    </template>
                </div>
            </div>
            <div class=" flex items-center h-full">
                <div class="my-8 md:my-0 px-6 md:px-0">
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
        mt-24
        markup
        grid md:gap-8 lg:gap-x-16 md:grid-cols-2 items-start
    ">
            <div class=" flex items-center md:justify-end pl-16 h-full">
                <div class="my-8 md:my-0 px-6 md:px-0">
                    <h3 class="flex items-center text-white">
                        <i class="flex-shrink-0 mr-3 w-2 h-2 rounded-full bg-indigo-500"></i>
                        Debug faster in WordPress
                    </h3>
                    <p class="text-sm max-w-sm text-white">
                        When installed in a WordPress app, Ray can format show the queries you executed, all sent mails,
                        and much more.
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
                    " src="/images/wordpress.jpg" alt="Intro screenshot">
                        <div class="h-14 px-6 top-1/2
                    bg-gradient-to-r from-indigo-500 to-indigo-600
                    border-b border-r border-indigo-700
                    shadow-lg rounded-sm
                    font-bold text-white text-xl
                    transform active:translate-y-px
                    focus:outline-none focus:ring-0
                    whitespace-nowrap
                    overflow-hidden flex items-center">
                            Show Wordpress Features <i class="ml-1.5 mt-1 fas fas fa-play text-xs"></i>
                        </div>
                        <div class="absolute w-12 h-full top-0 -left-6 transform -skew-x-6 bg-indigo-500">

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
                            <iframe src="https://player.vimeo.com/video/688914922?autoplay=1" class="w-full h-full"
                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""
                                @mousedown.away="open = false">
                            </iframe>
                        </div>
                    </template>
                </div>
            </div>

        </div>
    </section>



    <section>

        <div class="
mx-auto px-6 sm:px-12 md:px-16
max-w-4xl my-16
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
                        src="/images/features/server.png" />
                </p>
                <p class="text-sm max-w-sm">
                    Ray is able to display debugging information from your server servers. This happens securely via
                    SSH.
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

    <section id="screenshots-wrapper" class="relative w-full overflow-hidden bg-gray-200 mt-24
        markup
        grid  md:grid-cols-2 items-start">
        <div class="col-span-1 max-h-56 md:max-h-72 flex items-center justify-center ">
            <img id="screenshots" class="relative w-[200%] lg:w-[150%] max-w-none   " src="/images/screenshots-100.jpg"
                alt="">

        </div>



        <div
            class="relative col-span-1 max-w-4xl markup p-4 px-12 sm:px-12 md:px-16 right-0 flex items-center top-0  text-white bg-indigo-500 h-full">
            <div>
                <h3 class="flex items-center gap-3">
                    <i class="flex-shrink-0 w-2 h-2 rounded-full  bg-red-500"></i>
                    Easy on the eyes
                </h3>
                <p class="text-sm max-w-sm w-full text-left">
                    Ray presents debugging information in a clean way. This will greatly help you understand and fix
                    bugs faster.
                </p>
            </div>

            <div class="absolute w-12 h-full top-0 -left-6 transform -skew-x-6 bg-orange-500">

            </div>

        </div>
    </section>



    <section id="testimonial-wrapper" data-testimonialcount="{{count($testimonials)}}"
        class="relative mb-12 px-6 mt-24  sm:px-12 overflow-hidden  pb-12 w-full ">

        <h3 class="text-3xl  font-bold">
            Nice people saying nice things
        </h3>


        <div id="testimonial-grow-container"
            class="relative  mx-auto pt-12 lg:pt-12 lg:w-full   flex flex-wrap lg:flex-nowrap  gap-6 lg:gap-3 xl:gap-6 transition-all  overflow-hidden  ">

            @include('components.testimonials')
            <div id="testimonials-gradient"
                class="absolute inline-block   w-full h-24 bottom-0 left-0 overflow-hidden  bg-gradient-to-t from-white ">
            </div>

        </div>

        {{--
        <div class="relative lg:hidden mx-auto pt-12  flex gap-y-6 flex-wrap lg:gap-3 xl:gap-6 h-full ">

            <div class="testimonial-down lg:w-1/3 w-full flex flex-wrap gap-4  ">
                @foreach($testimonials as $testimonial)
                @if ($loop->index >= 3)
                @break
                @endif
                @include('components.testimonial', [
                'index' => rand(0,3),
                'quote' => $testimonial->text,
                'avatar' => '/images/testimonials/' . $testimonial->image . '.jpg',
                'author' => $testimonial->name,
                'title' => $testimonial->title,
                'url' => $testimonial->url,
                ])
                @endforeach
            </div>



        </div>

        --}}



        <div class="w-full relative mt-12 lg:mt-0 left-0  items-center justify-center flex">
            <div id="testimonial-showMor-btn">
                <x-button class="mt-4 ">
                    Show more...
                </x-button>
            </div>


        </div>



    </section>



    @include('partials.syntax')
</main>

@include('partials.detectOS')

@endsection