<div class="flex text-xs md:text-xxs items-center mb-4 text-midnightDark">
    <a href="/docs" class="mr-2">
        @include('partials.svg.icon-home')
    </a>

    @foreach($categories as $category)
        @include('partials.svg.icon-caret-right')

        <a class="mr-2" href="/docs/{{$category->slug}}">{{$category->title}}</a>
    @endforeach

    @include('partials.svg.icon-caret-right')

    <a class="mr-2 font-bold" href="/docs/{{$category->slug}}">{{$page->title}}</a>
</div>
