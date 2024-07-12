@props(['name', 'image', 'role'])

<div class="flex items-center gap-x-4">
    <img src="{{ $image }}" alt="Image of {{ $name }}"
        class="h-12 w-12 rounded-full bg-indigo-50">
    <div class="leading-1">
        <p class="font-bold leading-tight">{{ $name }}</p>
        @if (isset($role))
            <p class="leading-tight text-white text-opacity-50">{{ $role }}</p>
        @endif
    </div>
</div>
