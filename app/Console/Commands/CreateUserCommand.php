<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    public $signature = 'create-user';

    public function handle()
    {
        $name = $this->ask('name');

        $email = $this->ask('email');

        $password = $this->ask('password');

        User::create([
           'name' => $name,
           'email' => $email,
           'password' => bcrypt($password),
        ]);

        $this->info('User created');
    }
}
