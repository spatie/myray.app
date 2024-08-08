{{ $downloadLinkMacIntel = '',
    $downloadLinkMacAppleSilicon = '',
    $downloadLinkWindows = '',
    $downloadLinkLinux = '' }}

<template x-if="download">
    <div class="fixed inset-0 p-8 lg:p-16 z-30 fix-z flex items-center justify-center"
        @keydown.window.escape="download = false">
        <div class="absolute inset-0 bg-midnight-dark bg-opacity-95"></div>
        <button class="absolute top-0 right-0 m-6 leading-none text-white text-3xl w-[1em]">&times;</button>

        <div class="max-w-[40rem] shadow-large-drop rounded-2xl" @mousedown.away="download = false">
            <div class="bg-gradient-to-b from-midnight to-bright-purple shadow-top-white rounded-2xl overflow-hidden">

                <div class="py-12 px-6 md:py-12 md:px-16 text-center border-b border-white border-opacity-10">

                    <h2
                        class="font-display font-black text-3xl md:text-4xl mb-8 bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text leading-[1] text-balance">
                        Thanks for trying out Ray!
                    </h2>

                    <div class="flex flex-wrap gap-4 mb-6">

                        <div
                            class="flex-1 rounded-xl overflow-hidden bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] hover:from-orange hover:to-bright-orange">
                            <a class="flex flex-col items-center rounded-xl bg-bleak-purple-dark"
                                href="{{ $downloadLinkMacIntel }}" download>
                                <div class="py-4">
                                    <img src="/images/logos/logo-apple.svg" alt="Apple">
                                </div>
                                <div class="px-4 py-2 border-t border-white border-opacity-10 w-full">
                                    <p>macOS</p>
                                    <p class="text-xs">Universal</p>
                                </div>
                            </a>
                        </div>

                        <div
                            class="flex-1 rounded-xl overflow-hidden bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] hover:from-orange hover:to-bright-orange">
                            <a class="flex flex-col items-center rounded-xl bg-bleak-purple-dark"
                                href="{{ $downloadLinkMacIntel }}" download>
                                <div class="py-4">
                                    <img src="/images/logos/logo-windows.svg" alt="Windows">
                                </div>
                                <div class="px-4 py-2 border-t border-white border-opacity-10 w-full">
                                    <p>Windows</p>
                                    <p class="text-xs">x86 (Intel)</p>
                                </div>
                            </a>
                        </div>

                        <div
                            class="flex-1 rounded-xl overflow-hidden bg-gradient-to-b from-neutrals-white-20 to-red p-[1px] hover:from-orange hover:to-bright-orange">
                            <a class="flex flex-col items-center rounded-xl bg-bleak-purple-dark"
                                href="{{ $downloadLinkMacIntel }}" download>
                                <div class="py-4">
                                    <img src="/images/logos/logo-linux.svg" alt="Linux">
                                </div>
                                <div class="px-4 py-2 border-t border-white border-opacity-10 w-full">
                                    <p>Linux</p>
                                    <p class="text-xs">AppImage</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div>
                        {{-- <ul class="mt-2 mb-3 list-inside list-disc">
                            <li><a class="markup-link" download href="{{ $downloadLinkMacIntel }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">macOS (Intel)</a></li>
                            <li><a class="markup-link" download href="{{ $downloadLinkMacAppleSilicon }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">macOS (Apple Silicon)</a></li>
                            <li><a class="markup-link" download href="{{ $downloadLinkWindows }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">Windows</a></li>
                            <li><a class="markup-link" download href="{{ $downloadLinkLinux }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">Linux</a></li>
                        </ul> --}}
                    </div>

                    <div class="text-sm text-white text-opacity-75">
                        <p>By downloading Ray, you agree to our <a href="{{ route('termsOfUse') }}"
                                class="underline text-white text-opacity-75 hover:text-opacity-100">terms of use</a>.
                        </p>
                        <p>The free trial lets you send up to 10 messages per session.</p>

                    </div>

                </div>

                {{-- <form class="mt-4 md:flex items-stretch" method="POST" action="">
                    @csrf
                    <input
                        class="flex-grow px-3 h-10
                                bg-gray-100 focus:bg-indigo-100 rounded-sm
                                placeholder-indigo-400 focus:placeholder-transparent
                                focus:outline-none focus:ring-0 focus:bg-opacity-100"
                        id="email" type="email" name="email" required placeholder="Email">

                    <button type="submit"
                        class="
                            h-10 px-4
                            bg-gradient-to-r from-indigo-500 to-indigo-600
                            border-b border-r border-indigo-700
                            shadow-lg rounded-sm
                            font-bold text-white text-base
                            transform active:translate-y-px
                            ">
                        Submit
                    </button>

                    @error('email')
                        {{ $message }}
                    @enderror
                </form> --}}

                <div class="py-6 px-6 md:py-12 md:px-24">
                    <div class="absolute pointer-events-none inset-0 opacity-75">
                        <img class="max-w-none p-0 md:p-8" src="/images/24-background-5.svg" />
                    </div>
                    <x-form.newsletter />
                </div>

            </div>
        </div>

        {{--

        // Disabled for now as we can't detect M1 macs

        <script>

            setTimeout(function(){
                window.location = downLoadLink;
            }, 1000);
        </script>
        --}}
    </div>
</template>
