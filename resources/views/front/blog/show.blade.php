@extends('front.layouts.master')

@section('title', $post->title)

@section('content')
    <main>
        <div class="mx-auto px-6 sm:px-12 md:px-16 pb-16 max-w-4xl">
            <div class="mt-8">
                @if($image = $post->getFirstMedia('blog'))
                    <img alt="header image" src="{{ $image->getUrl() }}" />
                @endif

                <h2>{{ $post->title }}</h2>
                <div class="text-indigo-900 text-opacity-50 text-xs">
                    {{ $post->published_at?->format('d F Y') }}
                </div>
                <div>
                    <ul class="list-none flex mt-4">
                        @foreach($post->authors as $author)
                            <li>
                                <a href="{{ $author->link }}">
                                    <div class="flex items-center">
                                        <img src="{{ $author->gravatar_url }}" class="h-6 rounded-full" alt="avatar"/>
                                        <span class="ml-2 text-indigo-900 text-opacity-50 text-xs">
                                        {{ $author->name }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-indigo-900 text-opacity-50 mt-4 text-sm">
                    {!! $post->formatted_text !!}
                </div>
            </div>

            @include('partials.cta')
        </div>
    </main>
@endsection
