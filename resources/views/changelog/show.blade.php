<x-layouts.default title="Changelog"
    description="Stay up to date with all of the latest additions and improvements we've made to Ray.">

    <x-slot name="background">
        <div class="bg-gradient-to-b from-midnight-extra-light to-midnight md:flex md:justify-center">
            <div class="w-full translate-y-[-18rem]">
                <img class="opacity-20 max-w-[90rem] mx-auto" src="/images/24-background-3.svg" alt="">
            </div>
        </div>
    </x-slot>

    <div class="container max-w-4xl mx-auto pb-12">
        <div class="mx-auto px-6 space-y-8 sm:px-12 md:px-16">

            <x-intro.default
                title="What's new in Ray"
                text="Stay up to date with all of the latest improvements we've made to Ray" tag="h1"
            />

            @if($versions->first()?->isMajorRelease())
                @php $pinnedVersion = $versions->first(); @endphp
                <section class="rounded-3xl bg-gradient-to-b from-neutrals-white-20 to-transparent p-3 shadow-top-white">
                    <div class="bg-midnight-dark bg-opacity-75 rounded-2xl overflow-hidden flex-1">
                        <div class="p-8 md:p-12">
                            <div class="mb-4 space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <h2 class="font-display font-black text-4xl">{{ $pinnedVersion->version }}</h2>
                                        <span class="py-1 px-3 no-underline rounded-full bg-blue text-white font-semibold bg-gradient-to-r from-orange to-bright-orange text-sm shadow-top-white">
                                            Major release
                                        </span>
                                    </div>
                                    <span class="flex items-center gap-1.5 text-sm text-bleak-purple-extra-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 17v5"/><path d="M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z"/></svg>
                                        Pinned
                                    </span>
                                </div>
                                <span class="text-sm text-bleak-purple-extra-light inline-block">
                                    <time datetime="{{ $pinnedVersion->date->format('Y-m-d') }}">{{ $pinnedVersion->date->format('j F Y') }}</time>
                                </span>
                            </div>
                            <div class="markup">
                                <x-markdown>{!! $pinnedVersion->content !!}</x-markdown>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <h2 class="text-lg font-bold">All releases</h2>

            @foreach($versions as $version)
                <section class="rounded-2xl overflow-hidden flex-1 border border-bleak-purple-light">
                    <div class="p-4 md:p-8 md:py-6">
                        <div class="mb-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <h2 class="font-display font-black text-3xl">{{ $version->version }}</h2>
                                    @if($loop->first)
                                        <span class="py-1 px-3 no-underline rounded-full bg-blue text-white font-semibold bg-midnight-extra-light text-sm">
                                            Latest release
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <span class="text-sm text-bleak-purple-extra-light inline-block">
                                <time datetime="{{ $version->date->format('Y-m-d') }}">{{ $version->date->format('j F Y') }}</time>
                            </span>
                        </div>
                        <div class="markup">
                            <x-markdown>{!! $version->content !!}</x-markdown>
                        </div>
                    </div>
                </section>
            @endforeach

        </div>

    </div>

    <div class="container max-w-4xl mx-auto pb-8 mt-8 border-t border-white border-opacity-10 md:pb-0 md:mt-16">
        <div class="max-w-md mx-auto px-6 py-8 md:py-16 md:px-0 lg:pb-0">
            <x-form.newsletter />
        </div>
    </div>

</x-layouts.default>
