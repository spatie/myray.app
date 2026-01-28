<button
    {{ $attributes->merge(['type' => 'submit'])->twMerge([
        'group h-14 px-6 bg-gradient-to-r from-orange-500 to-orange-600 border-b border-r border-orange-700 shadow-lg rounded-sm font-bold text-white text-xl transform whitespace-nowrap overflow-hidden',
        'active:translate-y-px',
        'focus:outline-none focus:ring-0',
    ]) }}
>
    {{ $slot }}
</button>
