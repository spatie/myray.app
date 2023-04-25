@extends('front.layouts.master')

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>
            <a href="{{ route('post.show', $post->idSlug()) }}">
                {{ $post->title }}
            </a>
        </h2>
        {{ $post->published_at->format('d F Y') }}
        <p>
            {{ $post->excerpt }}
        </p>
    @endforeach
    {{ $posts->links() }}
@endsection
