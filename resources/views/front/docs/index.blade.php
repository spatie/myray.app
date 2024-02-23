@extends('front.layouts.docs')

@section('title', $page->title)

@section('description', 'Understand and fix bugs faster using Ray')

@section('content')
    @include('partials.docs.breadcrumbs')

    @include('partials.docs.doc-body')
@endsection
