@props(['name', 'image', 'role'])

<div class="flex items-center gap-x-3">
    <img src="{{ $image }}" alt="Image of {{ $name }}"
        class="h-8 w-8 rounded-full bg-bright-purple-light">
    <div class="leading-1">
        <p class="leading-tight">{{ $name }}</p>
        @if (isset($role))
            <p class="leading-tight text-white/50">{{ $role }}</p>
        @endif
    </div>
</div>
