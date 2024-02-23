@extends('front.layouts.docs')

@section('title', $page->title)

@section('description', 'Understand and fix bugs faster using Ray')

@section('content')
    <div class="flex text-xs md:text-xxs items-center mb-4">
        <a href="/docs" class="mr-2">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 5.46063V1.5H10.5V3.32656L8 1L0 8.5H2V15H6.5V10H9.5V15H14V8.5H16L13 5.46063Z" fill="#423755"/>
            </svg>
        </a>

        @foreach($categories as $category)
            <svg class="mr-2" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.39845 6.39844C6.61876 6.17813 6.61876 5.82188 6.39845 5.60391L1.89845 1.10157C1.67814 0.881255 1.32189 0.881255 1.10392 1.10157C0.88595 1.32188 0.883606 1.67813 1.10392 1.8961L5.20548 5.99766L1.10157 10.1016C0.881262 10.3219 0.881262 10.6781 1.10157 10.8961C1.32189 11.1141 1.67814 11.1164 1.89611 10.8961L6.39845 6.39844Z" fill="#423755"/>
            </svg>

            <a class="mr-2" href="/docs/{{$category->slug}}">{{$category->title}}</a>
        @endforeach

        <svg class="mr-2" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.39845 6.39844C6.61876 6.17813 6.61876 5.82188 6.39845 5.60391L1.89845 1.10157C1.67814 0.881255 1.32189 0.881255 1.10392 1.10157C0.88595 1.32188 0.883606 1.67813 1.10392 1.8961L5.20548 5.99766L1.10157 10.1016C0.881262 10.3219 0.881262 10.6781 1.10157 10.8961C1.32189 11.1141 1.67814 11.1164 1.89611 10.8961L6.39845 6.39844Z" fill="#423755"/>
        </svg>

        <a class="mr-2 font-bold" href="/docs/{{$category->slug}}">{{$page->title}}</a>
    </div>

    @include('partials.docs.doc-body')
@endsection
