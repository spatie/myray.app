@extends('front.layouts.docs')

@section('title', 'Understand and fix bugs faster using Ray')

@section('description', 'Understand and fix bugs faster using Ray')

@section('content')
    <section class="docs-content w-full">
        <x-markdown>
<article>
<h1>{{$page->title}}</h1>
{!! $page->contents !!}
</article>

<div class="table-of-contents">
<h2>On this page</h2>

[TOC]
</div>
        </x-markdown>
    </section>
@endsection
