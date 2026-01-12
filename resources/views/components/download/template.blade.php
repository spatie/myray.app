@props(['title' => 'Thanks for downloading Ray!', 'disclaimer' => null])

<div x-show="download"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 p-8 lg:p-16 z-30 fix-z flex items-center justify-center"
    @keydown.window.escape="download = false"
    style="display: none;">
    <div class="absolute inset-0 bg-midnight-dark bg-opacity-75"></div>
    <button class="absolute top-0 right-0 m-6 leading-none text-white text-3xl w-[1em]" @click="download = false">&times;</button>

    <div class="max-w-[40rem] shadow-large-drop rounded-2xl relative"
        @mousedown.away="download = false"
        x-show="download"
        x-transition:enter="ease-out duration-300 delay-100"
        x-transition:enter-start="opacity-0 transform translate-y-8"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-8">
            <div class="bg-gradient-to-b from-midnight to-midnight-extra-light shadow-top-white rounded-2xl overflow-hidden">

                <div class="py-12 px-6 md:py-12 md:px-16 text-center border-b border-white border-opacity-0">

                    <h2 class="font-display font-black text-3xl md:text-5xl mb-8 pb-2 bg-gradient-to-r from-orange to-bright-orange text-transparent bg-clip-text leading-[1] text-balance">
                        {{ $title }}
                    </h2>

                    <div class="grid gap-4 grid-cols-3 mb-6">

                        <x-download.platform
                            platform="macOS"
                            logo="/images/logos/logo-apple.svg"
                            :links="[
                                ['label' => 'ARM', 'url' => $downloadLinkMacArm64, 'event' => 'download-macos-arm64'],
                                ['label' => 'Intel', 'url' => $downloadLinkMacX64, 'event' => 'download-macos-x64'],
                            ]"
                        />

                        <x-download.platform
                            platform="Windows"
                            logo="/images/logos/logo-windows.svg"
                            :links="[
                                ['label' => 'x86 (Intel)', 'url' => $downloadLinkWindows, 'event' => 'download-windows'],
                            ]"
                        />

                        <x-download.platform
                            platform="Linux"
                            logo="/images/logos/logo-linux.svg"
                            :links="[
                                ['label' => 'AppImage', 'url' => $downloadLinkLinux, 'event' => 'download-linux'],
                            ]"
                        />

                    </div>

                    <div class="text-base text-bleak-purple-extra-light">
                        @if ($disclaimer)
                            {!! $disclaimer !!}
                        @else
                            <p>By downloading Ray, you agree to our <a href="{{ route('legal.terms') }}" class="underline text-white text-opacity-75 hover:text-opacity-100">terms of use</a>.</p>
                            <p>The free trial lets you send up to 20 messages per session.</p>
                        @endif
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

                <div class="py-6 px-6 border-t border-white/20 bg-midnight-extra-light md:py-8 md:px-24">
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
