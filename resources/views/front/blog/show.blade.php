@extends('front.layouts.master')

@section('title', $post->title)


@section('content')
    <main>
        <div class="mx-auto px-6 sm:px-12 md:px-16 pb-16 max-w-4xl">
   This is the content of the blog post.
        </div>
    </main>

@endsection
