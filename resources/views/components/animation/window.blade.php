<div class="w-full overflow-hidden rounded-xl lg:min-w-[45rem] lg:h-[30rem] group/window js-anim-window"
    x-data="{ tooltip: '' }" @mouseover="tooltip = ''" @mouseover.away="tooltip = ''">

    <div class="sticky top-0 z-10">
        <div
            class="bg-[#100424] border-b border-[#261A43] py-2 px-2 flex gap-6 items-center justify-between lg:gap-12 lg:px-4">

            <div class="flex">
                <img class="h-[1.875rem]" src="/images/app/icon_pause.svg" alt="">
                <img class="h-[1.875rem]" src="/images/app/icon_search.svg" alt="">

                <div>
                    <img class="h-[1.875rem]" src="/images/app/icon_clear.svg" alt="">
                    <x-animation.tooltip name="previous"
                        content="Clear the screen and archive messages for later reference." />
                </div>

            </div>

            <div class="flex gap-4 items-center">

                <div class="flex items-center">
                    <div class="flex items-center px-2 h-[1.875rem]">
                        <img class="h-3" src="/images/app/app_color_filters.svg" alt="">
                        <x-animation.tooltip class="right-0" name="filters"
                            content="Attach a color to your Ray calls to filter them." />
                    </div>
                    <div class="px-2 h-4 border-r border-white border-opacity-20"></div>
                </div>

                <div class="flex">
                    <img class="h-[1.875rem]" src="/images/app/icon_history.svg" alt="">
                    <img class="h-[1.875rem]" src="/images/app/icon_settings.svg" alt="">
                    <div>
                        <img class="h-[1.875rem]" src="/images/app/icon_servers.svg" alt="">
                        <x-animation.tooltip class="right-0" name="servers"
                            content="Connect with servers and listen for messages over SSH." />
                    </div>
                    <img class="h-[1.875rem]" src="/images/app/icon_pin.svg" alt="">
                </div>
            </div>

        </div>

        <div
            class="bg-[#100424] border-b border-[#261A43] py-2 px-4 flex gap-6 items-center justify-between lg:gap-12 lg:px-6">
            <strong>Debug Session 01</strong>
        </div>

    </div>

    <div class="bg-gradient-to-b from-[#14052E] to-[#1C0840] h-full static">

        <div class="flex gap-4 h-full w-full items-center justify-center absolute top-0 z-10 pointer-events-none js-animation-loader">
            <svg class="text-white" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <style>
                    .spinner_P7sC {
                        transform-origin: center;
                        animation: spinner_svv2 1.5s infinite linear
                    }

                    @keyframes spinner_svv2 {
                        100% {
                            transform: rotate(360deg)
                        }
                    }
                </style>
                <path
                    d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z"
                    class="spinner_P7sC" />
            </svg>
            <span class="text-bleak-purple-extra-light">Listening for calls ...</span>
        </div>

        <div class="flex gap-6 px-6 py-4 border-b border-[#261A43] opacity-0 -translate-y-1 z-[3] js-anim-message">
            <div class="my-2">
                <div class="bg-[#A1A1AA] outline outline-2 outline-offset-1 outline-[#A1A1AA50] w-2 h-2 rounded-full">
                </div>
            </div>

            <div class="leading-[1.4]">
                <div class="mb-2">
                    <p>Send about anything to Ray</p>
                </div>
                <div class="flex text-bleak-purple-extra-light text-sm gap-2">
                    <div>
                        <span class="underline">TestCommand.php:5</span>
                        <x-animation.tooltip name="ide" content="Quickly jump to your IDE" />
                    </div>
                    <span class="js-anim-timestamp">09:27:05</span>
                </div>
            </div>
        </div>

        <div class="flex gap-6 px-6 py-4 border-b border-[#261A43] opacity-0 -translate-y-1 z-[2] js-anim-message">
            <div class="my-2">
                <div class="bg-[#A1A1AA] outline outline-2 outline-offset-1 outline-[#A1A1AA50] w-2 h-2 rounded-full">
                </div>
            </div>

            <div>
                <div class="leading-[1.4]">
                    <div class="mb-2">
                        <code class="block bg-white bg-opacity-5 rounded-md p-3">
                            <pre class="text-[0.85em] font-mono break-all text-[#9CA3AF] leading-6">
<span class="text-[#818CF8]">array:2</span> [ ▼ 
    "<span class="text-[#49DE80]">a</span>" =&gt; 1 
    "<span class="text-[#49DE80]">b</span>" =&gt; <span class="text-[#818CF8]">array:1</span> [▶]
]
</pre>
                        </code>
                    </div>
                    <div class="flex text-bleak-purple-extra-light text-sm gap-2">
                        <span class="underline">TestCommand.php:12</span>
                        <span class="js-anim-timestamp">09:27:05</span>
                    </div>
                </div>
                <x-animation.tooltip name="message" content="Send and inspect objects, queries and much more" />
            </div>
        </div>

        <div class="flex gap-6 px-6 py-4 border-b border-[#261A43] opacity-0 -translate-y-1 js-anim-message">
            <div class="my-2">
                <div class="bg-[#49DE80] outline outline-2 outline-offset-1 outline-[#49DE8050] w-2 h-2 rounded-full">
                </div>
            </div>

            <div class="leading-[1.4]">
                <div class="mb-3">
                    <div class="border border-[#483A6C] rounded-md">
                        <div class="flex items-start gap-2 p-2">
                            <div class="text-bleak-purple-extra-light text-sm min-w-24">Message</div>
                            <div>A green message</div>
                        </div>
                        {{-- <div class="flex items-start gap-2 p-2">
                            <div class="text-bleak-purple-extra-light text-sm min-w-24">Type</div>
                            <div><code
                                    class="text-[0.85em] font-mono break-all">Illuminate\Database\SQLiteDatabaseDoesNotExistException</code>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="flex text-bleak-purple-extra-light text-sm gap-2">
                    <span class="underline">TestCommand.php:18</span>
                    <span class="js-anim-timestamp">09:27:05</span>
                </div>
            </div>
        </div>

    </div>

</div>
