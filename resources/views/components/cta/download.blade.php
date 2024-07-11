{{ $downloadLinkMacIntel = '',
    $downloadLinkMacAppleSilicon = '',
    $downloadLinkWindows = '',
    $downloadLinkLinux = '' }}

<div x-data="{ download: false }">

    <a data-role="download-link"
        class="inline-flex gap-2 text-xl px-6 py-4 font-bold rounded-md bg-gradient-to-r from-orange to-bright-orange shadow-top-white align-middle hover:to-orange"
        href="{{ $downloadLinkMacIntel }}" @click.prevent="download = true">Download trial
        <img class="inline w-20" src="/images/os-logos.svg" alt="For MacOS, Windows and Linux">
    </a>

    <template x-if="download">
        <div class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center"
            @keydown.window.escape="download = false">
            <div class="absolute inset-0 bg-midnight bg-opacity-80">
            </div>
            <button class="absolute top-0 right-0 m-6 leading-none text-white text-3xl w-[1em]">&times;</button>

            <div class="shadow-large-drop rounded-2xl" @mousedown.away="download = false">
                <div class="bg-gradient-to-b from-midnight to-bright-purple p-8">
                    <h2>
                        <span class="text-gradient">Thanks for trying out Ray!</span>
                    </h2>
                    <div>
                        Pick a version:
                        <ul class="mt-2 mb-3 list-inside list-disc">
                            <li><a class="markup-link" download href="{{ $downloadLinkMacIntel }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">macOS (Intel)</a></li>
                            <li><a class="markup-link" download href="{{ $downloadLinkMacAppleSilicon }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">macOS (Apple Silicon)</a></li>
                            <li><a class="markup-link" download href="{{ $downloadLinkWindows }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">Windows</a></li>
                            <li><a class="markup-link" download href="{{ $downloadLinkLinux }}"
                                    onclick="fathom.trackGoal('YMAVPAEJ', 0);">Linux</a></li>
                        </ul>
                    </div>

                    <div class="mb-8 text-xs text-indigo-900 text-opacity-50">
                        By downloading Ray, you explicitly agree to our
                        <a href="{{ route('termsOfUse') }}" class="markup-link">terms of use</a>.
                    </div>

                    <div class="mt-4">
                        <strong>Subscribe</strong> for Ray updates and promotions.
                    </div>

                    {{-- <form class="mt-4 md:flex items-stretch" method="POST" action="{{ route('subscribe') }}">
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

                    <x-form.newsletter />

                    <div class="mt-4 text-xs text-indigo-900 text-opacity-50">
                        No spam, just a few updates a year.
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
</div>
