
@php
/** @var array<\App\Support\Testimonial> $testimonials */
    @endphp

<div class="testimonial-down lg:w-1/3 w-full  ">
    @foreach($testimonials as $testimonial)
    @if ( ($loop->index - 3) % 3 == 0)
    @include('components.testimonial', [
        'index' => rand(0,3),
        'quote' => $testimonial->text,
        'avatar' => '/images/testimonials/' . $testimonial->image . '.jpg',
        'author' => $testimonial->name,
        'title' => $testimonial->title,
        'url' => $testimonial->url,
        ])
    @endif
    @endforeach
   

    

</div>
<div class="testimonial-up lg:w-1/3 w-full ">

    @foreach($testimonials as $testimonial)
    @if ( ($loop->index - 2) % 3 == 0)
    @include('components.testimonial', [
        'index' => rand(0,3),
        'quote' => $testimonial->text,
        'avatar' => '/images/testimonials/' . $testimonial->image . '.jpg',
        'author' => $testimonial->name,
        'title' => $testimonial->title,
        'url' => $testimonial->url,
        ])
    @endif
    @endforeach




</div>
<div class="testimonial-down lg:w-1/3 w-full">
    @foreach($testimonials as $testimonial)
    @if ( ($loop->index - 1) % 3 == 0)
    @include('components.testimonial', [
        'index' => rand(0,3),
        'quote' => $testimonial->text,
        'avatar' => '/images/testimonials/' . $testimonial->image . '.jpg',
        'author' => $testimonial->name,
        'title' => $testimonial->title,
        'url' => $testimonial->url,
        ])
    @endif
    @endforeach


</div>