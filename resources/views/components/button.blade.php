<button type="submit" id="{{ $attributes['id']}}" class="
group
h-14 px-6
bg-gradient-to-r from-orange-500 to-orange-600
border-b border-r border-orange-700
shadow-lg rounded-sm
font-bold text-white text-xl
transform active:translate-y-px
focus:outline-none focus:ring-0
whitespace-nowrap
{{ $attributes['class']}}
overflow-hidden
">
    {{ $slot }}

    <div class="absolute inset-0">
        <svg class="w-full h-auto" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 88 34" style="enable-background:new 0 0 88 34;" xml:space="preserve">
            <g>
                <linearGradient id="SVGID_button_" gradientUnits="userSpaceOnUse" x1="39.3175" y1="3.5259" x2="50.6418" y2="53.8052" gradientTransform="matrix(1 0 0 -1 0 33.7)">
                    <stop offset="0" style="stop-color:#FFFFFF;stop-opacity:0" />
                    <stop offset="1" style="stop-color:#FFFFFF;stop-opacity:1" />
                </linearGradient>
                <polyline class="
            opacity-0 group-hover:opacity-50
            transform translate-x-16 -translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0
            transition-all duration-500
            " fill="url(#SVGID_button_)" points="-0.2,34 71.6,33.8 88,0 -0.2,19.7 -0.2,34 	"/>
            </g>
        </svg>
    </div>
</button>

