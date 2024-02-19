<?php

namespace Database\migrations\database\seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PostSeeder::class,
            UserSeeder::class,
        ]);
    }
}
