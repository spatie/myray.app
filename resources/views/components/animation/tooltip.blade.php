<div aria-label="tooltip {{ $name }}" @mouseover.stop="tooltip = '{{ $name }}'" class="group/tooltip absolute inset-0 -m-0.5">

    <div class="transition absolute inset-0 bg-white bg-opacity-0 rounded-lg group-hover/window:bg-opacity-15 group-hover/tooltip:bg-opacity-30"></div>

    <template x-if="tooltip == '{{ $name }}'">
        <div {{ $attributes->twMerge("z-10 absolute top-full mt-1 w-48 p-2 text-sm leading-tight text-white text-center rounded-md shadow-large-drop bg-gradient-to-r from-orange to-bright-orange") }}>
            {{ $content }}
        </div>
    </template>
</div>