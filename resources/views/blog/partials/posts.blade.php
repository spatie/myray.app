<div data-posts>
    @foreach($posts as $post)
        @include('blog.partials.post-card', ['post' => $post])
    @endforeach
</div>
<div data-has-more="{{ $posts->hasMorePages() ? 'true' : 'false' }}"></div>
