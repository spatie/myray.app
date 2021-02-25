<div aria-label="tooltip {{ $attributes['id'] }}" @click.stop="tooltip = '{{ $attributes['id'] }}'"
    class="group absolute inset-0 -m-1">

        <div class="absolute inset-0
        tooltip-reveal
        rounded-sm">
        </div>

        <div class="absolute inset-0
        tooltip-hover
        rounded-sm">
        </div>

        <template 
            x-if="tooltip == '{{ $attributes['id'] }}'"
            
        >
            <div 
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="
                z-50 absolute -m-1 {{ $attributes['direction'] }} pl-4 pr-6 py-3 w-48
                bg-gradient-to-r from-indigo-700 to-indigo-800 shadow-xl
                text-indigo-100 text-left text-xs">
                {{ $slot }}

                <div @click.stop="tooltip = ''" class="absolute top-0 right-0 mt-1 mr-1.5 leading-none opacity-50 hover:opacity-75 cursor-pointer">
                    &times;
                </div>
            </div>
        </template>
    </div>
