@extends('front.layouts.master')

@section('title', $post->title)

@section('content')
    <main class="px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
            <div class="relative mt-2 flex items-center gap-x-6">
                <p class="text-base font-semibold leading-7 text-indigo-600">{{ $post->date?->format('d F Y') ?? 'Preview' }}</p>
                @foreach ($post->authors as $author)
                    <div class="flex items-center gap-x-2">
                        <img src="{{ $author->gravatar_url }}" alt="" class="h-6 w-6 rounded-full bg-indigo-50">
                        <div class="text-[0.6rem] leading-6">
                            <p class="font-semibold text-indigo-900">
                                <span>
                                    <span class="absolute inset-0"></span>
                                    {{ $author->name }}
                                </span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($post->header_image)
                <img class="w-full rounded-md my-4" alt="" src="{{ $post->header_image }}" />
            @endif

            <h1 class="my-4 text-3xl font-bold tracking-tight text-indigo-900 sm:text-4xl">{{ $post->title }}</h1>
            <div class="markup-blog markup markup-links markup-table markup-code markup-lists text-base">
                {!! $post->content !!}
            </div>

            @include('partials.cta')
        </div>
    </main>
@endsection
