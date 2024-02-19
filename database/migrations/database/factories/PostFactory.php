<?php

namespace Database\migrations\database\factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'summary' => $this->faker->sentence(),
            'text' => $this->faker->paragraphs(100, true),
            'published_at' => $this->faker->dateTimeBetween('-2 years'),
            'published' => $this->faker->boolean(90),
        ];
    }
}
