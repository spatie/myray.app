<div class="flex text-xs md:text-xxs items-center mb-4 text-midnight-dark">
    <a wire:navigate href="/docs" class="mr-2">
        <x-icons.home />
    </a>

    @foreach($categories as $category)
        <x-icons.caret-right />

        <a wire:navigate class="mr-2" href="/docs/{{$category->slug}}">{{$category->title}}</a>
    @endforeach

    <x-icons.caret-right />

    <a wire:navigate class="mr-2 font-bold" href="/docs/{{$category->slug}}">{{$page->title}}</a>
</div>
