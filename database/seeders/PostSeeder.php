<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        Author::create([
            'name' => 'Ruben Van Assche',
            'email' => 'ruben@spatie.be',
            'link' => 'https://twitter.com/rubenvanassche',

        ]);

        Author::create([
            'name' => 'Rias Van der Veken',
            'email' => 'rias@spatie.be',
            'link' => 'https://twitter.com/riasvdv',

        ]);

        Author::create([
            'name' => 'Alex Vanderbist',
            'email' => 'alex@spatie.be',
            'link' => 'https://twitter.com/alex_',

        ]);

        Author::create([
            'name' => 'Freek Van der Herten',
            'email' => 'freek@spatie.be',
            'link' => 'https://twitter.com/freekmurze',
        ]);

        $authorIds = Author::get()->pluck('id')->toArray();

        Post::create([
            'title' => 'Test post',
            'summary' => 'This is the summary',
            'text' => 'This is a blog post with a **little code snippet**

```php
$a = 1
```

That was the snippet
',
            'published_at' => now(),
            'published' => true,
        ]);

        Post::factory()->count(100)->create()->each(function (Post $post) use ($faker, $authorIds): void {
            $post->authors()->sync($faker->randomElements($authorIds, $faker->numberBetween(0, 3)));
        });
    }
}
