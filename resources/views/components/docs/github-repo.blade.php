@props(['repo'])

<a href="https://github.com/{{ $repo }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 no-underline text-white/70 hover:text-white transition-colors">
    <x-icons.github class="shrink-0" />
    <span>{{ $repo }}</span>
</a>
