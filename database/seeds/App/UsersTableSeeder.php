<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => env('USER_NAME', 'Admin'),
            'email' => env('USER_EMAIL', 'admin@admin.com'),
            'password' => env('USER_PASSWORD', 'admin')
        ]);
    }
}
