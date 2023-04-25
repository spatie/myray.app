@extends('front.layouts.master')

@section('content')
    <main>
        <div class="mx-auto px-6 sm:px-12 md:px-16 pb-16 max-w-4xl">
            @foreach($posts as $post)
                <div class="mt-8">
                    <h2 class="hover:underline">
                        <a href="{{ route('post.show', $post->idSlug()) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <div class="text-indigo-900 text-opacity-50 text-xs">
                        {{ $post->published_at->format('d F Y') }}
                    </div>
                    <p class="text-indigo-900 text-opacity-50 mt-2 text-sm">
                        {{ $post->excerpt }}
                    </p>
                    <a
                        class="underline text-xs mt-4"
                        href="{{ route('post.show', $post->idSlug()) }}">
                        Read more
                    </a>
                </div>
            @endforeach
            <div class="mt-8">
            {{ $posts->links() }}
            </div>
        </div>
    </main>
@endsection