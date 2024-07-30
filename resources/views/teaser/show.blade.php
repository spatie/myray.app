<!DOCTYPE html>
<html lang="en" class="bg-midnight text-white antialiased scroll-smooth">

<head>
    <x-layouts.head :title="'Ready for the next Ray?'" :description="'A big new release of Ray is just around the corner. Sign up and be the first to be notified when the new version gets released.'" color="#170636" />
</head>

<body class="overflow-x-hidden bg-gradient-to-b from-midnight to-midnight-extra-light page-teaser js-page-teaser">

    <div id="bg" class="absolute w-full pointer-events-none md:p-8">
        <img class="opacity-75 max-w-[80rem] mx-auto hidden md:block" src="/images/24-background-1.svg" alt="">
        <img class="opacity-75 mx-auto md:hidden" src="/images/24-background-1-m.svg" alt="">
    </div>

    <main class="static h-svh flex justify-center items-center">

        <div id="veil" class="absolute bg-midnight w-full h-full"></div>

        <div class="grid h-full">

            {{-- <div id="archive" class="row-[1/1] col-[1/1] lg:w-[48rem]">
                <div class="shrink-0 shadow-large-drop rounded-3xl overflow-hidden w-full">
                    <div
                        class="rounded-3xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white">
                        <div class="rounded-xl overflow-hidden">
                            <img class="w-full" src="/images/app/app_window_archive.svg" alt="">
                        </div>
                    </div>
                </div>
            </div> --}}

            <div id="window" class="row-[1/1] col-[1/1] self-end lg:self-center pointer-events-none lg:w-[56rem]">
                <div class="shrink-0 rounded-3xl shadow-large-drop overflow-hidden w-full">
                    <div
                        class="rounded-3xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white">
                        <div class="rounded-xl overflow-hidden">
                            <img class="w-full" src="/images/app/app_window_cta.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div id="form" class="lg:row-[1/1] col-[1/1] self-start lg:self-center">
                <div class="max-w-2xl mx-auto">
                    <div
                        class="rounded-xl bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] shadow-large-drop overflow-hidden">
                        <div
                            class="p-8 overflow-hidden bg-gradient-to-b from-midnight to-midnight-extra-light rounded-xl lg:p-16">
                            <x-form.teaser />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div
            class="flex absolute bottom-0 mb-2 left-auto right-auto p-1 gap-1 bg-white border border-white border-opacity-10 bg-opacity-20 rounded-2xl">
            <div class="w-12">
                <img src="/images/app/app_finder_icon_2@0.5x.png" alt="">
            </div>
            <div class="w-12">
                <img id="icon" src="/images/app/app_ray_icon@0.5x.png" alt="">
                <span id="indicator" class="absolute w-1 h-1 bottom-1 bg-white rounded-full"></span>
            </div>
            <div class="w-[1px] bg-white bg-opacity-20 my-0.5 mx-1"></div>
            <a href="https://spatie.be/?ref=myray.app" target="_blank" class="w-12 cursor-pointer hover:opacity-50">
                <img src="/images/app/app_spatie_icon@0.5x.png" alt="">
            </a>
        </div>

    </main>

    @livewire('dummy-component')

</body>

</html>
