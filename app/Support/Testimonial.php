<?php

namespace App\Support;

class Testimonial
{
    public function __construct(
        public string $name,
        public string $text,
        public string $image,
        public string $url,
        public string $title = '',
    )
    {

    }

    public function image(): string
    {
        return "/images/testimonials/{$this->image}.jpg";
    }
}
