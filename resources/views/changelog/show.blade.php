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
        <div class="mx-auto px-6 sm:px-12 md:px-16">
            <x-intro.default title="What's new in Ray" tag="h1" />

            <section class="rounded-2xl overflow-hidden flex-1 border border-bleak-purple-light mb-8">
                <div class="p-8 md:p-12">
                    <div class="mb-4">
                        <div class="flex items-center gap-4">
                            <span
                                class="py-1 px-3 no-underline rounded-full bg-blue text-white font-semibold bg-bleak-purple text-sm shadow-top-white">Latest
                                release</span>
                            <time class="text-sm text-bleak-purple-extra-light" datetime="2024-09-02 10:00">02 September
                                2024</time>
                        </div>
                        <h2 class="font-display font-black text-4xl my-4">Ray 3.0.1</h2>
                    </div>
                    <div class="markup">
                        <p>
                            Morbi diam metus, aliquam sed tincidunt in, tempor a lacus. Vivamus mi mi, congue non
                            lobortis eget, accumsan quis elit. Etiam odio lectus, congue nec lorem ac.
                        </p>
                    </div>
                </div>
            </section>

            <section class="bg-bleak-purple-dark rounded-2xl overflow-hidden shadow-large-drop flex-1">
                <div class="p-8 md:p-12">
                    <div class="mb-4">
                        <div class="flex items-center gap-4">
                            <span
                                class="py-1 px-3 no-underline rounded-full bg-blue text-white font-semibold bg-gradient-to-r from-orange to-bright-orange text-sm shadow-top-white">Latest
                                major release</span>
                            <time class="text-sm text-bleak-purple-extra-light" datetime="2024-08-31 10:00">31 August
                                2024</time>
                        </div>
                        <h2 class="font-display font-black text-4xl my-4">Ray 3.0.0</h2>
                    </div>
                    <div class="markup">
                        <p class="text-lg">
                            We are pleased to announce the immediate release of Ray 3.0, Ray's biggest update since its
                            creation. Fusce sed justo id mi fermentum luctus vel at diam. Interdum et malesuada fames ac
                            ante ipsum primis in faucibus. Vivamus et gravida nulla. Curabitur sed semper risus, vel
                            ultricies
                            urna.
                        </p>
                        <h3>Features</h3>
                        <ul>
                            <li>Fusce sed justo id mi fermentum luctus vel at diam</li>
                            <li>Fusce sed justo id mi fermentum luctus vel at diam</li>
                            <li>Fusce sed justo id mi fermentum luctus vel at diam</li>
                        </ul>
                    </div>
                </div>
            </section>

        </div>

    </div>

    <div class="max-w-md mx-auto py-12 md:py-16 lg:pb-0">
        <x-form.newsletter />
    </div>

</x-layouts.default>
