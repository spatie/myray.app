<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        foreach(['Rias', 'Freek'] as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower($name) . '@spatie.be',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
