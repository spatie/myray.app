<section class="mt-24 pb-24 -mb-24 overflow-hidden">
    <div class="background-02 absolute inset-0 pointer-events-none" >
        <img
            alt=""
            style="bottom: 3%; height:650px"
            class="absolute w-full "
            src="/images/background-02.svg"/>
    </div>

    <div x-data="{ selected : 'PHP'}" class="
            mx-auto px-6 sm:px-12 md:px-16
            max-w-4xl
            markup
        ">
        <h2><span class="text-gradient">Simple syntax</span></h2>

        <div>
            <ul class="flex items-center gap-4 font-bold">
                <li class="bg-left-bottom cursor-pointer" :class="{'markup-link': (selected === 'PHP') }" @click="selected= 'PHP'">
                    PHP
                </li>
                <li class="bg-left-bottom  cursor-pointer" :class="{'markup-link': (selected === 'JavaScript') }"  @click="selected= 'JavaScript'">
                    JavaScript
                </li>
            </ul>
        </div>



        <div x-show="selected == 'PHP'">
            <dl class="grid bg-white bg-opacity-25 md:grid-cols-auto-1fr" >
                @include('components.syntax-php')
            </dl>
        </div>
        <div x-show="selected == 'JavaScript'">
            <dl class="grid bg-white bg-opacity-25 md:grid-cols-auto-1fr" >
                @include('components.syntax-javascript')
            </dl>
        </div>
        

        <p class="mt-6">
            <a href="{{spatieUrl('https://spatie.be/docs/ray') }}" class="font-semibold markup-link">Read the docs</a>
        </p>
    </div>

    <div class="flex justify-center">
        <div class="flex flex-col items-center">
            @include('partials.priceCard')
        </div>
    </div>
</section>
